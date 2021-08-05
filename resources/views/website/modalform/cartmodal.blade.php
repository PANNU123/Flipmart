
  <!-- Modal -->
  <div class="modal fade"  id="ajaxModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 730px;">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="headname"  name="productname"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="image"><a href="detail.html"><img src="" id="thumbnail" name="image" alt="" style="height: 160px;width:170px;"></a></div>
                      </div>
                    </div>
                  </div>
  
                    
                 
                <div class="col-sm-4">
                    <div class="card" style="width: 23rem;">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Price: <strong><span id="pprice" name="pprice" style="color: rgb(255, 0, 0)"></span> </strong></li>
                          <li class="list-group-item">Model:  <strong><span id="pmodel" name="pmodel" style="color:rgb(255, 0, 0)"></span></strong></li>
                          <li class="list-group-item" >Category name: <strong><span id="categoryIds" name="categoryname" style="color: blue"></span></strong></li>
                          <li class="list-group-item" >Brand name: <strong><span id="brandIds" name="brandname" style="color: blue;"></span></strong></li>       
                        </ul>
                      </div>
                </div>
               
                <div class="col-sm-5">
                  <div class="card">
                    <div class="card-body">
                      
                      <label for="">Size</label>
                      <select class="form-control form-control-sm"  name="size" id="size">
                        <option >Select Size</option>
                        <option >Small</option>
                        <option >Medium</option>
                        <option >Large</option>
                      </select> 
                      <label for="">color</label>
                      <select class="form-control form-control-sm" name="color" id="color">
                        <option >Select Color</option>
                        <option >Red</option>
                        <option >Blue</option>
                        <option >Black</option>
                      </select>
                      <label for="">Quantity</label>
                      <input type="text" class="form-control b-primary bt-md" id="quantity" name="quantity" value="1" required>
                    </div>
                  </div>
                </div>

                <div>
                  <input type="hidden"  id="pid" name="pid" >
                  <input type="hidden"  id="pro_headname" name="product_name">
                  <input type="hidden"  id="pro_pprice" name="product_price">
                  <input type="hidden"  id="pro_model" name="product_model">
                  <input type="hidden"  id="pro_categoryIds" name="product_cat_name">
                  <input type="hidden"  id="pro_brandIds" name="product_brand">
                  <input type="hidden"  id="image_upload" name="image_upload">
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="updateProduct()">Add Cart</button>
        </div>
      </div>
    </div>
  </div>