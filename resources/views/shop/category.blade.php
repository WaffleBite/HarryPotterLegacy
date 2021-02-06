@extends('layouts.welcome')

@section('content')
    <div id="shop-header"></div>
    <div id="shop" class="max-width mx-auto sm:px-6 lg:px-8">
        @if($categoryName!="")
            <h2 class="category-name">{{$categoryName->name}}</h2>
        @else{
            <h2 class="category-name">Limited Offers</h2>
        }
        @endif

        <div class="shop-container">
            @include('shop.category-menu')
            <div class="product-container">
                @foreach($listProducts as $item)
                    <a href="/shop/{{$item['id']}}">
                        <div><img class="img-hover" src="{{Storage::disk('local')->url($item->image)}}" alt="{{$item['name']}}"></div>
                        <h2>{{$item['name']}}</h2>
                        <p>{{$item['price']}} sickles</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
