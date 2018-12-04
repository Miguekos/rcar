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

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rent a Car | Inicio</title>



</head>

<body>
    <div id="app" data-app>
        <v-app>
            <nav-bar :user="{{ auth()->user() }}"></nav-bar>
            <!-- <v-content> -->
                <v-container>
                    {{-- <v-layout> --}}
                        @yield('content')
                    {{-- </v-layout> --}}
                </v-container>
            <!-- </v-content> -->
        </v-app>
    </div>
</body>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
</html>
