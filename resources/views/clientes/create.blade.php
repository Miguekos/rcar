@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Cliente" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  {{ autos }}
  <v-container grid-list-xl>
    <cliente-create
    :vehiculo="autos"
    >
    </cliente-create>
  </v-container>
@endsection
