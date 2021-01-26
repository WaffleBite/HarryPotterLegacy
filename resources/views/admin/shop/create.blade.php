@extends('admin/layouts/app')

@section('admin-content')
    <script src="https://cdn.tiny.cloud/1/dbc0aa4ka7227a3c2c3zzbkdyzv2s03frg6usuenc4ve8q1f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <div class="content-wrapper">
        <h1>Create a product</h1>
        @include('includes.messages')
        <form role="form" action="/dashboard/products" method='POST'>
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" id="price">
                    </div>
                    <div class="form-group">
                        <label for="itemDescription">Description</label>
                        <textarea rows="4" type="textarea" name="itemDescription" class="form-control" id="itemDescription"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="categorySlug">Select a category</label>
                        <select class="form-control" name="categorySlug" id="categorySlug">
                            @foreach($categories as $category)
                                <option value="{{$category->slug}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="text" name="image" class="form-control" id="image">
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        tinymce.init({
            height: 400,
            selector: '#content',
            plugins: 'emoticons lists',
            toolbar: 'undo redo | fontselect fontsizeselect | removeformat | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'outdent indent | numlist bullist | emoticons'
        });
    </script>s
@endsection
