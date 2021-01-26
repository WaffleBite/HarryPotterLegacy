@extends('admin/layouts/app')

@section('admin-content')
    <div class="content-wrapper">
        <h2 class="mssg">{{ session('mssg') }}</h2>
        @foreach($news as $article)
            <h2>{{$article->title}}</h2>
            <button>Edit</button>
            <button>Delete</button>
        @endforeach
    </div>
@endsection
