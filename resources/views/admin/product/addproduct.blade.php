@extends('layouts.app')
@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('adminhome')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Add Product</a></li>
        </ul>
    </div>
</div>
<div>@include('admin.toastr');</div>
<div class="row animated fadeInUp">
        <div class="panel  b-danger bt-md">
            <div class="panel">
                <div class="panel-content">
                    <form class="form-horizontal inline-validation form-stripe" method="POST" action="{{route('save-product')}}" enctype="multipart/form-data">
                        {{-- {{route('save-sub-category')}} --}}
                        @csrf
                    <div class="row">
                        <div class="col-xs-6"><h4>Add Product Form</h4></div>
                        <div class="col-xs-6 text-right">
                            <a href="{{route('manage-product')}}" class="btn btn-md btn-primary">All Product</a>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel-content">
                                <div class="form-group ">
                                    <label for="state-success"  class="control-label">Category</label>
                                    <select class="form-control select-picker" id="category_id" name="category_id" >
                                        <option> Select Category</option>
                                        @foreach ($categories as $row)
                                        <option value="{{($row->id)}}" >
                                            {{ucwords($row->category_name)}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel-content">
                                <div class="form-group ">
                                    <label for="state-success" class="control-label">Sub Category</label>
                                    <select class="form-control select-picker" id="subcategory_id" name="subcategory_id">
                                        <option>Select Subcategory</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel-content">
                                <div class="form-group ">
                                    <label for="state-success" class="control-label">Brand</label>
                                    <select class="form-control select-picker" id="brand_id" name="brand_id" >
                                        <option>Select Brand</option>
                                        <option value="0">No brand</option>
                                        @foreach ($brands as $row)
                                        <option value="{{($row->id)}}">
                                            {{ucwords($row->brand_name)}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel-content">
                                <div class="form-group ">
                                    <label for="email2" class="control-label">Product Name</label>
                                    <input type="text" class="form-control b-primary bt-md" value="{{old('product_name')}}" id="product_name" name="product_name" placeholder="Product Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel-content">
                                <div class="form-group ">
                                    <label for="email2" class="control-label">Buying Price</label>
                                    <input type="text" class="form-control b-primary bt-md" id="buying_price" value="{{old('buying_price')}}" name="buying_price" placeholder="0.00" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel-content">
                                <div class="form-group ">
                                    <label for="email2" class="control-label">Selling Price</label>
                                    <input type="text" class="form-control b-primary bt-md" id="selling_price" value="{{old('buying_price')}}" name="selling_price" placeholder="0.00" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel-content">
                                <div class="form-group ">
                                    <label for="email2" class="control-label">Special Price</label>
                                    <input type="text" class="form-control b-primary bt-md" id="special_price" value="{{old('special_price')}}" name="special_price" placeholder="0.00" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel-content">
                                <div class="form-group ">
                                    <label for="email2" class="control-label">Model</label>
                                    <input type="text" class="form-control b-primary bt-md" id="model" value="{{old('model')}}" name="model" placeholder="Enter model name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel-content">
                                <div class="form-group">
                                    <label for="email2" class="control-label ">Date Range</label>
                                    <div class="input-daterange input-group b-primary bt-md range-datepicker" id="dateSE">
                                        <input type="text" class="input-sm form-control" name="startdate" required>
                                        <span class="input-group-addon x-primary">to</span>
                                        <input type="text" class="input-sm form-control" name="enddate" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel-content">
                                <div class="form-group ">
                                    <label for="quantity" class="control-label">Quantity</label>
                                    <input type="text" class="form-control b-primary bt-md" id="quantity" value="{{old('quantity')}}" name="quantity" placeholder="Enter quantity" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel-content">
                                <div class="form-group ">
                                    <label for="thumbnail" class="control-label">Thumbnail</label>
                                    <input type="file" class="form-control b-primary bt-md" id="thumbnail" value="{{old('thumbnail')}}" name="thumbnail"  required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel-content">
                                <div class="form-group ">
                                    <label for="gallary" class="control-label">Gallary</label>
                                    <input type="file" class="form-control b-primary bt-md" id="gallary" value="{{old('gallary')}}" name="gallary[]" multiple=""  required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 text-center">
                            <div class="panel-content">
                                <label for="Warranty" class="control-label">Warranty</label> 
                                <div class="form-group">
                                    <div class="radio radio-custom radio-inline radio-primary ">
                                        <input type="radio" id="warranty_yes" required name="warranty"  value="1" >
                                        <label for="warranty_yes">Yes</label>
                                    </div>
                                    <div class="radio radio-custom radio-inline radio-danger">
                                        <input type="radio" id="warranty_no" required name="warranty"  value="0">
                                        <label for="warranty_no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="warranty-box" style="display: none">
                        <div class="col-md-6">
                            <div class="panel-content">
                                <div class="form-group ">
                                    <label for="warranty_duration" class="control-label">Warranty Duration</label>
                                    <input type="text" class="form-control b-primary bt-md" id="warranty_duration" value="{{old('warranty_duration')}}" name="warranty_duration" placeholder="Enter Warranty Duration" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel-content">
                                <div class="form-group ">
                                    <label for="warranty_condition" class="control-label">warranty Condition</label>
                                    <input type="text" class="form-control b-primary bt-md summernote2" id="warranty_condition" value="{{old('warranty_condition')}}" name="warranty_condition" placeholder="Enter Warranty Condition" required>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-6">
                            <div class="panel-content">
                                <div class="form-group ">
                                    <label for="video_url" class="control-label">Video Url</label>
                                    <input type="url" class="form-control b-primary bt-md summernote2" id="video_url" value="{{old('video_url')}}" name="video_url" placeholder="Enter Video URL" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-content">
                                <div class="form-group ">
                                    <label for="short_description" class="control-label">Short Desccription</label>
                                    <textarea  class="form-control b-primary bt-md summernote" id="short_description" value="{{old('short_description')}}" name="short_description" placeholder="Short Desccription" ></textarea>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="panel-content">
                                <div class="form-group ">
                                    <label for="long_description" class="control-label" required>Long Desccription</label>
                                    <textarea class="form-control b-primary bt-md summernote" id="long_description" value="{{old('long_description')}}" name="long_description" placeholder="Long Desccription" required></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 text-center" >
                            <div class="panel-content ">
                                <label for="status" class="control-label ">Status</label> 
                                <div class="form-group">
                                    <div class="radio radio-custom radio-inline radio-primary ">
                                        <input type="radio" id="status1" name="status" required value="active" >
                                        <label for="status1" >Published</label>
                                    </div>
                                    <div class="radio radio-custom radio-inline radio-danger">
                                        <input type="radio" id="status2" name="status" required value="Inactive">
                                        <label for="status2">Draft</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary ">Add Subcategory</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection