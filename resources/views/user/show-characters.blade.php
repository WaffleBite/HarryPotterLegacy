@extends('layouts.welcome')

@section('content')
    <div class="user-container">
        @include('user.left-menu')
        <div class="right-content orders">
            @foreach($characters as $character)
                <div class="character-list">
                    <h3>{{$character->name}}</h3>
                    <p>{{$character->house}}</p>
                </div>

            @endforeach
        </div>
    </div>
@endsection
