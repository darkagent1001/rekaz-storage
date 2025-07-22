<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Create an account (Register)
    public function register(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required|min:4|max:50',
            'email' => 'required|email|unique:users|min:4|max:50',
            'password' => 'required|confirmed|min:8'
        ]);

        $user = $user->create($request->all());

        Auth::login($user);

        return redirect('/');

    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials, true)){

            return redirect('/');

        }

        return redirect()->back()->withErrors('login', 'The credentials is not correct.');

    }

    public function logout()
    {

        Auth::logout();
        return redirect('login');

    }
    
}
