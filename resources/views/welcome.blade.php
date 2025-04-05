@extends('master')
@section('content')
    <div id="bannerSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($banners as $banner)
            <div class="carousel-item @if($loop->first) active @endif">
                <img src="{{asset('uploads/banner/'.$banner->img)}}" class="d-block w-100" alt="Banner 1">
            </div>
           @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    @endsection
    
