@extends('layouts.welcome')

@section('content')
    <div>
        <div class="product-container">
            <img src="{{$product['image']}}" alt="">
            <h2>{{$product['name']}}</h2>
            <p>{{$product['description']}}</p>
            <button>Buy</button>
        </div>
    </div>
@endsection
