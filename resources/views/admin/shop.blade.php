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
                            {{-- expr --}}

                        <tr>
                            <td>1</td>
                            <td>Demo</td>
                            <td>Demo</td>
                            <td>Demo</td>
                            <td>
                                <a href="" class="btn btn-success">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
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

@endsection
