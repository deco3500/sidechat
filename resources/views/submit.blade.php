@extends('layouts.app')

@section('content')
    <form method="POST" action="/submit">
        {{csrf_field()}}

        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="form-group">
                    <textarea name="title" placeholder="Title" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                    <textarea name="url" placeholder="URL" class="form-control" ></textarea>
                </div>

                <input type="hidden" name="ratio" value=1>

                <label class="checkbox-inline"><input type="checkbox" value="">Social</label>
                <label class="checkbox-inline"><input type="checkbox" value="">Power</label>
                <label class="checkbox-inline"><input type="checkbox" value="">Economy</label>
                <label class="checkbox-inline"><input type="checkbox" value="">Environment</label>
                <label class="checkbox-inline"><input type="checkbox" value="">War</label>

                <div class="form-group">
                    <button type="submit"  class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>

    </form>

</div>
@endsection