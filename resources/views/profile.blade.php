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
                        @if (auth()->user()->id != $user->id)    
                            @if (auth()->user()->is_following($user->id))
                            <form action="{{ route('user.unfollow', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm" href="{{ route('user.unfollow', $user->id) }}">Unfollow</button>
                            </form>
                            @else
                            <form action="{{ route('user.follow', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm" href="{{ route('user.follow', $user->id) }}">Follow</button>
                            </form>
                            @endif
                        @endif
                        
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
