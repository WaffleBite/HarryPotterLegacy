@extends('layouts.welcome')

@section('content')
    <div id="order">
        <div class="max-width mx-auto sm:px-6 lg:px-8">
            <div class="order-error">
                <h1>Could not complete purchase</h1>
                <h2 class="mssg">{{ session('mssg') }}</h2>
                <button class="buy-button"><a href="{{route('user.account')}}">Back to my account</a></button>
            </div>
        </div>
    </div>
@endsection
