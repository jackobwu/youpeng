@extends('layouts.base')

@section('title', "{$user->getName()}")

@section('content')
    <div class="columns">
        <div class="column is-6">
            @include('partials.userblock')
        </div>
        <div class="column is-6">
        @if(Auth::check())
            @include('partials.friendactions')
        @endif {{-- check logged in --}}
            <div class="content">
                <h4>{{ $user->getName() }}'s friends</h4>
            </div>
        @forelse($user->friends() as $user)
            @include('partials.userblock')
        @empty
            <div class="content">
                <p>{{ $user->getName() }} has no friends.</p>
            </div>
        @endforelse
        </div>
    </div>
@stop