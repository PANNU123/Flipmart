<div class="col-sm-12 col-md-8 col-md-offset-2" >
    @if(session('success'))
    <div class="alert bg-primary fade in">
        <a href="#" class="close" data-dismiss="alert">×</a>
        <strong>{{Session('success')}} </strong>
    </div>
    @endif
    @if(session('status'))
    <div class="alert bg-primary fade in">
        <a href="#" class="close" data-dismiss="alert">×</a>
        <strong>{{Session('status')}} </strong>
    </div>
    @endif
    @if(session('delete'))
    <div class="alert bg-danger fade in">
        <a href="#" class="close" data-dismiss="alert">×</a>
        <strong>{{Session('delete')}} </strong>
    </div>
    @endif
    @if(session('warning'))
    <div class="alert bg-warning fade in">
        <a href="#" class="close" data-dismiss="alert">×</a>
        <strong>{{Session('warning')}} </strong>
    </div>
    @endif

