@extends('layouts.base')

@section('title', "Timeline")

@section('content')
    <div class="columns">
        <div class="column is-6">
             <form method="post" action="{{ route('status.post') }}">
                <div class="field">
                    <div class="control">  
                        <textarea class="textarea" name="status" placeholder="What's up ..." rows="2"></textarea>
                    </div>
                </div>
                <div class="field">
                    <div class="control">  
                        <button type="submit" class="button is-primary">Post status</button>
                    </div>
                </div>
                @csrf
            </form>
            <hr>
        </div>
    </div>
    <div class="columns">
        <div class="column is-5">
            @forelse($statuses as $status)
                <article class="media">
                    <figure class="media-left">
                        <p class=image is-32x32>
                            <img src="{{ $status->user->getAvatarUrl() }}" alt="profile image">
                        </p>
                    </figure>      
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>{{ $status->user->getName() }}</strong>
                                <br>
                                {{ $status->body }}
                            </p>
                        </div>
                        <nav class="level is-mobile">
                            <div class="level-left">
                                <a class="level-item">
                                <span class="icon is-small"><i class="fas fa-reply"></i></span>
                                </a>
                                <a class="level-item">
                                <span class="icon is-small"><i class="fas fa-retweet"></i></span>
                                </a>
                                <div class="level-item">
                                    @if($status->user->id !== Auth::id())
                                        <a href="{{ route('status.like', ['statusId' => $status->id]) }}">Like</a>
                                    @endif
                                        {{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}
                                </div>
                            </div>
                        </nav>
                    <div>
                    @foreach($status->replies as $reply)
                        <article class="media">
                            <figure class="media-left" href="#">
                                <p class=image is-32x32>
                                    <img src="{{ $status->user->getAvatarUrl() }}" alt="profile image">
                                </p>
                            </figure>
                            <div class="media-content">
                                <div class="content">
                                <p>
                                    <strong>{{ $status->user->getName() }}</strong>
                                    <br>
                                    {{ $status->body }}
                                </p>
                                </div>
                                <nav class="level is-mobile">
                                    <div class="level-left">
                                        <a class="level-item">
                                        <span class="icon is-small"><i class="fas fa-reply"></i></span>
                                        </a>
                                        <a class="level-item">
                                        <span class="icon is-small"><i class="fas fa-retweet"></i></span>
                                        </a>
                                        <a class="level-item">
                                        <span class="icon is-small"><i class="fas fa-heart"></i></span>
                                        </a>
                                    </div>
                                </nav>
                            </div>
                        </article>
                    @endforeach
                </article>
                <form action="{{ route('status.reply', ['statusId' => $status->id]) }}" method="post">
                    <div class="field">
                        <div class="control">  
                            <textarea class="textarea" name="reply-{{ $status->id }}" placeholder="What's up ..." rows="1"></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">  
                            <button type="submit" class="button is-primary is-small">Reply</button>
                        </div>
                    </div>
                    @csrf
                </form>
                <hr>
            @empty
                <div class="content">
                    <p>There's nothing in your timeline yet.</p>
                </div>
            @endforelse
        </div>
    </div>
@stop