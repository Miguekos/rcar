@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Promo" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container grid-list-xl>
    <promo-edit
    :info="{{ $info }}">
    </promo-edit>
  </v-container>
@endsection
