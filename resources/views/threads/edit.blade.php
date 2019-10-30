@extends('layouts.front')
@section('heading', 'Edit the Thread')
@section('content')


@include('threads.partials.error')
    <div class="well">
        <form action="{{route('threads.update', $thread->id)}}" method="post" role="form" id="create-thread-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control {{$errors->has('subject') ? 'is-invalid':''}}" name="subject" id="subject" value="{{$thread->subject}}" aria-describedby="emailHelp" placeholder="Subject">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control {{$errors->has('type') ? 'is-invalid':''}}" value="{{$thread->type}}" name="type" id="type" placeholder="Type">
            </div>
            <div class="form-group">
                <label for="thread">Thread</label>
                <textarea class="form-control {{$errors->has('thread') ? 'is-invalid':''}}" id="thread" name="thread" placeholder="Thread">{{$thread->thread}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
