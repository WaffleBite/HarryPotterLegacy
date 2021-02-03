@extends('layouts.welcome')

@section('content')
        <div id="shop" class="shop-container max-width mx-auto sm:px-6 lg:px-8">
            <div class="item-container">
                <img src="{{Storage::disk('local')->url($product->image)}}" alt="{{$product['name']}}">
                <h2 class="item-title">{{$product['name']}}</h2>
                <p>{{$product['price']}} sickles</p>
                <p>{!! $product->itemDescription !!}</p>
                @can('user')
                    <a href='{{route('order.index', ['id' => $product->id])}}'><button class="buy-button">BUY</button></a>
                @endcan
            </div>
            @include('shop.category-menu')
        </div>
@endsection
