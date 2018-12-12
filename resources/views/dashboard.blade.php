@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Dashboard" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container>
    <comp-dashboard></comp-dashboard>
  </v-container>
@endsection



<link href="../grafica/assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../grafica/assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
<link href="../grafica/assets/demo/demo.css" rel="stylesheet" />
<script src="../grafica/assets/js/core/jquery.min.js"></script>
<script src="../grafica/assets/js/core/popper.min.js"></script>
<script src="../grafica/assets/js/core/bootstrap.min.js"></script>
<script src="../grafica/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="../grafica/assets/js/plugins/chartjs.min.js"></script>
<script src="../grafica/assets/js/plugins/bootstrap-notify.js"></script>
<script src="../grafica/assets/js/black-dashboard.min.js?v=1.0.0"></script>
<script src="../grafica/assets/demo/demo.js"></script>
