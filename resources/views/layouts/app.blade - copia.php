<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login | Inicio</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
  <div id="app" data-app>
    @guest

    @else
        @include('templates.nav')
    @endguest

    <div class="container">
    @if (session()->has('flash'))
        <div class="col-md-12 alert alert-info">
            {{ session('flash') }}
        </div>
    @endif
    @include('templates.nav')
        @yield('content')
    </div>
    </div>
</body>

</html>
