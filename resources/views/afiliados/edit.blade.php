@extends('layouts.app')

@section('nav')
  <nav-bar titulo="Afiliado" :user="{{ auth()->user() }}"></nav-bar>
@endsection

@section('content')
  <v-container grid-list-xl>
    <afiliado-edit
    :info="{{ $info }}">
    </afiliado-edit>
  </v-container>
@endsection
