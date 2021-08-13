@extends('layouts.app')
@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('adminhome')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">State</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">

    @include('admin.toastr');

        <div class="panel  b-primary bt-md">
            <div class="panel-content">
                <div class="row">
                    <div class="col-xs-6"><h4>Add State Form</h4></div>
                    <div class="col-xs-6 text-right">
                        <a href="{{route('manage-state')}}" class="btn btn-md btn-primary">All State</a>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" method="POST" action="{{route('save-state')}}">

                            @csrf
                            <div class="form-group">
                                <label for="category" class="col-sm-3 control-label">Division Name</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="division" name="division_id" >
                                        <option>Select Division</option>
                                        @foreach ($division as $row)
                                        <option value="{{($row->id)}}">
                                            {{ucwords($row->division_name)}}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category" class="col-sm-3 control-label">District Name</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="district_id" name="district_id" >
                                        <option>Select District</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="email2" class="col-sm-3 control-label">State Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="state_name" name="state_name" placeholder="state_name" data-validation="required">
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
                                    <button type="submit" class="btn btn-primary">Add State</button>
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



