@extends('layouts.master')
@section('content')
<!-- Page Header -->
<header class="masthead" style="background-image: url('{{asset('fontend/img/post-bg.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1>{{$post->title}}</h1>

                    <span class="meta">Posted by
                        <a href="#">{{$post->user->name}}</a>
                    {{date_format($post->created_at,'F d,Y')}}</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>
                    {{$post->content}}
                </p>
            </div>
        </div>
        <div>
            <h2>Comment</h2>
            <hr>
            @foreach ($post->comments as $comment)
            <p>{{$comment->content}}</p>
            <p>{{$comment->user->name}} on  {{date_format($comment->created_at,'F d,Y')}}</p>
            <hr>
            @endforeach
        </div>
        @if (Auth::check())
        <div class="row">
            <div class="col-md-12">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Your Comment</label>
                            <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                         <input type="hidden" name="post_id" value="{{$post->id}}">

                        <div class="from-group">
                            <div class="text-center">
                                <input type="submit" value="Comment Submit" class="btn btn-success">
                            </div>
                        </div>
                    </form>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                <a href="{{ route('login') }}" class="btn btn-success">Login</a> <br> <br>
                <a href="{{ route('register') }}" class="btn btn-info">Register</a>

            </div>
            </div>
        </div>
        @endif
    </div>
</article>
<hr>
@endsection
