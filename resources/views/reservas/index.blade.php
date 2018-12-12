@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Reserva" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container>
    <comp-reservas
    :user="{{ auth()->user() }}"
    ></comp-reservas>
  </v-container>
@endsection
