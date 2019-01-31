@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Cliente" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container>
    <comp-afiliado
    :user="{{ auth()->user() }}"
    ></comp-afiliado>
  </v-container>
@endsection
