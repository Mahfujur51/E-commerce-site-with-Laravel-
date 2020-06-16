@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">Accoutn Settings</div>
    <div class="container-fluid">
        <div class="row">
         <div class="col-md-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('user.profile.update') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <h2>Password</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-gorup">
                            <label for="">Password</label>
                            <input type="password" name="password"class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-gorup">
                            <label for="">Password</label>
                            <input type="password" name="password"class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-gorup">
                            <label for="">Password</label>
                            <input type="password" name="password"class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-4 mb-4">
                        <input type="submit" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
