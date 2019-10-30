@extends('layouts.front')
@section('heading', 'Create a Thread')
@section('content')

@include('threads.partials.success')
@include('threads.partials.error')
    <div class="well">
        <form action="{{route('threads.store')}}" method="post" role="form" id="create-thread-form">
            @csrf
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control {{$errors->has('subject') ? 'is-invalid':''}}" name="subject" id="subject" value="{{old('subject')}}" aria-describedby="emailHelp" placeholder="Subject">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control {{$errors->has('type') ? 'is-invalid':''}}" value="{{old('type')}}" name="type" id="type" placeholder="Type">
            </div>
            <div class="form-group">
                <label for="thread">Thread</label>
                <textarea class="form-control {{$errors->has('thread') ? 'is-invalid':''}}" id="thread" name="thread" value="{{old('thread')}}" placeholder="Thread"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
