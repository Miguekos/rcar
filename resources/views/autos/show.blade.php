@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Auto / Create" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container>
    <auto-show
    :user="{{ auth()->user() }}"
    auto="{{ $autos }}"
    ></auto-show>
  </v-container>
@endsection
