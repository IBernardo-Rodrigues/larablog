<?php

namespace App\Http\Controllers\User;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{
    public function index() {
        return view('users.tags.index', [
            'tags' => Tag::where('user_id', auth()->id())->paginate(15)
        ]);
    }

    public function create() {
        return view('users.tags.create');
    }

    public function store(StoreTagRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();
        
        Tag::create($validated);

        return redirect('/user/tags')->with('status', 'Tag criada!');
    }

    public function edit(Tag $tag) {
        $this->authorize('update', $tag);

        return view('users.tags.edit', [
            'tag' => $tag
        ]);
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $this->authorize('update', $tag);

        $validated = $request->validated();

        $tag->update($validated);

        return redirect('/user/tags')->with('status', 'Tag atualizada!');
    }

    public function destroy(Request $request, Tag $tag)
    {
        $this->authorize('delete', $tag);

        $tag->delete();

        return redirect('user/tags/')->with('status', 'Tag deletada!');
    }
}
