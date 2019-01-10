@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Reserva" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container>
    <contrato-reserva
    :clientesc="{{ $clientes }}"
    :autosc="{{ $autos }}"
    :reservasc="{{ $reservas }}"
    :user="{{ auth()->user() }}"
    ></contrato-reserva>
  </v-container>
@endsection
