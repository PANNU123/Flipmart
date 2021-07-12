@extends('layouts.app')
@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('adminhome')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Brand</a></li>
            <li><a href="javascript:avoid(0)">Update Brand</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">

    @include('admin.toastr');

        <div class="panel  b-primary bt-md">
            <div class="panel-content">
                <div class="row">
                    <div class="col-xs-6"><h4>Edit Brand</h4></div>
                    <div class="col-xs-6 text-right">
                        <a href="{{route('manage-brand')}}" class="btn btn-md btn-primary">All Brand</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" method="POST" action="{{route('update-brand')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$brand->id}}">
                            <div class="form-group">
                                <label for="email2" class="col-sm-3 control-label">Brand Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="brand_name" value="{{$brand->brand_name}}" name="brand_name" placeholder="Brand name" data-validation="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection



