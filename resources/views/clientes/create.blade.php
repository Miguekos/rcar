@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Cliente" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container grid-list-xl>
    <cliente-create
    >
    </cliente-create>
  </v-container>
@endsection
