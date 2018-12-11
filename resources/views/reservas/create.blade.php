@extends('layouts.app')

@section('content')
<nav-bar titulo="Cliente" :user="{{ auth()->user() }}"></nav-bar>
  <reserva-create
  :user="{{ auth()->user() }}"
  ></reserva-create>

@endsection
