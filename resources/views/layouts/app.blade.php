<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('css/adminltev3.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('loginAssets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('loginAssets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('loginAssets/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('loginAssets/css/main.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" />
    {{-- <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
</head>

<body class="" style="background-image: url({{ asset('loginAssets/images/bg-01.jpg') }});">
    @yield('content')

    <script src= "{{ asset('loginAssets/js/main.js') }}" type="text/javascript"></script>
</body>

</html>
