@extends('layouts.app')
@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('adminhome')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Category</a></li>
            <li><a href="javascript:avoid(0)">Update Category</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">

    @include('admin.toastr');
    @error('category_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        <div class="panel  b-primary bt-md">
            <div class="panel-content">
                <div class="row">
                    <div class="col-xs-6"><h4>Edit Category</h4></div>
                    <div class="col-xs-6 text-right">
                        <a href="{{route('manage-category')}}" class="btn btn-md btn-primary">All Category</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" method="POST" action="{{route('update-category')}}">

                            @csrf
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <div class="form-group">
                                <label for="email2" class="col-sm-3 control-label">category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="category_name" value="{{$category->category_name}}" name="category_name" placeholder="Categoryname" data-validation="required">
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
                                    <button type="submit" class="btn btn-primary">Update Category</button>
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



