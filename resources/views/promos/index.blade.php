@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Promo" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container>
    <comp-promos
    :user="{{ auth()->user() }}"
    ></comp-promos>
  </v-container>
@endsection
