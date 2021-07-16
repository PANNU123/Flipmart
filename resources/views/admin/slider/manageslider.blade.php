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
                        <a href="{{route('add-slider')}}" class="btn btn-md btn-primary">Add Slider</a>
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
                                                            <th class="text-center">Image</th>
                                                            <th class="text-center">Title</th>
                                                            <th class="text-center">Subtitle</th>
                                                            <th class="text-center">Date</th>
                                                            <th class="text-center">URL</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $index=1;
                                                            @endphp
                                                            @foreach ($sliders as $row )
                                                        <tr>
                                                            <td>{{$index++}}</td>
                                                            <td class="text-center">
                                                            <?php
                                                                $images= json_decode($row->image);
                                                                // print_r($images);
                                                            ?>
                                                                     <img src="{{asset('/fontend/img/upload/'.$images[0])}}"
                                                                      width="70px" height="40px" alt="">
                                                           </td>

                                                            <td>{{substr($row->title,0,20)}}</td>
                                                            <td>{{substr($row->subtitle,0,30)}}</td>
                                                            <td>{{$row->start .' - '. $row->end}}</td>
                                                            <td><a href="{{$row->url}}  " class="btn btn-xs btn-primary" target="_blank">Click Here</a></td>

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
