@extends('layouts.main')

@section('content')
    <div class="glavsign">
        <div class="sign">
            <div class="signclose">
                <a href="{{route('main.index')}}">
                    <button><i class="fa-solid fa-xmark"></i></button>
                </a>
            </div>
            <h1>ShowHub</h1>
            <h2>Sign in to ShowHub</h2>
            <div class="signform">
                <form action="{{ route('login') }}" method="post" name="signin" enctype="multipart/form-data">
                    @csrf
                    <h3>email </h3>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <h4 class="msg">{{$message}}</h4>
                    @enderror
                    <h3>Password</h3>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="current-password">

                    @error('password')
                    <h4 class="msg">{{$message}}</h4>
                    @enderror

                    <div class="row remindme_main">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input remindme" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="login_btn">Sign in</button>
                </form>
            </div>
            <div class="signreg">
                <h4>New to ShowHub? <a href="{{ route('register') }}">Create an account</a> .</h4>
            </div>
        </div>
    </div>

@endsection
