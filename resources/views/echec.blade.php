
@extends('layouts.app')
    @section('content')
    @if (session('danger'))
            <div class="alert alert-danger" id="myinfo" role="alert">
                {{ session('danger') }}
            </div>
        @endif
        
    @endsection