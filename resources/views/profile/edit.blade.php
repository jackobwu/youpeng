@extends('layouts.base')

@section('title', "Update your profile")

@section('content')
    <div class="columns">
        <div class="column is-6">
            <div class="content">
                <h3>Update your profile</h3>
            </div>
            <form method="post" action="{{ route('profile.edit') }}">
                @csrf
                <div class="field">
                    <div class="control is-expanded">
                        <input class="input" name="username" type="text" placeholder="Your Name" autofocus>
                    </div>
                </div>

                <div class="field">
                    <div class="control is-expanded">
                        <input class="input" name="useremail" type="text" placeholder="Your Email">
                    </div>
                </div>
                
                <button type="submit"  class="button is-primary is-fullwidth">Submit</button>
            </form>
        </div>
    </div>  
@stop