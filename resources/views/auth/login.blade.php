@extends('layouts.base')

@section('title', "Sign in")

@section('content')
    <div class="columns is-centered">
        <div class="column is-4 has-text-centered">
            <h3 class="title has-text-grey">Sign In</h3>
            <p class="subtitle has-text-grey">Please login to proceed.</p>
            <div class="box">
                <!--<figure class="avatar">
                    <img src="https://picsum.photos/128/128/?random">
                </figure>-->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="field">
                        <div class="control">
                            <input class="input is-primary" name="email" id="email" type="email" value="{{ old('email') }}" required  placeholder="Your Email" autofocus>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <input class="input is-primary" name="password" id="password" type="password"   required placeholder="Your Password">
                        </div>
                    </div>
                    <div class="field">
                        <label class="checkbox">
                                <input type="checkbox">
                                Remember me
                        </label>
                    </div>
                    <button type="submit"  class="button is-block is-info is-primary is-fullwidth">Login</button>
                </form>
            </div>
            <p class="has-text-grey">   
                <a href="{{ route('password.request') }}">Forgot Password</a> &nbsp;·&nbsp;
            </p>
        </div>
    </div>
@stop