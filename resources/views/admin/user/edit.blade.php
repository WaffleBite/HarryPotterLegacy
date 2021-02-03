@extends('admin/layouts/app')

@section('headSection')
    <link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection

@section('admin-content')
    <div class="content-wrapper">
        <h1>Edit user "{{$user->name}}"</h1>
        @include('includes.messages')
        <form role="form" action="{{route('user.update', $user->id)}}" method='POST'>
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <label for="name">User name</label>
                        <input value="{{$user->name}}" type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">User E-mail</label>
                        <input value="{{$user->email}}" type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label>Roles</label>
                        <select name="roles[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a role" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            @foreach ($role as $role)
                                <option value="{{ $role->id }}"
                                        @foreach($user->roles as $userRole)
                                        @if($userRole->id == $role->id)
                                        selected
                                    @endif
                                    @endforeach
                                >{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('footerSection')
    <script src="/admin/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function () {
            $('.select2').select2()
        })
    </script>
@endsection
