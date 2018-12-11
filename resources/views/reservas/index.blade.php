@extends('layouts.app')

@section('content')
<nav-bar titulo="Cliente" :user="{{ auth()->user() }}"></nav-bar>
  <comp-reservas
  :user="{{ auth()->user() }}"
  ></comp-reservas>

@endsection
