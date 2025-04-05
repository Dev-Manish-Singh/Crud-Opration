@extends('master')
@section('content')
<div class="container mt-4">
    <h2 class="text-center">Admin Dashboard</h2>
    <ul class="nav nav-tabs" id="adminTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="product-tab" data-bs-toggle="tab" data-bs-target="#product" type="button" role="tab">Add Product</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="banner-tab" data-bs-toggle="tab" data-bs-target="#banner" type="button" role="tab">Update Banner</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="view-banner-tab" data-bs-toggle="tab" data-bs-target="#view-banner" type="button" role="tab">View Banner</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="view-product-tab" data-bs-toggle="tab" data-bs-target="#view-product" type="button" role="tab">View Products</button>
        </li>
    </ul>
    <div class="tab-content mt-3" id="adminTabContent">
        <div class="tab-pane fade show active" id="product" role="tabpanel">
            <h4>Add New Product</h4>
            <form action="{{ route('prostore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" placeholder="Enter product price" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="img" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
        <div class="tab-pane fade" id="banner" role="tabpanel">
            <h4>Update Banner</h4>
            <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label class="form-label">Upload Banner Image</label>
                    <input type="file" name="img" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Update Banner</button>
            </form>
        </div>
        <div class="tab-pane fade" id="view-banner" role="tabpanel">
            <h4>View Banners</h4>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Banner Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banners as $banner)
                    
                    <tr>
                        <td>{{ $banner->id }}</td>
                        <td><img src="{{asset('uploads/banner/'.$banner->img)}}" alt="Banner Image" width="100"></td>
                        <td>
                            <a href="{{ route('editbanner',$banner->id)}}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{route('delete',$banner->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="view-product" role="tabpanel">
            <h4>View Products</h4>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td><img src="{{asset('uploads/products/'.$product->img)}}" alt="Product Image" width="100"></td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ url('editproduct/'. $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ url('prodelete/'. $product->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    </div>
</div>
   @endsection