<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index() {
        return view('users.categories.index', [
            'categories' => Category::where('user_id', auth()->id())->paginate(15)
        ]);
    }

    public function create() {
        return view('users.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();
        
        Category::create($validated);

        return redirect('/user/categories')->with('status', 'Categoria criada!');
    }

    public function edit(Category $category) {
        $this->authorize('update', $category);

        return view('users.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->authorize('update', $category);

        $validated = $request->validated();

        $category->update($validated);

        return redirect('/user/categories')->with('status', 'Categoria atualizada!');
    }

    public function destroy(Request $request, Category $category)
    {
        $this->authorize('delete', $category);

        $category->delete();

        return redirect('/user/categories')->with('status', 'Categoria deletada!');
    }
}