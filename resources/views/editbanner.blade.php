@extends('master')
@section('content')
<div class="container mt-4">
    <h2 class="text-center">Admin Dashboard</h2>
    <ul class="nav nav-tabs" id="adminTab" role="tablist">
        
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="banner-tab"  data-bs-toggle="tab" data-bs-target="#banner" type="button" role="tab">Update Banner</button>
        </li>
        
    </ul>
    <div class="tab-content mt-3" id="adminTabContent">
        
        <div class="tab-pane fade show active" id="banner" role="tabpanel">
            <h4>Update Banner</h4>
            <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label class="form-label">Upload Banner Image</label>
                    <input type="file" name="img" class="form-control" required>
                    <input type="hidden" name="id" value="{{ $banner->id }}">
                </div>
                <button type="submit" class="btn btn-success">Update Banner</button>
            </form>
        </div>
       
    </div>
</div>
   @endsection