@extends('layouts.default')

@section('content')

<div class="jumbotron">
    <h1>Welcome to Larabook!</h1>
    <p>Welcome to the premier place to talk about Laravel. Why don't you sign up and see what the fuss is all about?</p>
    @if ( ! $currentUser )
    <p>
        {{ link_to_route('register_path', 'Sign Up', null, ['class' => 'btn btn-large btn-primary']) }}
    </p>
    @endif
</div>
@stop