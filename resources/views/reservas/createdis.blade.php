@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Reserva Disponibilidad" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container>
    <reserva-createdis
    :user="{{ auth()->user() }}"
    :vehiculodis="{{ $id }}"
    fechai="{{ $fechaIn }}"
    fechaf="{{ $fechaFn }}"
    ></reserva-createdis>
  </v-container>
@endsection
