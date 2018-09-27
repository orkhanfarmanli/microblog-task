@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h4>Other users</h4>
            @foreach ($users as $user)    
            <a class="no-decoration" href="{{ route('profile', $user->username) }}">
                <div class="col-md-12">
                    <div class="user-box row">
                        <div class="user-image col-xs-4">
                            <img class="user-profile-pic" width="50" height="50" src="{{ Avatar::create($user->name)->toBase64() }}" alt="">
                        </div>
                        <div class="user-description col-xs-8">
                            <span>{{ $user->name }}</span>
                            <span>{{ "@" . $user->username }}</span>
                            <br>
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
                        </div>
                    </div>
                </div>
            </a>
            <hr>
            @endforeach
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Timeline</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('tweets.store') }}" method="post">
                        @csrf
                        <textarea class="form-control" name="body" rows="5" placeholder="What's happening?">{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <div class="col-md-12 tweets-wrapper">
                        @foreach ($timeline as $tweet)
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <img class="user-profile-pic" width="50" height="50" src="{{ Avatar::create($tweet->author_name)->toBase64() }}" alt="">
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <a class="no-decoration" href="{{ route('profile', $tweet->author_username) }}">{{ $tweet->author_name . " @" . $tweet->author_username }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="no-decoration black-text" href="{{ route('tweets.show', $tweet->id) }}">{{ $tweet->body }}</a>                            
                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
