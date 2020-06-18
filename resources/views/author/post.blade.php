@extends('layouts.admin')
@section('title','Comments')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-info">
            Post list
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Post title</th>
                            <th>Comment</th>
                            <th>Created at</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (Auth::user()->posts->count())
                        {{-- expr --}}

                        @foreach (Auth::user()->posts as $key=> $post)
                        {{-- expr --}}
                        <tr>
                            <td>{{$key+1}}</td>
                            <td >{{$post->title}}</td>
                            <td>{{$post->comments->count()}}</td>

                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{ route('author.post.delete',$post->id) }}" class="btn btn-danger"> Delete</a>
                                 <a href="{{ route('author.post.edit',$post->id) }}" class="btn btn-success">Edit</a>
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
