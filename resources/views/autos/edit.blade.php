@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Auto" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container>
    <auto-edit
    :info="{{ $info }}">
    ></auto-edit>
  </v-container>
@endsection
