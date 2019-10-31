<div class="list-group">
    @forelse($threads as $thread)

        <a href="{{route('threads.show', $thread->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-2">{{$thread->subject}}</h5>
                <small>{{$thread->updated_at->diffForHumans()}}</small>
            </div>
            <p class="mb-1">{{$thread->thread}}</p>
            {{--                <small>Donec id elit non mi porta.</small>--}}
        </a>
    @empty
        <h5>No threads</h5>
    @endforelse
</div>