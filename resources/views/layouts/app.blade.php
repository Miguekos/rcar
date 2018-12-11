<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet"> -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Inconsolata:300|Material+Icons' rel="stylesheet" type="text/css"> -->
    <!-- Required styles for MDC Web -->
    <!-- CSRF Token -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" /> -->
    <link href="/css/all.css" rel="stylesheet">


  <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">

  <!-- Nucleo Icons -->

  <!-- CSS Files -->

  <!-- CSS Just for demo purpose, don't include it in your project -->


<style>
html {
      font-family: Roboto,sans-serif!important;
      }
</style>

    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rent a Car | Inicio</title>



</head>

<body class="white-content">
    <div id="app" data-app>
        <v-app>
                        @yield('nav')
                        @yield('content')

        </v-app>
    </div>
</body>
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
<script type="text/javascript" src="/js/moment.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<!--   Core JS Files   -->




<!--  Google Maps Plugin    -->
<!-- Place this tag in your head or just before your close body tag. -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Chart JS -->

<!--  Notifications Plugin    -->

<!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->

<!-- Black Dashboard DEMO methods, don't include it in your project! -->


<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->
</html>
