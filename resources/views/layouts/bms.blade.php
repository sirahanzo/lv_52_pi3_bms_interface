<!doctype html>
<html lang="en" class="fixed  {{ Request::route()->getName() == 'Login' ||(Request::segment(1) == 'login')? 'accounts forgot-password' : '' }} ">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>BMS INTERFACE</title>
    {{--<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">--}}
    {{--<link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">--}}
    {{--<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">--}}
    {{--<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">--}}
    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('/')}}css/font-awesome.css">
    <link rel="stylesheet" href="{{asset('/')}}css/animate.css">
    <link rel="stylesheet" href="{{asset('/')}}css/style_blue.css">
    {{--<meta name="_token" content="{{csrf_token()}}">--}}

    @yield('css')
</head>

<body>
{{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
@yield('page')

<script src="{{asset('/')}}js/jquery-1.12.3.min.js"></script>
<script src="{{asset('/')}}js/bootstrap.min.js"></script>
<script src="{{asset('/')}}js/nano-scroller.js"></script>
<script src="{{asset('/')}}js/template-script.min.js"></script>
<script src="{{asset('/')}}js/template-init.min.js"></script>
<script src="{{asset('/')}}js/server-time.js"></script>
@yield('js')
</body>


</html>
