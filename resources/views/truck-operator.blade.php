@extends('layouts.master')
@section('content')
    @include('layouts.partials.header-slider', ["header_slider_imgs" => [
    "images/slider/slider-3.jpg",
    "images/slider/slider-3.jpg",
    "images/slider/slider-3.jpg",
    "images/slider/slider-3.jpg",
    ]])
    <div class="container py-5 my-5 text-center">
        <h3>Why Register at Traincu?</h3>
        <div class="mt-4 d-flex justify-content-center align-items-center">
            <span class="line"></span>
            <span class="square"></span>
            <span class="line"></span>
        </div>
        <div class="my-5 row">
            <div class="col-md-3 col-sm-12 why-logo">
                <img src="{{ asset('images/demo-png.png') }}" alt="Fast Booking" />
                <p>Lucrative Fare</p>
            </div>
            <div class="col-md-3 col-sm-12 why-logo">
                <img src="{{ asset('images/demo-png.png') }}" alt="Fast Booking" />
                <p>Verified Shipper</p>
            </div>
            <div class="col-md-3 col-sm-12 why-logo">
                <img src="{{ asset('images/demo-png.png') }}" alt="Fast Booking" />
                <p>No Middleman</p>
            </div>
            <div class="col-md-3 col-sm-12 why-logo">
                <img src="{{ asset('images/demo-png.png') }}" alt="Fast Booking" />
                <p>Customer Care Support</p>
            </div>
        </div>
    </div>
    <div id="testimonial" class="py-5 my-5 bg-white">
        <div class="container text-center">
            <h3 class="testimonial-text">How Traincu Works?</h3>
            <div class="my-4 d-flex justify-content-center align-items-center">
                <span class="line"></span>
                <span class="square"></span>
                <span class="line"></span>
            </div>
            <div class="video">
                <iframe class="truck-operator-video" src="https://www.youtube.com/embed/F9st1Y76uG8" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
    @include('layouts.partials.category-slider')
    @include('layouts.partials.testimonial-slider',["title" => "How Traincu Works?"])
    @include('layouts.partials.footer-hero')
@endsection