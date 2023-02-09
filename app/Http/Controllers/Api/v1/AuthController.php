<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max: 100'],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required']
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        $token = $user->createToken('api-token')->plainTextToken;

        return [
            $user,
            $token
        ];
    }
    
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json(
                ['message' => 'Credenciais inválidas'],
                401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return [
            $user,
            $token
        ];
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => "Usuário deslogado com sucesso!"
        ];
    }
}
