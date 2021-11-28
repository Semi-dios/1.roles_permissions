@extends('layouts.app')

@section('content')
    <div class="row mb-5">
        <div class="col-12 d-flex justify-content-around">
            <div class="">
                <h2>LIST OF PRODUCTS</h2>
            </div>

            @can('role-create')
                <div class="">
                    <a href="{{ route('products.create') }}" class="btn btn-success">Create a New Products</a>
                </div>
            @endcan
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table w-100">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th style="min-width: 300px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listProducts as $key => $product)
                            <tr>
                                <th>{{ ++$i }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        <a href="{{ route('products.show', $product->id) }}"
                                            class="btn btn-info">Show</a>
                                        @can('product-edit')
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-primary">Edit</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('product-delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $listProducts->render() !!}
            </div>
        </div>
    </div>


@endsection
