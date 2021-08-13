@extends('welcome')
@section('content')
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>

                <!-- ========================================== SECTION – HERO ========================================= -->
                <div class="search-result-container ">
                    <div id="myTabContent" class="tab-content category-list">
                        <div class="tab-pane active " id="grid-container">
                            

                            <div class="breadcrumb">
                                <div class="container">
                                    <div class="breadcrumb-inner">
                                        <ul class="list-inline list-unstyled">
                                            <li><a href="{{url('/')}}">Home</a></li>
                                            <li class='active'>Shopping Cart</li>
                                        </ul>
                                    </div><!-- /.breadcrumb-inner -->
                                </div><!-- /.container -->
                            </div><!-- /.breadcrumb -->
                            
                            <div class="body-content outer-top-xs">
                                <div class="container">
                                    <div class="row ">
                                        <div class="shopping-cart">
                                            <div class="shopping-cart-table ">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-romove item">Remove</th>
                                                <th class="cart-description item">Image</th>
                                                <th class="cart-product-name item">Product Name</th>
                                                <th class="cart-qty item">Quantity</th>
                                                <th class="cart-sub-total item">Subtotal</th>
                                                <th class="cart-total last-item">Grandtotal</th>
                                            </tr>
                                        </thead><!-- /thead -->
                                        <tfoot>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="shopping-cart-btn">
                                                        <span class="">
                                                            <a href="{{url('/')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                                            <a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>
                                                        </span>
                                                    </div><!-- /.shopping-cart-btn -->
                                                </td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($data as $row)
                                            <tr>
                                                <td class="romove-item"><a href="{{url('cart/delete/'.$row->id)}}" title="cancel" class="icon" style="color: red"><i class="fa fa-trash-o"></i></a></td>
                                                <td class="cart-image">
                                                    <a class="entry-thumbnail" href="detail.html">
                                                        <img src="{{asset($row->image)}}" alt="" style="width:80px;height:80px;">
                                                        
                                                    </a>
                                                </td>
                                                <td class="cart-product-name-info">
                                                    <h4 class='cart-product-description'><a href="#">{{$row->product_name}}</a></h4>
                                                    <div class="cart-product-info">
                                                    <span class="product-color">COLOR:<span><strong>{{$row->color}} </strong></span></span> <br>
                                                    <span class="product-color"> Size:<span><strong>{{$row->size}}</strong></span></span>
                                                    </div>
                                                </td>
                                                <td class="cart-product-quantity">
                                                    <div class="cart-quantity">
                                                        <div class="quant-input">
                                                            <div class="arrows">
                                                              
                                                                <div class="arrow plus gradient"  id="{{$row->id}}" onclick="cartIncrement(this.id)"><span class="ir"><i class="icon fa fa-sort-asc "></i></span></div>
                                                               @if ( $row->quantity >1)
                                                               <div class="arrow minus gradient"  id="{{$row->id}}" onclick="cartDecrement(this.id)"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                               @else
                                                               <div class="arrow minus gradient" style="opacity: 0.5; pointer-events: none" id="{{$row->id}}" onclick="cartDecrement(this.id)"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                               @endif

                                                            </div>
                                                            <input type="text" value="{{$row->quantity}}">
                                                      </div>
                                                    </div>
                                                </td>
                                                <td class="cart-product-sub-total"><span class="cart-sub-total-price">{{$row->selling_price}}</span></td>
                                                <td class="cart-product-grand-total"><span class="cart-grand-total-price">{{$row->selling_price*$row->quantity}}</span></td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody><!-- /tbody -->
                                    </table><!-- /table -->
                                </div>
                            </div><!-- /.shopping-cart-table -->		

                            <div class="col-md-6 col-sm-12 estimate-ship-tax">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="estimate-title">Discount Code</span>
                                                <p>Enter your coupon code if you have one..</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                                                    </div>
                                                    <div class="clearfix pull-right">
                                                        <button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
                                                    </div>
                                                </td>
                                            </tr>
                                    </tbody><!-- /tbody -->
                                </table>
                            </div>
                            
                            
                            <div class="col-md-6 col-sm-12 cart-shopping-total">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="cart-sub-total">
                                                    Subtotal<span class="inner-left-md">$600.00</span>
                                                </div>
                                                <div class="cart-grand-total">
                                                    Grand Total<span class="inner-left-md">$600.00</span>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead><!-- /thead -->
                                    <tbody>
                                            <tr>
                                                <td>
                                                    <div class="cart-checkout-btn pull-right">
                                                        <button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
                                                        <span class="">Checkout with multiples address!</span>
                                                    </div>
                                                </td>
                                            </tr>
                                    </tbody><!-- /tbody -->
                                </table><!-- /table -->
                            </div><!-- /.cart-shopping-total -->			</div><!-- /.shopping-cart -->
                                    </div> <!-- /.row -->
                                    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
                            <div id="brands-carousel" class="logo-slider wow fadeInUp">
                            
                                    <div class="logo-slider-inner">
                                        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                                            <div class="item m-t-15">
                                                <a href="#" class="image">
                                                    <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                                                </a>
                                            </div><!--/.item-->
                            
                                            <div class="item m-t-10">
                                                <a href="#" class="image">
                                                    <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                                                </a>
                                            </div><!--/.item-->
                            
                                            <div class="item">
                                                <a href="#" class="image">
                                                    <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
                                                </a>
                                            </div><!--/.item-->
                            
                                            <div class="item">
                                                <a href="#" class="image">
                                                    <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                                                </a>
                                            </div><!--/.item-->
                            
                                            <div class="item">
                                                <a href="#" class="image">
                                                    <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                                                </a>
                                            </div><!--/.item-->
                            
                                            <div class="item">
                                                <a href="#" class="image">
                                                    <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
                                                </a>
                                            </div><!--/.item-->
                            
                                            <div class="item">
                                                <a href="#" class="image">
                                                    <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                                                </a>
                                            </div><!--/.item-->
                            
                                            <div class="item">
                                                <a href="#" class="image">
                                                    <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                                                </a>
                                            </div><!--/.item-->
                            
                                            <div class="item">
                                                <a href="#" class="image">
                                                    <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                                                </a>
                                            </div><!--/.item-->
                            
                                            <div class="item">
                                                <a href="#" class="image">
                                                    <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                                                </a>
                                            </div><!--/.item-->
                                        </div><!-- /.owl-carousel #logo-slider -->
                                    </div><!-- /.logo-slider-inner -->
                            
                            </div><!-- /.logo-slider -->
                            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
                            </div><!-- /.body-content -->

                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.search-result-container -->
            </div>
            <!-- /.col -->
        </div>
</div>
@endsection
