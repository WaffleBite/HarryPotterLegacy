@extends('admin/layouts/app')

@section('admin-content')
    <div class="content-wrapper">
        <h2 class="mssg">{{ session('mssg') }}</h2>
        @foreach($tags as $tag)
            <h2>{{$tag->tagName}}</h2>
            <button>Edit</button>
            <button>Delete</button>
        @endforeach
    </div>
@endsection
