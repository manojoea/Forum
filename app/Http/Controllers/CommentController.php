<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addThreadComment(Request $request, Thread $thread){
        // Validate Comment
        $this->validate($request, [
            'body' => 'required'
        ]);
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;
        $thread->comments()->save($comment);
        session()->flash('msg', 'Comment has been Created');
        return back();
    }

    public function addReplyComment(Request $request, Comment $comment){
        // Validate Comment
        $this->validate($request, [
            'body' => 'required'
        ]);
        $reply = new Comment();
        $reply->body = $request->body;
        $reply->user_id = auth()->user()->id;
        $comment->comments()->save($reply);
        session()->flash('msg', 'Reply has been Created');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        $comment->update($request->all());
        session()->flash('msg', 'Comment has been updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        session()->flash('del', 'Comment has been deleted');
        return redirect()->back();

    }
}
