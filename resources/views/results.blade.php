@extends('layouts.base')

@section('title', "Search {$keyword}")

@section('content')
    <div class="content">
        <h3>Your search for "{{ $keyword }}"</h3>
    </div>
    <div class="columns">
        <div class="column is-6">
            @forelse($users as $user)
                @include('partials.userblock')
            @empty
                <p>No results found, sorry.</p>
            @endforelse
        </div>
    </div>            
@stop