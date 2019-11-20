<!DOCTYPE HTML>
<html>

<head>
    <title>Reset Password Form</title>
    <link href="{{ asset('loginAssets/resetPassword/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="elelment">
        <center><img src="{{ asset('loginAssets/resetPassword/padlock.png') }}" id="padlock" alt="">
            <div class="element-main">
                <h1>Forgot Password?</h1>
                <p> Input your email address below.</p>
                <form method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <input type="email" name="email" required="autofocus" placeholder="Your e-mail address" id="emailInput" required>
                    @if($errors->has('email'))
                            <p class="help-block">
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    <button type="submit" id="resetSubmitBtn">
                        Reset my Password
                    </button>

                </form>
        </center>
        </div>
    </div>
</body>

</html>
