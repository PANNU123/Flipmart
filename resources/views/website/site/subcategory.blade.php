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
                            
                            <div class="category-product">
                                <div class="row">
                                    @foreach ($products as $product)
                                    @include('website.modalform.cartmodal')
                                    <div class="col-sm-4 col-md-2 wow fadeInUp">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"><a href="detail.html"><img src="{{asset($product->thumbnail)}}" alt=""></a></div>
                                                    <!-- /.image -->
                                                    <div class="tag hot"><span>hot</span></div>
                                                </div>
                                                <!-- /.product-image -->
                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="detail.html">{{$product->product_name}}</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>
                                                    <div class="product-price"><span class="price"> {{$product->selling_price}} </span> <span class="price-before-discount">$ 800</span></div>
                                                    <!-- /.product-price -->
                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="featured__item__pic__hover">
                                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                            {{-- <li><a href="{{route('cart-model',$product->id)}}"><i  id="" class="fa fa-shopping-cart"></i></a></li> --}}
                                                            <li><a href="#" data-toggle="modal" data-target="#ajaxModel" data-id="{{$product->id}}" class="details-btn"><i class="fa fa-shopping-cart"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action class="cartmodal"  -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->
                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    @endforeach
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.category-product -->
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
