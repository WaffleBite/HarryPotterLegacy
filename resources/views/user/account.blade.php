@extends('layouts.welcome')

@section('content')
    <div class="user-container">
        @include('user.left-menu')
        <div class="right-content">
            <h2 class="mssg">{{ session('mssg') }}</h2>
            <h1 style="color: #2f2f2f;">Your Dashboard</h1>
            <p>Username: {{Auth::user()->name}}</p>
            <p>E-mail: {{Auth::user()->email}}</p>
            <p>Available sickles: {{Auth::user()->sickles}}</p>
        </div>
    </div>

@endsection
