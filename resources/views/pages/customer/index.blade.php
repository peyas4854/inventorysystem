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
                    <h1 class="m-0">Customer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Customer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-info float-right" href="{{route('customer.create')}}">Add</a>
                        </div>
                        <div class="card-body">
                            <table class="table" id="example1">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{$customer->name  }}</td>
                                        <td>{{$customer->email  }}</td>
                                        <td>{{$customer->phone  }}</td>
                                        <td>{{$customer->address  }}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <span class="mb-5">
                            {{ $customers->links() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
