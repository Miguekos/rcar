@extends('layouts.app')

@section('content')

  <comp-reservas 
  :user="{{ auth()->user() }}"
  ></comp-reservas>

@endsection
