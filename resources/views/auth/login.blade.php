@extends('layouts.Master')

@section('page_title', 'Login')

@section('content')

    <section class="h-screen grid place-content-center">
        <form action="{{ route('login') }}" method="POST" class="auth-form">
            @csrf
            <h1 class="form-title">Welcome back</h1>
            <p class="form-text">Enter your credentials to access your account.</p>
            <div class="form-content">
                <div class="space-y-4 *:block">
                    <input name="email" type="email" class="form-input" placeholder="Email address" value="{{ old('email') }}" required />
                    <input name="password" type="password" class="form-input" placeholder="Password" value="{{ old('password') }}" required />
                </div>
                <button class="primary" type="submit">Login</button>
                <a href="{{ route('register') }}">Register</a>
            </div>
        </form>
    </section>

@endsection