@extends('layouts.welcome')

@section('content')
    <div id="shop-header"></div>
    <div id="shop" class="max-width mx-auto sm:px-6 lg:px-8">
        @if($categoryName!="")
            <h2>{{$categoryName->name}}</h2>
        @else{
            <h2>Limited Offers</h2>
        }
        @endif

        <div class="shop-container">
            <div class="product-container">
                @foreach($listProducts as $item)
                    <a href="/shop/{{$item['id']}}">
                        <img src="{{Storage::disk('local')->url($item->image)}}" alt="{{$item['name']}}">
                        <h2>{{$item['name']}}</h2>
                        <p>{{$item['price']}} sickles</p>
                    </a>
                @endforeach
            </div>
            <div class="category-container">
                @foreach($categories as $category)
                    <a href="/shop/category/{{$category['slug']}}">
                        <h3>{{$category->name}}</h3>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
