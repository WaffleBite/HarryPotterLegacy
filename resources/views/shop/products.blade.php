@extends('layouts.welcome')

@section('content')
    <div>
        <div class="product-container">
            @foreach($products as $item)
                <a href="/shop/{{$item['id']}}">
                    <h2>{{$item['name']}}</h2>
                </a>

            @endforeach
        </div>
    </div>
@endsection
