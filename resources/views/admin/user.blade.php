@extends('layouts.admin')
@section('title','Comments')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-info">
            Comment List
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Post</th>
                    <th>Action</th>
                </tr>
                @foreach ($user as $key=>$users)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$users->name}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->posts->count()}}</td>
                    <td>
                        <a href="{{ route('admin.user.edit',$users->id) }}" class="btn btn-success">Edit</a>
                        <a href="{{ route('admin.user.delete',$users->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
