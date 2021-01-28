@extends('layouts.welcome')

@section('content')
        <div id="shop" class="shop-container max-width mx-auto sm:px-6 lg:px-8">
            <div class="item-container">
                <img src="{{$product['image']}}" alt="">
                <h2 class="item-title">{{$product['name']}}</h2>
                <p>{{$product['price']}} sickles</p>
                <p>{!! $product->itemDescription !!}</p>
                <button>BUY</button>
            </div>
            <div class="category-container">

                @foreach($categories as $category)
                    <a href="/shop/category/{{$category['slug']}}">
                        <h3>{{$category->name}}</h3>
                    </a>
                @endforeach

            </div>
        </div>
@endsection
