@extends('layouts.admin')
@section('title','Edit Product')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-info">
           Edit Product
        </div>
        <div class="card-body">
            <div class="row-12">
                <form action="{{ route('admin.product.update',$products->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <img src="{{asset($products->image)}}" alt="{{$products->title}}" height="100" width="100">
                    </div>
                    <div class="form-group">
                        <label for="">Product Title</label>
                        <input type="text" name="title" class="form-control" value="{{$products->title}}" >
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$products->description}}</textarea>

                    </div>
                    <div class="form-group">
                        <label for="">Product Image</label>
                        <input type="file" name="image" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" class="form-control" name="price" value="{{$products->price}}">

                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <input type="submit" class="btn btn-success" Value="Update Product">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
