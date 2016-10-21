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
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discussions = Discussion::where('ratio', '!=', 1)->orderByRaw('ABS(ratio) asc')->paginate(5);
        return view('welcome')->with('discussions', $discussions);
    }
    
    public function newIndex()
    {
        $discussions = Discussion::orderBy('created_at','desc')->paginate(5);
        return view('newDiscussions')->with('discussions', $discussions);
    }
    
    public function topIndex()
    {
        $discussions = Discussion::where('ratio', '!=', 1)->orderByRaw('ABS(ratio) asc')->paginate(5);
        return view('top')->with('discussions', $discussions);
    }
    
    public function controversialIndex()
    {
        $discussions = Discussion::where('ratio', '!=', 1)->orderByRaw('ABS(ratio) desc')->paginate(5);
        return view('controversial')->with('discussions', $discussions);
    }

    public function submit(Request $request)
    {
        $this->middleware('auth');
        $discussion = new Discussion($request->all());
        $request->user()->addDiscussion($discussion);
        return redirect('/welcome');

    }

}
