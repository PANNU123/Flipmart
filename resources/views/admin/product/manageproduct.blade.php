@extends('layouts.app')
@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('adminhome')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Slider</a></li>
            <li><a href="javascript:avoid(0)">Manage Slider</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">

    <div>@include('admin.toastr');</div>
<div class="col-sm-12">
        <div class="panel  b-primary bt-md">
            <div class="panel-content">
                <div class="row">
                    <div class="col-xs-6"><h4>Manage Slider Table</h4></div>
                    <div class="col-xs-6 text-right">
                        <a href="{{route('add-product')}}" class="btn btn-md btn-primary">Add Product</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                <div class="row animated fadeInRight">
                                    <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr >
                                                            <th class="text-center">SL</th>
                                                            <th class="text-center">Thumbnail</th>
                                                            <th class="text-center">Product Name</th>
                                                            <th class="text-center">Model</th>
                                                            <th class="text-center">Buying</th>
                                                            <th class="text-center">Selling</th>
                                                            <th class="text-center">Special</th>
                                                            <th class="text-center">Special Price Date</th>
                                                            <th class="text-center">Quantity</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $index=1; 
                                                            @endphp
                                                            @foreach ($products as $row )
                                                        <tr>
                                                            <td>{{$index++.'-'.$row->id}}</td>
                                                            <td><img src="{{asset($row->thumbnail)}}" width="70px" height="40px" alt=""></td>
                                                            <td>{{$row->product_name}}</td>
                                                            <td>{{$row->model}}</td>
                                                            <td>{{$row->buying_price}}</td>
                                                            <td>{{$row->selling_price}}</td>
                                                            <td>{{$row->special_price}}</td>
                                                            <td>{{$row->special_start}} --- {{$row->special_end}} </td>
                                                            <td>{{$row->quantity}}</td>

                                                            <td>
                                                                {{-- @if($row->status==1)
                                                                <span class="badge bg-primary">Acitve</span>
                                                                @else()
                                                                <span class="badge bg-danger">Inacitve</span>
                                                                @endif --}}
                                                                <input type="checkbox" data-size="mini" data-toggle="toggle" data-on="Active" data-off="Inactive" id="sliderstatus"  data-id="{{$row->id}}" {{ $row->status=='active' ? 'checked' :''}}>
                                                            </td>
                                                            <td>
                                                                <a href="{{url('sliders/edit/'.$row->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
                                                                <a href="{{url('sliders/delete/'.$row->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                                                                @if($row->status==1)
                                                                <a href="{{url('sliders/inactive/'.$row->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-down"></i></a>
                                                                @else
                                                                <a href="{{url('sliders/active/'.$row->id)}}" class="btn btn-xs btn-success"><i class="fa fa-arrow-up"></i></a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
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
            </div>
        </div>
</div>
@endsection
