@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Reserva" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container>
    <cargoalquiler-reserva
    :user="{{ auth()->user() }}"
    ></cargoalquiler-reserva>
  </v-container>
@endsection