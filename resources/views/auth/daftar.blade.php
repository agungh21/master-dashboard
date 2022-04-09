@extends('layouts.layout_login')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('register') }}" class="form-signin">
                    @csrf
                    <!-- <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
                        <h1 class="h3 mb-3 font-weight-normal">Daftar</h1>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input id="confirm_password" type="password"
                                class="form-control @error('confirm_password') is-invalid @enderror"
                                name="password_confirmation" required autocomplete="current-confirm_password">
                        </div>
                        {{-- <p>
                            Sudah Punya Akun? <a href="{{ route('login') }}">Login</a>
                        </p> --}}
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
                        <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }}</p>
                    </form>
                </form>
            </div>
        </div>
    </div>
@endsection
