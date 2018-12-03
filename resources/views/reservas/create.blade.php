@extends('layouts.app')

@section('content')

  <reserva-create
  :user="{{ auth()->user() }}"
  ></reserva-create>

@endsection
