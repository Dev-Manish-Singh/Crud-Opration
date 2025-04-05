@extends('master')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Our Products</h2>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('uploads/products/'.$product->img)}}" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->price }}</p>
                        <a href="{{ route('productdetails',$product->id)}}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
    