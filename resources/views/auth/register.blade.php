@extends('layouts.base')

@section('title', "Sign up")

@section('content')
    <div class="columns is-centered">
        <div class="column is-4 has-text-centered">
            <h3 class="title has-text-grey">Sign Up</h3>
            <p class="subtitle has-text-grey">Please sign up to proceed.</p>
            <div class="box">
                <!--<figure class="avatar">
                    <img src="https://picsum.photos/128/128/?random">
                </figure>-->
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="field">
                        <div class="control">
                            <input id="name" class="input is-primary" type="text" name="name" value="{{ old('name') }}" required placeholder="Your Name" autofocus="">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input id="email" class="input is-primary" type="email" name="email"  value="{{ old('email') }}" required  placeholder="Your Email" autofocus="">
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <input id="password" class="input is-primary" type="password" name="password"  required placeholder="Your Password">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input id="password-confirm" class="input is-primary" type="password" name="password_confirmation" required placeholder="Confirm Your Password">
                        </div>
                    </div>
                    <button type="submit"  class="button is-block is-info is-primary is-fullwidth btn btn">Sign Up</button>
                </form>
            </div>
        </div>
    </div>            
@stop