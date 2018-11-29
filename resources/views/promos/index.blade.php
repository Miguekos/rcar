@extends('layouts.app')

@section('content')

  <comp-promos 
  :user="{{ auth()->user() }}"
  ></comp-promos>

@endsection
