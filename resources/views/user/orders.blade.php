@extends('layouts.welcome')

@section('content')
    <div class="user-container">
        @include('user.left-menu')
        <div class="right-content orders">
                @foreach($products as $product)
                    <h2><a href="/shop/{{$product->id}}">{{$product->name}}</a></h2>
                @endforeach
        </div>
    </div>
@endsection
