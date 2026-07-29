@extends('layouts.app')

@section('title', 'Login')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #b8eaff, #e8f7ff);
        min-height: 100vh;
    }

    .login-container {
        width: 380px;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 123, 255, 0.2);
        background: white;
    }

    .login-header {
        background: linear-gradient(135deg, #4facfe, #00c6ff);
        padding: 30px;
        color: white;
        text-align: center;
    }

    .login-header h3 {
        font-weight: bold;
        margin-top: 10px;
    }

    .flower {
        font-size: 50px;
    }

    .login-body {
        padding: 35px;
    }

    .form-label {
        font-weight: 600;
        color: #444;
    }

    .form-control {
        border-radius: 15px;
        padding: 12px;
        border: 2px solid #d5efff;
    }

    .form-control:focus {
        border-color: #4facfe;
        box-shadow: 0 0 10px rgba(79,172,254,0.3);
    }

    .btn-login {
        width: 100%;
        border-radius: 20px;
        padding: 12px;
        border: none;
        background: linear-gradient(135deg, #4facfe, #00c6ff);
        color: white;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-login:hover {
        transform: translateY(-3px);
        opacity: 0.9;
    }

    .footer-text {
        text-align: center;
        color: #888;
        font-size: 13px;
        margin-top: 20px;
    }
</style>


<div class="login-container position-absolute top-50 start-50 translate-middle">


    <div class="login-header">

        <div class="flower">
            🌸
        </div>

        <h3>
            Login POS Bunga
        </h3>

        <p class="mb-0">
            Silahkan masuk ke akun anda
        </p>

    </div>


    <div class="login-body">

        <form action="{{ route('auth')}}" method="POST">

            @csrf


            <div class="mb-3">

                <label class="form-label">
                    Email Address
                </label>

                <input 
                    type="email" 
                    name="email" 
                    class="form-control"
                    placeholder="Masukkan email">

                @error('email')
                    <div class="badge text-bg-danger mt-2">
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
                    <div class="badge text-bg-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror

            </div>



            <button type="submit" class="btn btn-login">
                Login ✨
            </button>


            <div class="footer-text">
                © POS Bunga Management System
            </div>


        </form>

    </div>

</div>


@endsection