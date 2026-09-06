@extends('layouts.customer')

@section('title', 'Create Account | Estelle')

@section('content')

<section class="auth-page">

    <div class="auth-card">

        <span class="auth-label">
            JOIN ESTELLE
        </span>

        <h1>
            Create Account
        </h1>

        <p>
            Discover jewellery made to shine.
        </p>

        <form
            method="POST"
            action="{{ route('api.signup') }}"
        >

            @csrf

            <label>Name</label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
            >

            @error('name')
                <small>{{ $message }}</small>
            @enderror


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


            <label>Confirm Password</label>

            <input
                type="password"
                name="password_confirmation"
                required
            >


            <button type="submit">
                CREATE ACCOUNT
            </button>

        </form>

        <p class="auth-footer">
            Already have an account?
            <a href="/login">
                Sign in
            </a>
        </p>

    </div>

</section>

@endsection