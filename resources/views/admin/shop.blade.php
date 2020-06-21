@extends('layouts.admin')
@section('title','Shop')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-info">
            Product List
        </div>
        <div class="mt-3 mb-2">
            <a href="{{ route('admin.product.create') }}" class="btn btn-success">Add Product</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($product->count()>0)

                        @foreach ($product as $key=>$products)

                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$products->title}}</td>
                            <td>
                                <img src="{{asset($products->image)}}" alt="Image" height="100" width="100">
                            </td>
                            <td>{{$products->price}}</td>
                            <td>
                                <a href="{{ route('product.edit',$products->id) }}" class="btn btn-success">Edit</a>
                                <button   data-toggle="modal" data-target="#exampleModal-{{$products->id}}" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center">No Product Available!!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@foreach ($product as $products)
    {{-- expr --}}

<div class="modal fade" id="exampleModal-{{$products->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$products->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ route('product.delete',$products->id) }}" type="button" class="btn btn-danger">Are you sure to delete</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
