<div class="row" style="position:relative; left:{{($comment->level) * 3}}0px; ">
        <div class="col-lg-10  col-sm-9" data-score="{{$comment->score}}">
            <h5><p><b>{{$comment->poster()}}</b> submitted {{$comment->timeSincePost()}} ago</p></h5>
            <p>{{$comment->text}}</p> <a href="#" onclick="replyFieldShow({{$comment->id}})">Reply</a>
            <br>
            <form method="POST" action="/submitcomment">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea id="reply{{$comment->id}}" name="text" class="form-control" style="display:none;" maxlength=""></textarea>
                </div>
                    <input type="hidden" name="level" value="{{$comment->level + 1}}">
                    <input type="hidden" name="discussion_id" value="{{$comment->discussion_id}}">
                    <input type="hidden" name="parent_id" value="{{$comment->id}}">
                <div class="form-group">
                    <button id="submit{{$comment->id}}" type="submit" class="btn btn-primary" style="display:none;">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <form method="POST" action="/submitvote">
        {{csrf_field()}}
        <div class="slidercontainer" style="position:relative; max-width: 500px; left:{{($comment->level) * 3}}0px; "> <span class="slider" style="position:relative; width:50%; display:inline-block;"></span>
        <div class="balance" style="border:0; color:#17b494; font-weight:bold; display:inline-block;">Balanced</div>
        <input class="hiddenbalance" type="hidden" name="balance" value=0>
        <input type="hidden" name="comment_id" value="{{$comment->id}}">
            <input type="hidden" name="discussion_id" value="{{$comment->discussion_id}}">
        <button type="submit" class="btn btn-primary" style="display:inline-block;">Confirm Vote</button>
    </form>
    </div> 
    @foreach($comments as $commentreply)
    @if ((($commentreply->level) == $comment->level + 1) && (($commentreply->parent_id) == ($comment->id)))
    @include('layouts.commentrow', ['comment' => $commentreply])
    @endif
    @endforeach