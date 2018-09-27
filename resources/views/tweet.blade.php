@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {{ $tweet->body }}
                    <hr>
                    <a class="no-decoration" href="{{ route('profile', $tweet->author['username']) }}">{{ $tweet->author['name'] ." @". $tweet->author['username'] }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
