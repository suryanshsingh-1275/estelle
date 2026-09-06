@extends('layouts.customer')

@section('title', 'Login | Estelle')

@section('content')

<section class="auth-page">

    <div class="auth-card">

        <span class="auth-label">
            WELCOME BACK
        </span>

        <h1>
            Sign In
        </h1>

        <p>
            Continue your Estelle journey.
        </p>

        <form
            method="POST"
            action="{{ route('api.login') }}"
        >

            @csrf

            <label>Email</label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
            >

            @error('email')
                <small>{{ $message }}</small>
            @enderror


            <label>Password</label>

            <input
                type="password"
                name="password"
                required
            >


            <button type="submit">
                SIGN IN
            </button>

        </form>

        <p class="auth-footer">
            Don't have an account?
            <a href="/signup">
                Create one
            </a>
        </p>

    </div>

</section>

@endsection