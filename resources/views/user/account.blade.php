@extends('layouts.welcome')

@section('content')
    <div class="user-container">
        @include('user.left-menu')
        <div class="right-content">
            <h1 style="color: #2f2f2f;">Your Dashboard</h1>
            <p>Username: {{Auth::user()->name}}</p>
            <p>E-mail: {{Auth::user()->email}}</p>
        </div>
    </div>

@endsection
