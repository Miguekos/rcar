@extends('layouts.app')

@section('content')
<nav-bar titulo="Cliente" :user="{{ auth()->user() }}"></nav-bar>
  <comp-promos
  :user="{{ auth()->user() }}"
  ></comp-promos>

@endsection
