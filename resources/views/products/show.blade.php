@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mb-3 d-flex justify-content-around">
            <div>
                <h2>RESUME PRODUCT</h2>
            </div>
            <div>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-6 ">
                <div class="card border-dark mb-3">
                    <div class="card-header">
                        <strong>Name: </strong>
                        {{ $product->name }}

                    </div>
                    <div class="card-header">
                        <strong>Description: </strong>
                        {{ $product->description }}

                    </div>
                    <div class="card-header">
                        <strong>Price: </strong>
                        {{ $product->price }}

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
