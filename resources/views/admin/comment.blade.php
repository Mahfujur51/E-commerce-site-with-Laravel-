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
                @if ($comments->count()>0)
                    {{-- expr --}}

                        @foreach ($comments as $key=>$comment)
                        {{-- expr --}}
                        <tr>
                            <td>{{$key+1}}</td>
                            <td class="text-nowrap">{{$comment->post->title}}</td>
                            <td>{{$comment->content}}</td>
                            <td>{{$comment->created_at->diffForHumans()}}</td>
                            <td>
                                <button  data-toggle="modal" data-target="#exampleModal-{{$comment->id}}" class="btn btn-danger">Delete</button>
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
<!-- Modal -->
@foreach ($comments as $post)
    {{-- expr --}}

<div class="modal fade" id="exampleModal-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$post->content}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ route('admin.comment.delete',$post->id) }}" type="button" class="btn btn-danger">Are you sure to delete</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
