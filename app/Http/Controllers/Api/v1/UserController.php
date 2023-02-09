<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ArticleResource;

class UserController extends Controller
{
    /**
     * Get all users
     */
    public function index()
    {
        return new UserResource(User::all());
    }
    
    /**
     * Get a given users
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Store a new user in database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max: 100'],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required']
        ]);

        $validated['password'] = bcrypt($validated['password']);

        return new UserResource(User::create($validated));
    }
    
    /**
     * Update an user in database
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'max: 100'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => ['required']
        ]);

        $validated['password'] = bcrypt($validated['password']);

        return new UserResource($user->update($validated));
    }

    /**
     * Delete an user in database
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(["message" => "Usuário deletado"]);
    }

    /**
     * Get all articles from a given user
     */
    public function articles(User $user)
    {
        return ArticleResource::collection($user->articles()->get());
    }
    
    /**
     * Get one article from a given user
     */
    public function article(User $user, Article $article)
    {
        return $user->articles()->findOrFail($article->id);
    }

    /**
     * Get the posted articles in the current week from a given user
     */
    public function thisWeekArticles(User $user)
    {
        $mondayTimestamp = date('Y-m-d h:i:s' ,strtotime('last monday'));
        $sundayTimestamp = date('Y-m-d h:i:s', strtotime('sunday'));

        return ArticleResource::collection(User::find($user->id)
                       ->articles()
                       ->whereBetween('created_at', [$mondayTimestamp, $sundayTimestamp])
                       ->get());
    }
}
