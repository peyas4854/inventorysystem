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
                    <h1 class="m-0">Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
    <div class="modal" tabindex="-1" role="dialog" id="editCategoryModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" value="" placeholder="Category Name" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                 </form>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header">
                            <h3>Categories</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($categories as $category)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            {{ $category->name }}

                                            <div class="button-group d-flex">
                                                <button type="button" class="btn btn-sm btn-primary mr-1 edit-category"
                                                        data-toggle="modal" data-target="#editCategoryModal"
                                                        data-id="{{ $category->id }}" data-name="{{ $category->name }}">
                                                    Edit
                                                </button>

                                                <form action="{{ route('category.destroy', $category->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>

                                        @if ($category->children)
                                            <ul class="list-group mt-2">
                                                @foreach ($category->children as $child)
                                                    <li class="list-group-item">
                                                        <div class="d-flex justify-content-between">
                                                            {{ $child->name }}

                                                            <div class="button-group d-flex">
                                                                <button type="button"
                                                                        class="btn btn-sm btn-primary mr-1 edit-category"
                                                                        data-toggle="modal"
                                                                        data-target="#editCategoryModal"
                                                                        data-id="{{ $child->id }}"
                                                                        data-name="{{ $child->name }}">Edit
                                                                </button>

                                                                <form
                                                                    action="{{ route('category.destroy', $child->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Create Category</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <select class="form-control" name="parent_id">
                                        <option value="">Select Parent Category</option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                           placeholder="Category Name" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $('.edit-category').on('click', function () {

            console.log('sdf');
            let id = $(this).data('id');
            let name = $(this).data('name');
            let url = "{{ url('category') }}/" + id;

            $('#editCategoryModal form').attr('action', url);
            $('#editCategoryModal form input[name="name"]').val(name);
        });
    </script>
@endsection
