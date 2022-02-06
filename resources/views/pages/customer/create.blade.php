@extends('layouts.master')
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
                        <li class="breadcrumb-item active">Customer Create</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2> Create Customer </h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('customer.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" placeholder="Enter email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="phone" class="form-control" placeholder="Enter phone" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="comment">address</label>
                                    <textarea class="form-control" rows="5" id="comment" name="address"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <div>
    <section>
@endsection

