@extends('layouts.app')
@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('adminhome')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Brand</a></li>
            <li><a href="javascript:avoid(0)">Manage Brand</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">

    @include('admin.toastr');

        <div class="panel  b-primary bt-md">
            <div class="panel-content">
                <div class="row">
                    <div class="col-xs-6"><h4>Manage Brand Table</h4></div>
                    <div class="col-xs-6 text-right">
                        <a href="{{route('add-brand')}}" class="btn btn-md btn-primary">Add Brand</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                <div class="row animated fadeInRight">
                                    <div class="col-sm-12">
                                        <div class="panel">
                                            <div class="panel-content">
                                                <div class="table-responsive">
                                                    <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Brand Name</th>
                                                            <th>Brand Slug</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $index=1;
                                                            @endphp
                                                            @foreach ($brand as $row )
                                                        <tr>
                                                            <td>{{$index++}}</td>
                                                            <td>{{$row->brand_name}}</td>
                                                            <td>{{$row->brand_slug}}</td>
                                                            <td>
                                                                {{-- @if($row->status==1)
                                                                <span class="badge bg-primary">Acitve</span>
                                                                @else()
                                                                <span class="badge bg-danger">Inacitve</span>
                                                                @endif --}}
                                                                <input type="checkbox" data-size="mini" data-toggle="toggle" data-on="Active" data-off="Inactive" id="brandstatus"  data-id="{{$row->id}}" {{ $row->status==1 ? 'checked' :''}}>
                                                            </td>
                                                            <td>
                                                                <a href="{{url('brands/edit/'.$row->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
                                                                <a href="{{url('brands/delete/'.$row->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                                                                @if($row->status==1)
                                                                <a href="{{url('brands/inactive/'.$row->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-down"></i></a>
                                                                @else
                                                                <a href="{{url('brands/active/'.$row->id)}}" class="btn btn-xs btn-success"><i class="fa fa-arrow-up"></i></a>
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

</div>
@endsection
