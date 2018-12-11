@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Promo" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container>
    <promo-create
    :user="{{ auth()->user() }}"
    ></promo-create>
  </v-container>
@endsection
