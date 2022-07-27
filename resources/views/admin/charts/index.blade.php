@extends('layouts.admin')

@section('content')

@php
use Illuminate\Support\Facades\Auth;
@endphp

<Graphics :user="{{Auth::id()}}"/>

@endsection