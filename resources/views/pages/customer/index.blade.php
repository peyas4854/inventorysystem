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
                <span class="mb-5">

                {{ $customers->links() }}
                </span>

            </div>
        </div>
    </section>

@endsection
<script>

</script>
<style>
    .w-5{
        display: none;
    }
</style>
