<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\AuthenticateRequest;

class AuthController extends Controller
{
    public function signup()
    {
        return view('auth.signup');    
    }

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($validated['password']);
        $validated['role_id'] = 2;

        $user = User::create($validated);

        Auth::login($user, true);

        return redirect('/');
    }
    
    public function login()
    {
        return view('auth.login');    
    }

    public function authenticate(AuthenticateRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt($validated, true)) {
            request()->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Email ou senha inválidos!'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
