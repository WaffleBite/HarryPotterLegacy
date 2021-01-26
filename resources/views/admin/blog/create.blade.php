@extends('admin/layouts/app')

@section('admin-content')
    <script src="https://cdn.tiny.cloud/1/dbc0aa4ka7227a3c2c3zzbkdyzv2s03frg6usuenc4ve8q1f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <div class="content-wrapper">
        <h1>Create a blog post</h1>
    @include('includes.messages')

        <form role="form" action="/dashboard/posts" method='POST'>
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <label for="title">Blog title</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="postDescription">Post Description</label>
                        <input type="text" name="postDescription" class="form-control" id="postDescription" placeholder="short description">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea rows="4" type="textarea" name="content" class="form-control" id="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="writtenBy">Written By</label>
                        <input type="text" name="writtenBy" class="form-control" id="writtenBy">
                    </div>
                    <div class="custom-file">
                        <label class="custom-file-label" for="image">Choose image</label>
                        <input type="file" name="image" class="custom-file-input" id="image">
                    </div>
                    <div class="form-group">
                        <label for="tag">Select tags</label>
                        <select multiple class="form-control" name="tag" id="tag">
                            @foreach($tags as $tag)
                            <option value="{{$tag->tagSlug}}">{{$tag->tagName}}</option>
                            @endforeach
                        </select>
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
    </script>
@endsection
