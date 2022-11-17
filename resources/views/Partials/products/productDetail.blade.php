@extends('layout')
@section('title_page','Chi Tiết Sản Phẩm')

@section('main')
    <div class="row">
        @include('sidebar')
        <div class="col-sm-9 padding-right">
            <div class="product-details"><!--product-details-->
                <div class="col-sm-5">
                    <div class="view-product">
                        <img src="{{asset('uploads/products/'. $product_detail->product_image)}}" style="height: auto;" alt="" />
                        <h3>ZOOM</h3>
                    </div>
                    <div id="similar-product" class="carousel slide" data-ride="carousel">
                        
                          <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                  <a href=""><img src="{{asset('FrontEnds/images/product-details/similar1.jpg')}}" alt=""></a>
                                  <a href=""><img src="{{asset('FrontEnds/images/product-details/similar2.jpg')}}" alt=""></a>
                                  <a href=""><img src="{{asset('FrontEnds/images/product-details/similar3.jpg')}}" alt=""></a>
                                </div>
                                <div class="item">
                                  <a href=""><img src="{{asset('FrontEnds/images/product-details/similar1.jpg')}}" alt=""></a>
                                  <a href=""><img src="{{asset('FrontEnds/images/product-details/similar2.jpg')}}" alt=""></a>
                                  <a href=""><img src="{{asset('FrontEnds/images/product-details/similar3.jpg')}}" alt=""></a>
                                </div>
                                <div class="item">
                                  <a href=""><img src="{{asset('FrontEnds/images/product-details/similar1.jpg')}}" alt=""></a>
                                  <a href=""><img src="{{asset('FrontEnds/images/product-details/similar2.jpg')}}" alt=""></a>
                                  <a href=""><img src="{{asset('FrontEnds/images/product-details/similar3.jpg')}}" alt=""></a>
                                </div>
                                
                            </div>

                          <!-- Controls -->
                          <a class="left item-control" href="#similar-product" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right item-control" href="#similar-product" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>
                    </div>

                </div>
                <div class="col-sm-7">
                    <div class="product-information"><!--/product-information-->
                        <img src="{{asset('FrontEnds/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                        <h2>{{ $product_detail->product_name }}</h2>
                        <p>Web ID: {{ $product_detail->product_id }}</p>
                        <img src="{{asset('FrontEnds/images/product-details/rating.png')}}" alt="" />
                        {{-- <form action="{{ route('saveCart', $product_detail->product_id) }}" method="post"> --}}
                            <form action="{{ route('saveCart') }}" method="post">
                            @csrf
                            <span>
                                <span>{{ number_format($product_detail->product_price) }}</span>
                                <label>Số lượng:</label>
                                <input type="hidden" name="productId" value="{{ $product_detail->product_id}}"/>
                                <input type="text" name="qty" value="1" min="0" />
                                <button type="submit" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Thêm vào giỏ hàng
                                </button>
                            </span>
                        </form>
                        <p><b>Tình trạng:</b> Còn hàng</p>
                        <p><b>Điều kiện:</b> mới 100%</p>
                        <p><b>Thương hiệu:</b> {{ $product_detail->brand_name }}</p>
                        <p><b>Danh mục:</b> {{ $product_detail->category_name }}</p>
                        <a href=""><img src="{{asset('FrontEnds/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
                    </div><!--/product-information-->
                </div>
            </div><!--/product-details-->
            
            <div class="category-tab shop-details-tab"><!--category-tab-->
                <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
                        <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
                        <li><a href="#reviews" data-toggle="tab">Đánh giá (5)</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="details" >
                        <p>{{ $product_detail->product_description }}</p>
                    </div>
                    
                    <div class="tab-pane fade" id="companyprofile" >
                        <p>{{ $product_detail->product_content }}</p>
                    </div>
                    
                    <div class="tab-pane fade" id="reviews" >
                        <div class="col-sm-12">
                            <ul>
                                <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <p><b>Write Your Review</b></p>
                            
                            <form action="#">
                                <span>
                                    <input type="text" placeholder="Your Name"/>
                                    <input type="email" placeholder="Email Address"/>
                                </span>
                                <textarea name="" ></textarea>
                                <b>Rating: </b> <img src="{{asset('FrontEnds/images/product-details/rating.png')}}" alt="" />
                                <button type="button" class="btn btn-default pull-right">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div><!--/category-tab-->
            
            <div class="recommended_items"><!--recommended_items-->
                <h2 class="title text-center">Sản phẩm liên quan</h2>
                
                <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">	
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('FrontEnds/images/home/recommend1.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('FrontEnds/images/home/recommend2.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('FrontEnds/images/home/recommend3.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item ">
                            @foreach ($sanphamlienquan as $item)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('uploads/products/' . $item->product_image)}}" alt="" />
                                                <h2>{{ number_format($item->product_price) }}</h2>
                                                <p>{{ $item->product_name }}</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                     <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                      </a>
                      <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                      </a>			
                </div>
            </div><!--/recommended_items-->
            
        </div>
    </div>
@endsection