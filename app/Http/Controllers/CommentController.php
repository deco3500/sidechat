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
        $rootcomments = Comment::where('discussion_id', '=', $id)->whereNull('parent_id')->orderByRaw('ABS(score) asc')->orderByRaw('ABS(no_ratings) desc')->orderBy('created_at', 'DESC')->paginate(10);
        $comments = Comment::where('discussion_id', '=', $id)->orderBy('created_at', 'DESC')->get();
        $discussion = Discussion::where('id', '=', $id)->first();
        return view('comments')->with('comments', $comments)->with('discussion', $discussion)->with('rootcomments', $rootcomments);
    }
    
       public function submit(Request $request)
    {
        $this->middleware('auth');
        $comment = new Comment($request->all());
        $request->user()->addComment($comment);
        return redirect(url('comments/'.$request->discussion_id.'/'));

    }
    
    public function submitVote(Request $request)
    {
        $this->middleware('auth');
        
        $comment = Comment::where('id', '=', $request->comment_id)->first();
        $oldscore = $comment->score;
        $old_no_ratings = $comment->no_ratings;
        if ($old_no_ratings == 0){
            $comment->score = $request->balance;
            $comment->no_ratings = 1;
            $comment->save();
        } else {
            $comment->score = (($oldscore * $old_no_ratings) + $request->balance) / ($old_no_ratings + 1);
            $comment->no_ratings = $old_no_ratings + 1;
            $comment->save();
            $discussion = Discussion::where('id', '=', $request->discussion_id)->first();
            $discussion->ratio = $discussion->getRatio();
            $discussion->save();
        }
        return redirect(url('comments/'.$request->discussion_id.'/'));

    }
}