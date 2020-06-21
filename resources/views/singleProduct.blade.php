
@extends('layouts.master')
@section('content')

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{asset('fontend/img/about-bg.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>{{$product->title}}</h1>
            <span class="subheading">Shop Your Product.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
            <img src="{{asset($product->image)}}" height="400" alt="">
        </div>

      </div>
      <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                  <div class="text-center">
                      {{$product->title}}
                  </div>
              </div>
              <div class="card-body">
                  <div class="text-center">
                      {{$product->description}}
                  </div>
              </div>
              <div class="card-footer">
                  <div class="text-center">
                      Price: {{$product->price}}$
                  </div>
              </div>
              <div class="card-block mt-3">
                <div class="text-center">
                    <a href="{{ route('single.product.order',$product->id) }}" class="btn btn-info">
                        Cheek Our Paypal

                    </a>
                </div>

              </div>
          </div>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
@endsection
