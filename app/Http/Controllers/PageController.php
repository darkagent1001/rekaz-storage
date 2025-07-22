<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    // Home veiw
    public function home()
    {

        $blobs = Auth::user()->blobs()->get();

        return view('home', compact('blobs'));

    }

    // Register veiw
    public function register()
    {

        return view('auth.register');

    }

    // Login veiw
    public function login()
    {

        return view('auth.login');

    }

}
