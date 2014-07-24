<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>
<body>
@include('layouts.partials.nav')

<div class="container">
    @include('flash::message')

    @yield('content')
</div>
<script src="{{ asset('js/jQuery/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>
</body>
</html>