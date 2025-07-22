@extends('layouts.Master')

@section('page_title', 'Register')

@section('content')

    <section class="h-screen grid place-content-center">
        <form action="{{ route('register') }}" method="POST" class="auth-form">
            @csrf
            <h1 class="form-title">Hello there</h1>
            <p class="form-text">By this view, you can create new account.</p>
            <div class="form-content">
                <div class="space-y-4 *:block">
                    <input name="name" type="text" class="form-input" placeholder="Name" value="{{ old('name') }}" required />
                    <input name="email" type="email" class="form-input" placeholder="Email address" value="{{ old('email') }}" required />
                    <input name="password" type="password" class="form-input" placeholder="Password" value="{{ old('password') }}" required />
                    <input name="password_confirmation" type="password" class="form-input" placeholder="Password confirmation" value="{{ old('password_confirmation') }}" required />
                </div>
                <button class="primary" type="submit">Register</button>
                <a href="{{ route('login') }}">Login</a>
            </div>
        </form>
    </section>

@endsection