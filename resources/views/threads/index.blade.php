@extends('layouts.front')

@section('content')
    @include('threads.partials.delete')
    <h2 class="mt-3">Threads</h2>
    @include('threads.partials.thread-list')

@endsection
