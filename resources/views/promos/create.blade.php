@extends('layouts.app')

@section('content')
<nav-bar titulo="Cliente" :user="{{ auth()->user() }}"></nav-bar>
  <promo-create
  :user="{{ auth()->user() }}"
  ></promo-create>

@endsection
