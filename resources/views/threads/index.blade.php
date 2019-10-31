@extends('layouts.front')
@section('button')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-10"></div>
            <div class="col-md-2"><a href="{{route('threads.create')}}" class="btn btn-info">Create Thread</a></div>
        </div>
    </div>

@endsection
@section('content')
    @include('threads.partials.delete')
    @include('threads.partials.thread-list')

@endsection
