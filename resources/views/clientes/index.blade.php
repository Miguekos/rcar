@extends('layouts.app')

@section('content')
<nav-bar titulo="Cliente" :user="{{ auth()->user() }}"></nav-bar>

<comp-cliente
:user="{{ auth()->user() }}"
></comp-cliente>

@endsection
