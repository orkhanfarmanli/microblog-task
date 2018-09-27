@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {{ $tweet->body }}
                    <hr>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <a class="no-decoration" href="{{ route('profile', $tweet->author['username']) }}">{{ $tweet->author['name'] ." @". $tweet->author['username'] }}</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row justify-content-end">
                                    @if (auth()->user()->username == $tweet->author['username'])
                                        <form action="{{ route('tweets.destroy', $tweet->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
