@extends('layouts.admin')
@section('title','Comments')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-info">
            Comment List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Post</th>
                            <th>Comment</th>
                            <th>Create</th>
                            <th>Action </th>
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
                                <a href="{{ route('author.comment.delete',$comment->id) }}" class="btn btn-danger"> Delete</a>
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
@endsection
