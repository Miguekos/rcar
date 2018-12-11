@extends('layouts.app')

@section('content')
<nav-bar titulo="Cliente" :user="{{ auth()->user() }}"></nav-bar>
  <comp-disponibilidad></comp-disponibilidad>

@endsection
