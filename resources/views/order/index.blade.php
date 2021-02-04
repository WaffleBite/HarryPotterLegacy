@extends('layouts.welcome')

@section('content')
    <div id="order">
        <div class="max-width mx-auto sm:px-6 lg:px-8">
            <div style="margin: auto; width: fit-content; padding: 50px 0;">
                <h1>Your Order</h1>
                <form role="form" action="{{route('order.index', ['id' => $product->id])}}" method='POST'>
                    @csrf
                    <div class="order-container">
                        <img style="width: 300px" src="{{Storage::disk('local')->url($product->image)}}" alt="{{$product->name}}">
                        <p>{{$product->name}}</p>
                        <p>{{$product->price}} sickles</p>
                    </div>

                    <div class="details-container">
                        <p style="border-bottom: 1px solid; width: fit-content">Your details</p>
                        <li>Name: {{Auth::user()->name}}</li>
                        <li>E-mail: {{Auth::user()->email}}</li>
                        <li>Available sickles: {{Auth::user()->sickles}} sickles</li>
                    </div>
                    <button type="submit" class="buy-button">BUY</button>
                </form>

            </div>

        </div>
    </div>
@endsection
