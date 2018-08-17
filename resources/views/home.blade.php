@extends('layouts.base')

@section('title', "Welcome")

@section('content')
    <div class="content">
        <h2>Welcome to {{ config('app.name') }}</h2>
        <p>The best social network ever.</p>
    </div>
@stop