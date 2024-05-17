<!doctype html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Prashant Cargo & Logistic | Transport Company in UP & Bihar</title>
        <meta name="description" content="Prashant Cargo & Logistic is one of the best transporter in UP & Bihar. We provide transport services in patna, varanasi, gorakhpur, lucknow etc."/>
        <link rel=icon href="{{ asset('frontend/assets/img/favicon.png')}}" sizes="20x20" type="image/png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css')}}">
    </head>

    <body>
        @include('frontend.include.header')
            @yield('content')
        @include('frontend.include.footer')
    </body>
</html>
