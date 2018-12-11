@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Cliente" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container>
    <comp-cliente
    :user="{{ auth()->user() }}"
    ></comp-cliente>
  </v-container>
@endsection
