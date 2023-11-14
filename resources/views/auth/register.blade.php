@extends('layouts.main')

@section('content')
    <div class="glavsign">
        <div class="sign">
            <div class="regclose">
                <a href="{{route('main.index')}}">
                    <button><i class="fa-solid fa-xmark"></i></button>
                </a>
            </div>
            <h1>ShowHub</h1>
            <h2>Sign in to ShowHub</h2>
            <div class="signform">
                <form action="{{ route('register') }}" method="post" name="signup" enctype="multipart/form-data">
                    @csrf
                    <h3>Username</h3>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <h4 class="msg">{{$message}}</h4>
                    @enderror
                    <h3>Email </h3>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <h4 class="msg">{{$message}}</h4>
                    @enderror
                    <h3>Password</h3>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <h4 class="msg">{{$message}}</h4>
                    @enderror
                    <h3>Confirm password</h3>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                    <br>
                    <button type="submit" class="register-btn">Sign up</button>
                </form>
            </div>
            <div class="regsign">
                <h4>already have a account? <a href="{{ route('login') }}"> Sign in</a> .</h4>
            </div>
        </div>
    </div>
@endsection
