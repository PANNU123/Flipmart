$(function(){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
});
$('#ajaxModel').modal('hide');
$(document).ready(function(){
  $('.details-btn').click(function(){
      const id=$(this).attr('data-id');
      // console.log(id);
      $.ajax({
          method:"GET",
          // type:"GET",        {use method or type}
          dataType:"json",
          url:'/model/'+id,
          success:function(data){
            //   console.log(data);
              $('#pid').val(id);
              $('#headname').html(data.product_name);
              $('#pprice').html(data.selling_price);
              $('#pmodel').html(data.model);
              $('#categoryIds').html(data.category_name);
              $('#brandIds').html(data.brand_name);
              $('#thumbnail').attr('src','/' + data.thumbnail);

            /***********Input Feild */
              $('#pro_headname').val(data.product_name);
              $('#pro_pprice').val(data.selling_price);
              $('#pro_model').val(data.model);
              $('#pro_categoryIds').val(data.category_name);
              $('#pro_brandIds').val(data.brand_name);
              $('#image_upload').val(data.thumbnail);
          }
      })
  });

});

function updateProduct(){
    var id               =  $('#pid').val();
    var product_name     =  $('#pro_headname').val();
    var product_price    =  $('#pro_pprice').val();
    var product_model    =  $('#pro_model').val();
    var product_cat_name =  $('#pro_categoryIds').val();
    var product_brand    =  $('#pro_brandIds').val();
    var size             =  $('#size').val();
    var color            =  $('#color').val();
    var quantity         =  $('#quantity').val();
    var image            =$('#image_upload').val();

     $.ajax({
         method:"POST",
             dataType:"json",
         data:{
             id:id,
             product_name:product_name,
             product_price:product_price,
             product_model:product_model,
             product_cat_name:product_cat_name,
             product_brand:product_brand,
             size:size,
             color:color,
             quantity:quantity,
             image:image
         },
         url:'/cart/add/product',
         success:function(data){
            $('#ajaxModel').modal('hide');
            $('#size').val('');
            $('#color').val('');
            $('#quantity').val('');
            alert('Cart Added Successfully');
            $('#ajaxModel').modal('hide');
            window.location.reload();
            
         }
         
     })
}

  function cartIncrement(rowId){
      $.ajax({
        method:"GET",
        dataType:"json",
        url:'/cart/product/increment/'+rowId,
        success:function(data){
          window.location.reload();
        }
      });
}
function cartDecrement(rowId){
  $.ajax({
    method:"GET",
    dataType:"json",
    url:'/cart/product/decrement/'+rowId,
    success:function(data){
      window.location.reload();
    }
  });
}