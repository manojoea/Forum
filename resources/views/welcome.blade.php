@extends('layouts.front')
@section('banner')
    <div class="jumbotron">
        <div class="container">
            <h1>Join Community</h1>
            <p>Help and Get help</p>
            <p>
                <a href="#" class="btn btn-primary btn-lg">Join Us</a>
            </p>
        </div>
    </div>
@endsection
@section('heading', 'Threads')

@section('content')

    @include('threads.partials.thread-list')

@endsection
