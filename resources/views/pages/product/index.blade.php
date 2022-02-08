@extends('layouts.master')

@section('head')
    <style>
        .w-5 {
            display: none;
        }
    </style>
@endsection
@section('page-wrapper')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Success!</strong>
            {{ Session::get('success') }}
        </div>

    @endif

    @if (Session::has('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Error!</h4>
            <p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </p>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-info float-right" href="{{route('product.create')}}">Add</a>
                        </div>
                        <div class="card-body">
                            <table class="table" id="example1">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">description</th>
                                    <th scope="col">Category</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->name  }}</td>
                                        <td>
                                            {{$product->description  }}


                                        </td>

                                        <td>

                                            @foreach($product->category as $category)
                                                <span
                                                     class="badge badge-pill badge-primary">
                                                    {{ $category->name }}</span>
                                            @endforeach</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <span class="mb-5">
{{--                            {{ $customers->links() }}--}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
