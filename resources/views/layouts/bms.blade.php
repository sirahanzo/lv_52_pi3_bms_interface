<!doctype html>
<html lang="en" class="fixed  {{ Request::route()->getName() == 'Login' ||(Request::segment(1) == 'login')? 'accounts forgot-password' : '' }} ">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>NS BMS MONITORING</title>
    {{--<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">--}}
    {{--<link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">--}}
    {{--<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">--}}
    {{--<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">--}}
    <link rel="shortcut icon"  type="image/png" sizes="16x16"  href="{{asset('/')}}images/logo-nipress-all.png">
    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('/')}}css/font-awesome.css">
    <link rel="stylesheet" href="{{asset('/')}}css/animate.css">
    <link rel="stylesheet" href="{{asset('/')}}css/style_blue.css">
    {{--<meta name="_token" content="{{csrf_token()}}">--}}

    @yield('css')
</head>

<body>
@yield('page')

<script src="{{asset('/')}}js/jquery-1.12.3.min.js"></script>
<script src="{{asset('/')}}js/bootstrap.min.js"></script>
<script src="{{asset('/')}}js/nano-scroller.js"></script>
<script src="{{asset('/')}}js/template-script.min.js"></script>
<script src="{{asset('/')}}js/template-init.min.js"></script>
{{--<script src="{{asset('/')}}js/server-time.js"></script>--}}
<script src="{{asset('/')}}js/ServerDate.js"></script>
<script>
    function updateClocks()
    {
        var client = new Date();
        document.getElementById("server").innerHTML = String(ServerDate);
        var h = ServerDate.getHours();
        var m = ServerDate.getMinutes();
        var s = ServerDate.getSeconds();
        if (h == 0) {
            h = 00;
        }
        if (h < 10) {
            h = "0" + h;
        }
        if (m < 10) {
            m = "0" + m;
        }
        if (s < 10) {
            s = "0" + s;
        }
        var myClock = document.getElementById('clockDisplay');
        myClock.textContent = h + ":" + m + ":" + s + "";

    }
    // Display the clocks and update them every second.
    updateClocks();
    setInterval(updateClocks, 1000);
</script>
@yield('js')
</body>


</html>
