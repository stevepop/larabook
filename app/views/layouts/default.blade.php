<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome To Larabook</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
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
<script>
    $('.comments__create-form').on('keydown', function(e){
        if (e.keyCode == 13) {
            e.preventDefault();
            $(this).submit();
        }
    });
</script>
</body>
</html>