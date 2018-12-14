@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Auto / Create" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container>
    <auto-create
    :user="{{ auth()->user() }}"
    ></auto-create>
  </v-container>
@endsection
