@extends('layouts.app')

@section('content')

  <comp-autos 
  :user="{{ auth()->user() }}"
  ></comp-autos>

@endsection
