@extends('admin/layouts/app')

@section('admin-content')
    <div class="content-wrapper">
        <h1>Edit tag "{{$tag->tagName}}"</h1>
        @include('includes.messages')
        <form role="form" action="{{route('tag.update', $tag->id)}}" method='POST'>
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <label for="tagName">Tag name</label>
                        <input value="{{$tag->tagName}}" type="text" name="tagName" class="form-control" id="tagName">
                    </div>
                    <div class="form-group">
                        <label for="tagSlug">Slug for tag</label>
                        <input value="{{$tag->tagSlug}}" type="text" name="tagSlug" class="form-control" id="tagSlug">
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
