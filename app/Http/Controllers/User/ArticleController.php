<?php

namespace App\Http\Controllers\User;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    public function dashboard() {
        return view('users.dashboard', [
            
        ]);
    }

    public function index() {
        return view('users.articles.index', [
            'articles' => Article::where('user_id', auth()->id())->with('category')->paginate(10)
        ]);
    }

    public function show(Article $article) {
        // only the owner is able to see this
        return view('users.articles.show', [
            'article' => $article
        ]);
    }
    
    public function create() {
        return view('users.articles.create', [
            'categories' => Category::where('user_id', auth()->id())->get()
        ]);
    }

    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();
        
        $path = $validated['thumb']->store('thumbs', 'public');
        $validated['thumb'] = $path;

        $category = Category::firstWhere('slug', $validated['category']);

        $validated['category_id'] = $category->id;
        $validated['user_id'] = auth()->id();

        $article = Article::create($validated);
        $tags = $validated['tags'];
        $tags = explode(",", $tags);
        
        $updatedTags = [];
        foreach ($tags as $tag) {
            $tagSlug = Str::slug($tag, '-');

            $tag = Tag::firstOrCreate(
                ['slug'=> $tagSlug],
                ['name' => trim($tag), 'user_id' => auth()->id()]
            );

            $updatedTags[] = $tag->id;
        }

        $article->tags()->sync($updatedTags);

        return redirect('user/articles')->with('status', 'Artigo criado!');
    }

    public function edit(Article $article) {
        $this->authorize('update', $article);

        $tags = $article->tags()->get();
        $tagsString = "";

        foreach ($tags as $tag) {
            $tagsString .= $tag->name . ', ';
        }

        return view('users.articles.edit', [
            'article' => $article,
            'categories' => Category::where('user_id', auth()->id())->get(),
            'tags' => rtrim($tagsString, ", ")
        ]);
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validated = $request->validated();
        
        if ($validated['thumb'] ?? false) {

            Storage::delete('public/' . $article->thumb);

            $path = $validated['thumb']->store('thumbs', 'public');
            $validated['thumb'] = $path;
        }
        
        $category = Category::firstWhere('slug', $validated['category']);
        
        $validated['category_id'] = $category->id;
        $validated['user_id'] = auth()->id();

        $article->update($validated);

        $tags = $validated['tags'];
        $tags = explode(",", $tags);
        
        $article->tags()->detach();

        foreach ($tags as $tag) {
            $tagSlug = Str::slug($tag, '-');

            $tag = Tag::firstOrCreate(
                ['slug'=> $tagSlug],
                ['name' => trim($tag), 'user_id' => auth()->id()]
            );

            $article->tags()->attach($tag->id);
        }

        return redirect('/user/articles')->with('status', 'Artigo atualizado!');
    }

    public function destroy(Article $article)
    {
        Storage::delete('public/' . $article->thumb);

        $article->tags()->detach();
        $article->delete();

        return redirect('user/articles')->with('status', 'Artigo deletado!');
    }
}
