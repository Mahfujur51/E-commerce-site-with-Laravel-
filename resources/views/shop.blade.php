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
        @foreach ($product as $products)

        <div class="col-md-4">
            <div class="card">
              <img class="card-img-top" src="{{asset($products->image)}}" alt="Card image cap" height="300" width="300">
              <div class="card-body">
                <h5 class="card-header text-center">{{$products->title}}</h5>
                <h3 class="text-center">Price: {{$products->price}} $</h3>

                <div class="text-center mt-3">
                    <a href="{{ route('single.product',$products->id) }}" class="btn btn-primary" >View Details</a>
                </div>
            </div>
        </div>
    </div>
     @endforeach

</div>
</div>
<hr>
<!-- Footer -->
@endsection
