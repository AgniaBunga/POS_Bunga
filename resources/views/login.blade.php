@extends('layouts.app')

@section('title', 'Coffee Bloom Login')

@section('content')

<style>
    body {
        min-height: 100vh;
        background: linear-gradient(
                rgba(255, 245, 240, 0.85),
                rgba(255, 245, 240, 0.85)
            ),
            url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1920');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .login-container {
        width: 430px;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(180, 120, 120, 0.2);
    }

    .login-header {
        background: linear-gradient(135deg, #d9a299, #f4c7c3);
        text-align: center;
        padding: 35px;
        color: white;
    }

    .coffee-logo {
        width: 90px;
        height: 90px;
        margin: auto;
        border-radius: 50%;
        background: rgba(255,255,255,0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        backdrop-filter: blur(10px);
    }

    .brand-title {
        margin-top: 15px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .brand-subtitle {
        font-size: 14px;
        opacity: 0.9;
    }

    .login-body {
        padding: 35px;
    }

    .form-label {
        color: #8d6e63;
        font-weight: 600;
    }

    .form-control {
        border-radius: 15px;
        padding: 12px;
        border: 2px solid #f1d7d4;
        background: #fffaf9;
    }

    .form-control:focus {
        border-color: #d9a299;
        box-shadow: 0 0 12px rgba(217, 162, 153, 0.3);
    }

    .btn-login {
        width: 100%;
        border: none;
        border-radius: 15px;
        padding: 12px;
        background: linear-gradient(135deg, #d9a299, #f4c7c3);
        color: white;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        opacity: 0.95;
    }

    .footer-text {
        text-align: center;
        margin-top: 20px;
        color: #b08b85;
        font-size: 13px;
    }

    .quote {
        text-align: center;
        color: #c0958d;
        font-style: italic;
        margin-bottom: 20px;
        font-size: 13px;
    }
</style>

<div class="login-container position-absolute top-50 start-50 translate-middle">

    <div class="login-header">

        <div class="coffee-logo">
            ☕
        </div>

        <h3 class="brand-title">
            Coffee Bloom
        </h3>

        <p class="brand-subtitle">
            Sweet Coffee • Sweet Moments
        </p>

    </div>

    <div class="login-body">

        <div class="quote">
            "A cup of coffee and a beautiful day 🌷"
        </div>

        <form action="{{ route('auth') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Masukkan email"
                    value="{{ old('email') }}">

                @error('email')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password">

                @error('password')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-login">
                Login ✨
            </button>

            <div class="footer-text">
                © Coffee Bloom Management System
            </div>

        </form>

    </div>

</div>

@endsection