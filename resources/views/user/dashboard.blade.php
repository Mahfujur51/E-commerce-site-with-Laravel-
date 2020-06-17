@extends('layouts.admin')
@section('title','User Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2">{{Auth::user()->comments->count()}}</span>
                        <span class="font-weight-light">Comments</span>
                    </div>
                    <div class="h2 text-muted">
                        <i class="icon icon-book-open"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2">{{Auth::user()->comments->unique('post_id')->count()}}</span>
                        <span class="font-weight-light">Post Comment</span>
                    </div>
                    <div class="h2 text-muted">
                        <i class="icon icon-paper-clip"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    Comment List
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Post</th>
                                    <th>Comment</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (Auth::user()->comments->count())
                                {{-- expr --}}

                                @foreach (Auth::user()->comments as $key=> $comment)
                                {{-- expr --}}
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td class="text-nowrap">{{$comment->post->title}}</td>
                                    <td>{{$comment->content}}</td>
                                    <td>{{$comment->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{ route('user.comment.delete',$comment->id) }}" class="btn btn-danger"> Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr >
                                  <td colspan="5" class="text-center">No Comment Available!!</td>
                              </tr>
                              @endif

                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
</div>
@endsection
