@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="wrap">
                        <h4>Your Stats</h4>
                        <div class="holder">
                            <div class="bar cf" data-ratio=".2">
                                <span class="label">SOCIAL</span></div>
                            <div class="bar cf" data-ratio=".5">
                                <span class="label">POWER</span></div>
                            <div class="bar cf" data-ratio="-.3"><span class="label">ECONOMIC</span></div>
                            <div class="bar cf" data-ratio="-.5"><span class="label">WAR</span></div>
                            <div class="bar cf" data-ratio="-.2"><span class="label">ENVIRONMENT</span></div>
                            <div class="verticalLine" data-ratio="-.5">VL</div>
                            <div class="verticalLine" data-ratio="-.3">L</div>
                            <div class="verticalLine" data-ratio="-.1">C</div>
                            <div class="verticalLine" data-ratio=".1">R</div>
                            <div class="verticalLine" data-ratio=".3">VR</div>



                        </div>
            </div>
        </div>
    </div>
</div>
    <script src="js/bar.js"></script>
@endsection
