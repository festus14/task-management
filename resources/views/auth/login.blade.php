@extends('layouts.app')
@section('content')
<div class="login-box">
        <div class="container-login100">
            <div class="wrap-login100">
                <h4 style="font-family: 'Oswald', sans-serif;  margin-bottom: -30px;" class="login100-form-title p-b-41">
                    Task Management System
                </h4>
                @if(\Session::has('message'))
                <p class="alert alert-info">
                    {{ \Session::get('message') }}
                </p>
                @endif
                <form action="{{ route('login') }}" method="POST" class="login100-form validate-form p-b-33">
                        {{ csrf_field() }}
                    <div class="wrap-input100 validate-input" data-validate="Enter email">
                        <input class="input100" type="email" name="email" placeholder="{{ trans('global.login_email') }}" required>
                        <span class="focus-input100" style="color: red;" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100 " type="password"  placeholder="{{ trans('global.login_password') }}" name="password" required>
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>

                    <input id="logCheck" type="checkbox" name="remember"> <span style="margin-left: 25px;">Remember me </span>

                    <div class="container-login100-form-btn m-t-32">
                        <button type="submit" class="login100-form-btn">
							Login
						</button>
                    </div>

                </form>
                <a href="{{ route('password.request') }}" style="text-decoration: none; float: right; color: white; margin-right: 20px; text-align: right;">Forgot password?</a>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>

</html>
