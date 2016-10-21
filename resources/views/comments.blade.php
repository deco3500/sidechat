@extends('layouts.app') @section('content')
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/ui-lightness/jquery-ui.css" type="text/css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="row discussion-row">
    <div class="col-lg-2 col-sm-3 text-right">
        <div class="metric" data-ratio="{{$discussion->ratio}}">
            <svg viewBox="0 0 1000 500">
                <path d="M 950 500 A 450 450 0 0 0 50 500"></path>
                <text class='percentage' text-anchor="middle" alignment-baseline="middle" x="500" y="300" font-size="140" font-weight="bold">10/10</text>
                <text class='swing' text-anchor="middle" alignment-baseline="middle" x="500" y="450" font-size="90" font-weight="normal">Balanced</text>
            </svg>
        </div>
    </div>
    <div class="col-lg-10  col-sm-9">
        <h2><a href="{{$discussion->url}}">{{$discussion->title}}</a></h2> &nbsp;&nbsp;&nbsp;&nbsp; ({{$discussion->hostDomain()}})
        <br> submitted {{$discussion->timeSincePost()}} ago by <a href="#">{{$discussion->poster()}}</a>
        <br> <b><a href="{{ url('comments/'.$discussion->id.'/') }}">{{$discussion->commentCount()}} comments</a>       share</b> <a href="#" onclick="replyFieldShowDiscussion()">Post a Comment</a> </div>
        <form class="col-lg-10  col-sm-9" style="width:50%;" method="POST" action="/submitcomment">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea id="replydiscussion" name="text" class="form-control" style="display:none;" maxlength=""></textarea>
                </div>
                    <input type="hidden" name="level" value="0">
                    <input type="hidden" name="discussion_id" value="{{$discussion->id}}">
                <div class="form-group">
                    <button id="submitdiscussion" type="submit" class="btn btn-primary" style="display:none;">Submit</button>
                </div>
            </form>
</div>
<div class="container-fluid"> 
    @foreach($rootcomments as $rootcomment)
    @include('layouts.commentrow', ['comment' => $rootcomment])
    @endforeach </div>
<div class="text-center">{{ $rootcomments->links() }}</div>
<script src='https://code.jquery.com/jquery-2.2.1.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.4.1/snap.svg-min.js'></script> @endsection