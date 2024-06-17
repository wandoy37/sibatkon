<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIBATKON - @yield('title')</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" crossorigin="anonymous">

    <link href="{{ asset('fontawesome') }}/css/fontawesome.css" rel="stylesheet">
    <link href="{{ asset('fontawesome') }}/css/brands.css" rel="stylesheet">
    <link href="{{ asset('fontawesome') }}/css/solid.css" rel="stylesheet">
</head>

<body>
    @include('home.layouts.navbar')


    @yield('content')

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
</body>

</html>
