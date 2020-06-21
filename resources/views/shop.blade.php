@extends('layouts.master')
@section('content')
<!-- Page Header -->
<header class="masthead" style="background-image: url('{{asset('fontend/img/about-bg.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>Shop </h1>
                    <span class="subheading"> shop here which product you choice </span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
              <img class="card-img-top" src="{{asset('productimage/1.jpg')}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-header text-center">Black T-shirt</h5>

                <div class="text-center mt-3">
                    <a href="" class="btn btn-primary" >View Details</a>
                </div>
            </div>
        </div>
    </div>
      <div class="col-md-4">
            <div class="card">
              <img class="card-img-top" src="{{asset('productimage/1.jpg')}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-header text-center">Black T-shirt</h5>

                <div class="text-center mt-3">
                    <a href="" class="btn btn-primary" >View Details</a>
                </div>
            </div>
        </div>
    </div>
      <div class="col-md-4">
            <div class="card">
              <img class="card-img-top" src="{{asset('productimage/1.jpg')}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-header text-center">Black T-shirt</h5>

                <div class="text-center mt-3">
                    <a href="" class="btn btn-primary" >View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<hr>
<!-- Footer -->
@endsection
