@extends('admin/layouts/app')

@section('admin-content')
    <div class="content-wrapper">
        <h1>Add a tag</h1>
        @include('includes.messages')
        <form role="form" action="/dashboard/tags" method='POST'>
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <label for="tagName">Tag name</label>
                        <input type="text" name="tagName" class="form-control" id="tagName">
                    </div>
                    <div class="form-group">
                        <label for="tagSlug">Slug for tag</label>
                        <input type="text" name="tagSlug" class="form-control" id="tagSlug">
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
