@extends('layouts.master')
@section('content')
<header class="masthead" style="background-image: url('{{asset('fontend/img/home-bg.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach ($posts as $post)
                {{-- expr --}}

            <div class="post-preview">
                <a href="{{ route('post',$post->id) }}">
                    <h2 class="post-title">
                      {{$post->title}}
                    </h2>

                </a>
                <p class="post-meta">Posted by
                    <a href="#">{{$post->user->name}}</a>
                {{date_format($post->created_at,'F d,Y')}}
                <i class="fa fa-comment"></i>{{$post->comments->count()}}
            </p>
            </div>
            <hr>
          @endforeach

            <!-- Pager -->
            <div class="clearfix">
               {{$posts->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
