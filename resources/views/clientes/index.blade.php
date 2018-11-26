@extends('layouts.app')

@section('content')

{{-- <div class="row"> --}}
        {{-- <div id="sombra" class="col-md-12"> --}}
            {{-- <div class="panel panel-default"> --}}

                <comp-cliente 
                :user="{{ auth()->user() }}"
                ></comp-cliente>

            {{-- </div> --}}
        {{-- </div> --}}
    {{-- </div> --}}
    
@endsection