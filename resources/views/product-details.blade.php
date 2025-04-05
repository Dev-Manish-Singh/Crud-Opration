@extends('master')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('uploads/products/'.$product->img)}}" class="img-fluid" alt="Product Image">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p class="text-muted">Category: Electronics</p>
                <h4 class="text-primary">{{ $product->price }}</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna erat.</p>
                <a href="{{ route('addcart',$product->id)}}" class="btn btn-success">Add to Cart</a>
            </div>
        </div>
    </div>
   @endsection