<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscussionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discussions = Discussion::paginate(5);
        return view('welcome')->with('discussions', $discussions);
    }

    public function submit(Request $request)
    {
        $discussion = new Discussion($request->all());
        $request->user()->addDiscussion($discussion);
        return redirect('/welcome');

    }
}
