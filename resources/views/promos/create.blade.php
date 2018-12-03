@extends('layouts.app')

@section('content')

  <promo-create
  :user="{{ auth()->user() }}"
  ></promo-create>

@endsection
