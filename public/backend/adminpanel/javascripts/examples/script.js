$(document).ready(function() {
    $('.summernote').summernote({
        height:200
    });
  });


  $(document).ready(function() {
    $('.summernote2').summernote({
    });
  });
  $(".select-picker").select2({
    placeholder: "Select Category",
    allowClear: true
});

  $(document).ready(function(){
    $('body').on('change','#brandstatus',function(){
    var id=$(this).attr('data-id');
    if(this.checked){
       var status=1;
    }else{
        var status=0;
    }
   $.ajax({
    url:'brandstatus/'+id+'/'+status,
    method:'get',
    success:function(result){
        console.log(result);
    }
   });
})
});

$(document).ready(function(){
    $('body').on('change','#Categorystatus',function(){
    var id=$(this).attr('data-id');
    if(this.checked){
       var status=1;
    }else{
        var status=0;
    }
   $.ajax({
    url:'categorystatus/'+id+'/'+status,
    method:'get',
    success:function(result){
        console.log(result);
    }
   });
})
});

$(document).ready(function(){
    $('body').on('change','#subcategorystatus',function(){
    var id=$(this).attr('data-id');
    if(this.checked){
       var status=1;
    }else{
        var status=0;
    }
   $.ajax({
    url:'subcategorystatus/'+id+'/'+status,
    method:'get',
    success:function(result){
        console.log(result);
    }
   });
})
});


$(document).ready(function(){
    $('body').on('change','#sliderstatus',function(){
    var id=$(this).attr('data-id');
    if(this.checked){
        var status='active';
    }else{
        var status='inactive';
    }
    $.ajax({
    url:'sliderstatus/'+id+'/'+status,
    method:'get',
    success:function(result){
        console.log(result);
    }
    });
})
});
$(document).ready(function(){
    $('body').on('change','#districtstatus',function(){
    var id=$(this).attr('data-id');
    if(this.checked){
        var status=1;
    }else{
        var status=0;
    }
    $.ajax({
    url:'divisionstatus/'+id+'/'+status,
    method:'get',
    success:function(result){
        console.log(result);
    }
    });
})
});

$(document).ready(function(){
    $('body').on('change','#divisionstatus',function(){
    var id=$(this).attr('data-id');
    if(this.checked){
        var status=1;
    }else{
        var status=0;
    }
    $.ajax({
    url:'divisionstatus/'+id+'/'+status,
    method:'get',
    success:function(result){
        console.log(result);
    }
    });
})
});



$(document).ready(function(){
    $('body').on('change','input[name="warranty"]',function(){
    var n=$(this).val();
    if(n==1){
        $('.warranty-box').show();
    }else{
        $('.warranty-box').hide();
    }
})
});

$(document).ready(function(){
    $('body').on('change','#category_id',function(){
    var id=$(this).val();
    $.ajax({
    url:'/product/showsubcat/'+id,
    method:'get',
    success:function(result){
        $("#subcategory_id").html(result);
     }
    });
  })
});




$(document).ready(function(){
    $('body').on('change','#division',function(){
    var id=$(this).val();
    $.ajax({
    url:'/division/district/'+id,
    method:'get',
    success:function(result){
        $("#district_id").html(result);
     }
    });
  })
});






$('.range-datepicker').datepicker({
    format: "dd/mm/yy",
    weekStart: 1,
    todayBtn: "linked",
    todayHighlight: true
});

$(".inline-validation").validate({

    highlight: function(label) {
        $(label).closest('.form-group').removeClass('has-primary').addClass('has-error');
    },
    success: function(label) {
        $(label).closest('.form-group').removeClass('has-error');
        label.remove();
    }
});