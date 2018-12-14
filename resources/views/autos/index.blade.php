@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Auto" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container>
    <comp-autos
    :user="{{ auth()->user() }}"
    ></comp-autos>
  </v-container>
@endsection
