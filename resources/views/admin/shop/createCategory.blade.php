@extends('admin/layouts/app')

@section('admin-content')
    <div class="content-wrapper">
        <h1>Create a category</h1>
        @include('includes.messages')

        <form role="form" action="/dashboard/categories" method='POST'>
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <label for="name">Category name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug">
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
