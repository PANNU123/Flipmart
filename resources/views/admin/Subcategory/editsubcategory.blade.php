@extends('layouts.app')
@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('adminhome')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Subcategory</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">

    @include('admin.toastr');

        <div class="panel  b-primary bt-md">
            <div class="panel-content">
                <div class="row">
                    <div class="col-xs-6"><h4>Add Subcategory Form</h4></div>
                    <div class="col-xs-6 text-right">
                        <a href="{{route('manage-sub-category')}}" class="btn btn-md btn-primary">All Subcategory</a>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" method="POST" action="{{route('update-sub-category')}}">

                            @csrf
                            <input type="hidden" name="id" value="{{$subcategory->id}}">
                            <div class="form-group">
                                <label for="category" class="col-sm-3 control-label">Subcategory Name</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="category" name="category_id"  >
                                        <option>Select Category</option>
                                        @foreach ($categories as $row)
                                        <option value="{{$row->id}}" {{$subcategory->category_id==$row->id ? "selected":""}}>{{$row->category_name}}</option>
                                        {{-- <option value="{{$row->id}}">{{$subcategory->category_id==$row->id ? 'selected':' '}}{{$row->category_name}}</option> --}}
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email2" class="col-sm-3 control-label">Subcategory Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="subcategory_name" value="{{$subcategory->subcategory_name}}"name="subcategory_name" placeholder="Subcategory name" data-validation="required">
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
                                    <button type="submit" class="btn btn-primary">Update Subcategory</button>
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



