<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $comments = Comment::where('discussion_id', '=', $id)->paginate(10);
        $discussion = Discussion::where('id', '=', $id)->first();
        return view('comments')->with('comments', $comments)->with('discussion', $discussion);
    }
    
       public function submit(Request $request)
    {
        $this->middleware('auth');
        $comment = new Comment($request->all());
        $request->user()->addComment($comment);
        return redirect(url('comments/'.$request->discussion_id.'/'));

    }
}
