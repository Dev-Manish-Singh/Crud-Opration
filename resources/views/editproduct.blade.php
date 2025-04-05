@extends('master')
@section('content')
<div class="container mt-4">
    <h2 class="text-center">Admin Dashboard</h2>
    <ul class="nav nav-tabs" id="adminTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="product-tab" data-bs-toggle="tab" data-bs-target="#product" type="button" role="tab">Add Product</button>
        </li>
        
    </ul>
    <div class="tab-content mt-3" id="adminTabContent">
        <div class="tab-pane fade show active" id="product" role="tabpanel">
            <h4>Add New Product</h4>
            <form action="{{ route('editproduct')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" value="{{ $product->name }}" name="name" class="form-control" placeholder="Enter product name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" value="{{ $product->price }}" name="price" class="form-control" placeholder="Enter product price" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="img" class="form-control" required>
                    <input type="hidden" name="id" value="{{ $product->id }}">
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
        
    </div>
</div>
    </div>
</div>
   @endsection