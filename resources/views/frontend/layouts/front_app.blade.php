<!doctype html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cargo - Transport & Logistics Service</title>
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
