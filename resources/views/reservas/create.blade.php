@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Reserva" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container>
    <reserva-create
    :user="{{ auth()->user() }}"
    ></reserva-create>
  </v-container>
@endsection
