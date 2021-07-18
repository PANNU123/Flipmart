@extends('layouts.app')
@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('adminhome')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Update Slider</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">

    @include('admin.toastr');

        <div class="panel  b-primary bt-md">
            <div class="panel-content">
                <div class="row">
                    <div class="col-xs-6"><h4>Update Slider Form</h4></div>
                    <div class="col-xs-6 text-right">
                        <a href="{{route('manage-slider')}}" class="btn btn-md btn-primary">All Slider</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" method="POST" action="{{route('update-slider')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{$slider->id}}">
                                <label for="email2" class="col-sm-3 control-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" value="{{$slider->title}}" name="title" placeholder="Title name" data-validation="required" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email2" class="col-sm-3 control-label">Sub Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="subtitle" value="{{ $slider->subtitle }}"  name="subtitle" placeholder="Subtitle name" data-validation="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email2" class="col-sm-3 control-label">Start Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="start_date" value="{{ $slider->start }}" name="start_date" placeholder="YYYY-MM-DD" data-validation="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email2" class="col-sm-3 control-label">End Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="end_date"  name="end_date" value="{{ $slider->end }}" placeholder="YYYY-MM-DD" data-validation="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email2" class="col-sm-3 control-label">URl</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="url" value="{{ $slider->url }}" name="url" placeholder="URL" data-validation="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email2" class="col-sm-3 control-label">Image</label>
                                <div class="col-sm-9">
                                    <?php
                                        $images=json_decode($slider->image);

                                    ?>

                                    <input type="file" class="form-control" id="image" value="{{ $images[0]}}"  name="image[]" multiple data-validation="required">
                                   @foreach ($images as $row )
                                   <img src="{{asset('/fontend/img/upload/'.$row)}}"  width="70px" height="50px" alt="">
                                   @endforeach

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
                                    <button type="submit" class="btn btn-primary">Update Slider</button>
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



