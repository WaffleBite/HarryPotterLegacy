@extends('admin/layouts/app')

@section('admin-content')
    <div class="content-wrapper">
        <h2 class="mssg">{{ session('mssg') }}</h2>
        @foreach($categories as $category)
            <h2>{{$category->name}}</h2>
            <button>Edit</button>
            <button>Delete</button>
        @endforeach
    </div>
@endsection
