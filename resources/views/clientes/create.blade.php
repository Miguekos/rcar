@extends('layouts.app')

@section('content')
    <nav-bar titulo="Cliente" :user="{{ auth()->user() }}"></nav-bar>
    <cliente-create></cliente-create>
@endsection
