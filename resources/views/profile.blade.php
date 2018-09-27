@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 user-box">
            <div class="col-md-12">
                <div class="user-box row">
                    <div class="user-image col-xs-4">
                        <img class="user-profile-pic" width="50" height="50" src="{{ Avatar::create($user->name)->toBase64() }}" alt="">
                    </div>
                    <div class="user-description col-xs-8">
                        <span>{{ $user->name }}</span>
                        <span>{{ "@" . $user->username }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 tweet-timeline">
            <div class="card">
                <div class="card-body">
                    @foreach ($user->tweets as $tweet)
                    <div class="col-md-12">
                        <h5>
                            <a class="no-decoration" href="{{ route('tweets.show', $tweet->id) }}">{{ $tweet->body }}</a>
                        </h5>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
