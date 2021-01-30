@extends('admin/layouts/app')

@section('headSection')
    <link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection

@section('admin-content')
    <script src="https://cdn.tiny.cloud/1/dbc0aa4ka7227a3c2c3zzbkdyzv2s03frg6usuenc4ve8q1f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <div class="content-wrapper">
        <h1>Create a blog post</h1>
    @include('includes.messages')

        <form role="form" action="/dashboard/posts" method='POST' enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <label for="title">Blog title</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Post Description</label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="short description">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea rows="4" type="textarea" name="content" class="form-control" id="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="writtenBy">Written By</label>
                        <input type="text" name="writtenBy" class="form-control" id="writtenBy">
                    </div>
                    <div class="form-group">
                        <label for="smallPic">Thumbnail Picture</label>
                        <input type="file" name="smallPic" id="smallPic">
                    </div>
                    <div class="form-group">
                        <label for="picture">Picture</label>
                        <input type="file" name="picture" id="picture">
                    </div>
                    <div class="form-group" style="margin-top:18px;">
                        <label>Select Tags</label>
                        <select name="tags[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a tag" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->tagName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="published">Publish</label>
                        <input type="checkbox" id="published" name="published" value="published">
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
@section('footerSection')
    <script src="/admin/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function () {
            $('.select2').select2()
        })
    </script>
@endsection
