@extends('layouts.app')

@section('content')
<nav-bar titulo="Cliente" :user="{{ auth()->user() }}"></nav-bar>

<cliente-edit
:info="{{ $info }}">

</cliente-edit>

@endsection
