@extends('layouts.admin')
@section('title','Shop')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-info">
            Create Product
        </div>
        <div class="card-body">
            <div class="row-12">
                <form action="{{ route('admin.product.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="">Product Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>

                    </div>
                    <div class="form-group">
                        <label for="">Product Image</label>
                        <input type="file" name="image" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" class="form-control" name="price">

                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <input type="submit" class="btn btn-success" Value="Inser Product">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
