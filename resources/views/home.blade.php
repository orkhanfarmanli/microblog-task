@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('tweet') }}" method="post">
                        @csrf
                        <textarea class="form-control" name="body" rows="5" placeholder="What's happening?"></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <div class="col-md-12 tweets-wrapper">
                        @foreach (auth()->user()->tweets as $tweet)
                            <div>{{ $tweet->body }}</div>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
