@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @foreach($discussions as $discussion)
            @include('layouts.discussionrow', ['discussion' => $discussion])
        @endforeach
        <div class="text-center">{{ $discussions->links() }}</div>
        <script src='https://code.jquery.com/jquery-2.2.1.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.4.1/snap.svg-min.js'></script>

        <script src="js/gauge.js"></script>

</div>
@endsection