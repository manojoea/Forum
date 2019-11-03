@extends('layouts.front')


@section('content')
    @include('threads.partials.success')
    @include('threads.partials.error')
    <div class="card border-primary bg-primary text-white mb-3">
{{--        <div class="card-header">Header</div>--}}
        <div class="card-body">
            <h4 class="card-title">{{$thread->subject}}</h4>
            <hr>
            <p class="card-text">{!! \Michelf\Markdown::defaultTransform($thread->thread) !!}</p>
            @if(auth()->user()->id == $thread->user_id)
                <p class="btn-edit">
                <a href="{{route('threads.edit', $thread->id)}}" class="" data-toggle="tooltip" data-placement="bottom" title="Edit Your Thread" data-original-title="Tooltip on bottom"><i class="fas fa-list-alt"></i></b>Edit</a>
                <form action="{{route('threads.destroy', $thread->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                        <input type="submit" class="btn-delete" value="X Delete">
                </form>
                </p>
                @endif
        </div>
    </div>
    <div class="ml-md-5">
    @foreach($thread->comments as $comment)

            <div class="card bg-light mb-2" style=" border-radius: 20px;">
{{--                <div class="card-header">Header</div>--}}
                <div class="card-body">
{{--                    <h5 class="card-title">Light card title</h5>--}}
                    <p><a href="#" class="text-info muted">{{$comment->user->name}}</a> Reply on <span class="text-muted float-md-right" style="font-size: 12px;">{{$comment->updated_at->diffForHumans()}}</span></p>
                    <p class="card-text">{{$comment->body}}</p>
                    <p class="btn-edit">
                        <a data-toggle="modal" href="#edit"><button  class="btn btn-info btn-sm edit-btn cmt-btn"><i class="fas fa-list-alt"></i>Edit</button></a>
                    <div class="modal fade" id="edit">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"></h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('comments.update', $comment->id)}}" method="post" role="form">
                                        @csrf
                                        @method('PUT')
                                        <legend>Update Comment</legend>
                                        <div class="form-group">
                                            <label for="edit-body">Edit your comment</label>
                                            <input type="text" class="form-control" name="body" id="edit-body" placeholder="Write a Comment....">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Reply</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    {{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <form action="{{route('comments.destroy', $comment->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm del-btn cmt-btn"><i class="fas fa-times-circle"></i>Delete</button>
                    </form>
                    </p>
                </div>
            </div>
        @foreach($comment->comments as $reply)
                <div class="small col-md-6 mr-5" style="margin-right: 20rem;">
                    <div class="card bg-light mb-3" style=" border-radius: 20px; max-width: 20rem; ">
                        {{--                <div class="card-header">Header</div>--}}
                        <div class="card-body">
                            {{--                    <h5 class="card-title">Light card title</h5>--}}
                            <p><a href="#" class="text-info muted">{{$comment->user->name}}</a> Reply on <span class="text-muted float-md-right" style="font-size: 12px;">{{$comment->updated_at->diffForHumans()}}</span></p>
                            <p class="card-text">{{$reply->body}}</p>
                            <p class="btn-edit">
{{--                                <a class="btn btn-primary" data-comment="hello" data-toggle="modal" href="#edit">Edit</a>--}}
                            <div class="modal fade" id="edit">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"></h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('addReplyComment.store', $reply->id)}}" method="post" role="form">
                                                @csrf
                                                @method('PUT')
                                                <legend>Update Comment</legend>
                                                <div class="form-group">
                                                    <label for="edit-body">Edit your Reply</label>
                                                    <input type="text" class="form-control" name="body" id="edit-body" placeholder="Write a Reply....">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Reply</button>
                                            </form>
                                        </div>
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--                                            --}}{{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                                        </div>--}}
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <form action="{{route('comments.destroy', $reply->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm del-btn"><i class="fas fa-times-circle"></i>Delete</button>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-6 mb-3 ">
                <form action="{{route('addReplyComment.store', $comment->id)}}" method="post" role="form">
                    @csrf
                    <h6>Reply the comment</h6>
                    <div class="form-group">

                        <input type="text" class="form-control form-control-sm" name="body"  placeholder="Write a reply....">
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Reply</button>
                </form>
            </div>
    @endforeach

    </div>

    <div class="col-md-9 mb-5">
        <form action="{{route('addThreadComment.store', $thread->id)}}" method="post" role="form">
            @csrf
            <legend>Create a Comment</legend>
            <div class="form-group">

                <input type="text" class="form-control" name="body"  placeholder="Write a Comment....">
            </div>
            <button type="submit" class="btn btn-primary">Reply</button>
        </form>
    </div>
@endsection

@section('js')
    <script>
        var simplemde = new SimpleMDE({ element: $("#thread")[0] });
    </script>
    <script>

    </script>

@endsection
