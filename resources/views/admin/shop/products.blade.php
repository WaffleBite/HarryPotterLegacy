@extends('admin/layouts/app')

@section('headSection')
    <link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('admin-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">products</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-success" href="{{route('create.product')}}">Add new</a>
                    <h2 class="mssg">{{ session('mssg') }}</h2>
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->categorySlug}}</td>
                                        <td><a href="{{route('product.edit', $product->id)}}"><button style="padding: 1px 10px;" class="btn btn-outline-primary">Edit</button></a></td>
                                        <td>
                                            <form id="delete-form-{{$product->id}}" action="{{ route('product.destroy', $product->id) }}" method='POST'>
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="if(confirm('Are you sure you want to delete this?'))
                                                {
                                                document.getElementById('delete-form-{{$product->id}}').submit();
                                                }
                                                else{event.preventDefault();}"
                                                    style="padding: 1px 10px;" class="btn btn-outline-danger">Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

@section('footerSection')
    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
