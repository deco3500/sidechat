@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @foreach($discussions as $discussion)
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
                    <br>
                    submitted {{$discussion->timeSincePost()}} ago by <a href="#">{{$discussion->poster()}}</a>
                    <br>
                    <b>944 comments      share</b>
                </div>
            </div>
        @endforeach
        <div class="text-center">{{ $discussions->links() }}</div>
        <script src='https://code.jquery.com/jquery-2.2.1.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.4.1/snap.svg-min.js'></script>

        <script src="js/gauge.js"></script>

</div>
@endsection