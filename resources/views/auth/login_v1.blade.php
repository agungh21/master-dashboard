@extends('layouts.layout_login')

@section('content')
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- form login -->
                <form method="POST" action="{{ route('login') }}" class=" sign-up-form">
                    @csrf
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <input type="email" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="input-field">
                        <div class="icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input type="password" name="password" id="password" placeholder="Password">
                    </div>
                    <input type="submit" value="Login" class="btn solid">
                    {{-- <p class="social-text">or Sign in with social platform</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div> --}}
                </form>

                <!-- form register -->
                <form method="POST" action="{{ route('register') }}" class="sign-in-form">
                    @csrf
                    <h2 class="title">Register</h2>
                    <div class="input-field">
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <input type="text" name="name" id="name" placeholder="Nama" required value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <div class="input-field">
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <input type="email" name="email" id="email" placeholder="Email" required
                            value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <div class="input-field">
                        <div class="icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    @error('password')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <div class="input-field">
                        <div class="icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input id="password-confirm" type="password" name="password_confirmation" required
                            autocomplete="new-password" placeholder="Confirm Password">
                    </div>
                    <input type="submit" value="Daftar" class="btn solid">
                    {{-- <p class="social-text">or Sign in with social platform</p> --}}
                    {{-- <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div> --}}
                </form>
            </div>
        </div>

        <div class="panels-container">
            <!-- left panel -->
            <div class="panel left-panel">
                <div class="content">
                    <h3>Your here?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt minus doloremque</p>
                    <button class="btn transparent" id="sign-up-btn">login</button>
                </div>

                <img class="image" src="assets/img/log.svg" alt="">
            </div>
            <!-- right panel -->
            <div class="panel right-panel">
                <div class="content">
                    <h3>Your of us ?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt minus doloremque</p>
                    <button class="btn transparent" id="sign-in-btn">Register</button>
                </div>

                <img class="image" src="assets/img/register.svg" alt="">
            </div>
        </div>
    </div>
@endsection
