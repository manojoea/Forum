@extends('layouts.front')


@section('content')
    @include('threads.partials.success')
    <div class="card border-primary mb-3">
{{--        <div class="card-header">Header</div>--}}
        <div class="card-body">
            <h4 class="card-title">{{$thread->subject}}</h4>
            <hr>
            <p class="card-text">{{$thread->thread}}</p>
            @if(auth()->user()->id == $thread->user_id)
            <p class="btn-edit">
                <a href="{{route('threads.edit', $thread->id)}}" class="data-toggle="tooltip" data-placement="bottom" title="Edit Your Thread" data-original-title="Tooltip on bottom""><i class="fas fa-list-alt"></i></b>Edit</a>
                <form action="{{route('threads.destroy', $thread->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                        <input type="submit" class="btn-delete" value="X Delete">


                </form>
            </p>
                @endif

        </div>
    </div>

@endsection