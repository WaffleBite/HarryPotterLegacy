@extends('admin/layouts/app')

@section('admin-content')
    <div class="content-wrapper">
        <h1>Edit category "{{$category->name}}"</h1>
        @include('includes.messages')

        <form role="form" action="{{route('category.update' , $category->id)}}" method='POST'>
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <label for="name">Category name</label>
                        <input value="{{$category->name}}" type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input value="{{$category->slug}}" type="text" name="slug" class="form-control" id="slug">
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
