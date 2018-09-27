@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 user-box">
            <img class="profile-pic" src="{{ Avatar::create($user->name)->toBase64() }}" />
            <div class="description">
                <span>
                    {{ $user->name }}
                </span>
                <br>
                <span>
                    {{ "@".$user->username }}
                </span>
            </div>
        </div>
        <div class="col-md-8 tweet-timeline">
            @foreach ($user->tweets as $tweet)
                <div class="col-md-12">
                    <h5>
                        {{ $tweet->body }}
                    </h5>
                    <br>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
