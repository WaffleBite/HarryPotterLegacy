@extends('layouts.welcome')

@section('content')
    <div class="user-container">
        @include('user.left-menu')
        <div class="right-content">
            <h1 style="color:#2f2f2f;">Edit account details</h1>

            <form role="form" action="{{route('user.updateMyAccount')}}" method='POST'>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">User name</label><br>
                    <input value="{{$user->name}}" type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">User E-mail</label><br>
                    <input value="{{$user->email}}" type="email" name="email" class="form-control" id="email">
                </div>

                <div class="box-footer">
                    <button type="submit">Update</button>
                </div>
            </form>
        </div>

@endsection
