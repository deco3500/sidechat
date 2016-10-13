@extends('layouts.app')

@section('content')
    <form method="POST" action="/wishlists">
        {{csrf_field()}}
        <div class="form-group">
            <textarea name="wishlist_name" class="form-control" ></textarea>
        </div>

        <div class="form-group">
            <button type="submit"  class="btn btn-primary">Add</button>
        </div>
    </form>

</div>
@endsection