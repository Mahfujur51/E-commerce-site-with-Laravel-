@extends('layouts.admin')
@section('title','Update Post')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">


            <div class="card">
                <div class="card-header bg-light">
                   Update Post
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('author.store.post') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Post Title:</label>
                            <input type="text" name="title" value="{{$posts->title}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Post Content:</label>
                            <textarea name="content" class="form-control" id="" cols="30" rows="10">{{$posts->content}}</textarea>
                        </div>
                        <div class="form-gorup">
                            <div class="text-center">
                                <input type="submit" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
