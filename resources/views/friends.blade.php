@extends('layouts.base')

@section('title', "Friends")

@section('content')
    <div class="columns">
        <div class="column is-6">
            <div class="content">
                <h3>Your friends</h3>
            </div>
            @forelse($friends as $user)
                @include('partials.userblock')
            @empty
                <p>You have no friends.</p>
            @endforelse
        </div>
        <div class="column is-6">
            <div class="content">
                <h4>Friend requests</h4>
                @forelse($requests as $user)
                    @include('partials.userblock')
                @empty
                    <p>You have no friend requests.</p>
                @endforelse
            </div>
        </div>
    </div>
@stop