@extends('layouts.admin')

@section('content')

<div class="container text-center">
    @if(Auth::check())
        <h1>Welcome {{ Auth::user()->name }}</h1>
        
    @else
        <h1>Welcome to the admin area</h1>
    @endif
</div>
@endsection