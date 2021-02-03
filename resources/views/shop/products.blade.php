@extends('layouts.welcome')

@section('content')
    <div id="shop-header"></div>
    <div id="shop" class="max-width mx-auto sm:px-6 lg:px-8">
        <h2>Limited Offers</h2>
        <div class="shop-container">
            <div class="product-container">
                @foreach($products as $item)
                        <a href="/shop/{{$item->id}}">
                            <img class="img-hover" src="{{Storage::disk('local')->url($item->image)}}" alt="{{$item['name']}}">
                            <h2>{{$item['name']}}</h2>
                            <p>{{$item['price']}} sickles</p>
                        </a>
                @endforeach
            </div>
            @include('shop.category-menu')
        </div>
    </div>
@endsection
