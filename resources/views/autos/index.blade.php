@extends('layouts.app')

@section('content')
<nav-bar titulo="Autos" :user="{{ auth()->user() }}"></nav-bar>
  <comp-autos
  :user="{{ auth()->user() }}"
  ></comp-autos>

@endsection
