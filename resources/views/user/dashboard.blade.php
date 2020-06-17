@extends('layouts.admin')
@section('title','User Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2">{{Auth::user()->comments->count()}}</span>
                        <span class="font-weight-light">Comments</span>
                    </div>
                    <div class="h2 text-muted">
                        <i class="icon icon-book-open"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2">{{Auth::user()->comments->unique('post_id')->count()}}</span>
                        <span class="font-weight-light">Post Comment</span>
                    </div>
                    <div class="h2 text-muted">
                        <i class="icon icon-paper-clip"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    Comment List
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Sales</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="text-nowrap">Samsung Galaxy S8</td>
                                    <td>31,589</td>
                                    <td>$800</td>
                                    <td>5%</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="text-nowrap">Google Pixel XL</td>
                                    <td>99,542</td>
                                    <td>$750</td>
                                    <td>3%</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="text-nowrap">iPhone X</td>
                                    <td>62,220</td>
                                    <td>$1,200</td>
                                    <td>0%</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td class="text-nowrap">OnePlus 5T</td>
                                    <td>50,000</td>
                                    <td>$650</td>
                                    <td>5%</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td class="text-nowrap">Google Nexus 6</td>
                                    <td>400</td>
                                    <td>$400</td>
                                    <td>7%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
