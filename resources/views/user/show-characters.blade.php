@extends('layouts.welcome')

@section('content')
    <div class="user-container">
        @include('user.left-menu')
        <div class="right-content orders">
            @foreach($characters as $character)
                <p>{{$character->name}}</p>
            @endforeach
        </div>
    </div>
@endsection
