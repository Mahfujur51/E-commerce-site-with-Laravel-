@extends('layouts.admin')
@section('title','Edit User')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-info">
            Edit User
        </div>
        <div class="card-body">
            <form action="">
                @csrf
                <div class="form-group">
                    <label for="">User Name</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">User Email</label>
                    <input type="text" name="name" value="{{$user->email}}" class="form-control">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio"  id="exampleRadios1"  name="admin" value="1" {{$user->admin == 1 ? 'checked' : ''}}>
                    <label >
                        Admin
                    </label>

                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio"  id="exampleRadios1" name="author" value="1" {{$user->author ==1 ? 'checked': ''}} >
                    <label >
                       Author
                    </label>

                </div>
                <div>
                    <div class="text-center">
                        <input type="submit" value="Update User" class="btn btn-success">
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>

@endsection
