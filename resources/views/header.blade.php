<header id="header">
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ url('/') }}">
                            <img src="{{asset('FrontEnds/images/home/logo.png')}}" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-user"></i> Tài khoản</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                            {{-- <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Thanh toán</a></li> --}}
                            <li>
                                <a href="{{ route('showCart') }}"><i class="fa fa-shopping-cart"></i> 
                                    Giỏ hàng 
                                <?php $count = Cart::count();?>
                                @if ($count > 0)
                                    <span style="background-color:orange; border-radius:50px; padding:3px; color:white; font-weight:bold">
                                        {{ $count }}
                                    </span>
                                @endif
                                
                                </a>
                            </li>
                            <?php 
                                $customer_id = Session::get('customer_id');
                                // dd($customer_id);
                            ?>
                            @if ($customer_id != null)
                                <li><a href="{{ route('logout-customer') }}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                            @else
                                <li><a href="{{ route('loginCheckout') }}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                            @endif
                            
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('/') }}" class="active">Trang chủ</a></li>
                            <li class="dropdown"><a href="#">Cửa hàng<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">Sản phẩm</a></li>
                                    <li><a href="product-details.html">Product Details</a></li> 
                                    <li><a href="checkout.html">Checkout</a></li> 
                                    <li><a href="cart.html">Cart</a></li> 
                                    <li><a href="login.html">Login</a></li> 
                                </ul>
                            </li> 
                            <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Blog List</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li> 
                            {{-- <li><a href="404.html">404</a></li> --}}
                            <li><a href="{{ url('lien-he') }}">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="input-group pull-right">
                           <input type="text" name="keywords" class="form-control" placeholder="Tìm kiếm" id="txtSearch"/>
                           <div class="input-group-btn pull-right">
                                <button class="btn btn-primary" type="submit" style="margin: -54px 0px 0px 3px;">
                                <span class="glyphicon glyphicon-search"></span>
                                </button>
                           </div>
                           </div>
                        </form>
                    {{-- <form action="{{ route('search') }}" method="get">
                        @csrf
                        <div class=" pull-right">
                            <input name="keywords" type="text" placeholder="Tìm kiếm"/>
                            <button type="submit">Tìm kiếm</button>
                        </div>
                    </form> --}}
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header>