@extends('layouts.app') @section('content')
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/ui-lightness/jquery-ui.css" type="text/css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@include('layouts.discussionrow', ['discussion' => $discussion])
<div class="container-fluid"> 
    @foreach($comments as $comment)
    @if (($comment->level) == 0)
    @include('layouts.commentrow', ['comment' => $comment])
    @endif
    @endforeach </div>
<div class="text-center">{{ $comments->links() }}</div>
<script src='https://code.jquery.com/jquery-2.2.1.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.4.1/snap.svg-min.js'></script> @endsection