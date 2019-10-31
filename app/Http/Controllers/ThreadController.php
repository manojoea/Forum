<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThreadController extends Controller
{
    function __construct()
    {
        return $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::paginate(15);

        return view('threads.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $this->validate($request, [
            'subject' => 'required|min:10',
            'type' => 'required',
            'thread' => 'required|min:20'
        ]);

        // Store
        auth()->user()->threads()->create($request->all());
//        Thread::create($request->all());

        // Redirect
        session()->flash('msg', 'Thread Created');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        return view('threads.single', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('threads.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        // Authorize
        if (auth()->user()->id !== $thread->user_id){
            abort(401,'Unauthorized');
        }
        // Validate
        $this->validate($request, [
            'subject' => 'required|min:10',
            'type' => 'required',
            'thread' => 'required|min:20'
        ]);

        // Update
        $thread->update($request->all());

        // Redirect
        session()->flash('msg', 'Thread Updated');
        return redirect()->route('threads.show', $thread->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        // Authorize
        if (auth()->user()->id !== $thread->user_id){
            abort(401,'Unauthorized');
        }

        // Delete Thread
        $thread->delete();
        session()->flash('msg', 'Thread Deleted');
        return redirect()->route('threads.index');

    }
}
