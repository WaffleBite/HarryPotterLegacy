@extends('layouts.welcome')

@section('content')
    <div class="user-container">
        @include('user.left-menu')
        <div class="right-content buy-sickles">
            <h1 style="color: #2f2f2f;">Buy Sickles</h1>
            <form role="form" action="{{route('user.update.sickles')}}" method='POST'>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="sickles">Select a bundle</label> <br>
                    <select class="form-control" name="sickles" id="sickles">
                        <option value="1000">1000 Sickles</option>
                        <option value="1500">1500 Sickles</option>
                        <option value="2000">2000 Sickles</option>
                        <option value="3000">3000 Sickles</option>
                        <option value="5000">5000 Sickles</option>
                        <option value="10000">10 000 Sickles</option>
                    </select>
                </div>

                <div class="box-footer">
                    <button type="submit">BUY</button>
                </div>
            </form>
        </div>
    </div>

@endsection
