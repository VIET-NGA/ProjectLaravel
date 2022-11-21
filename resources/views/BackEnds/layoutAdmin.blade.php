<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>@yield('titleAdminPage')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('BackEnds/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('BackEnds/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('BackEnds/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('BackEnds/css/font.css')}}" type="text/css"/>
<link href="{{asset('BackEnds/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('BackEnds/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('BackEnds/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('BackEnds/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('BackEnds/js/raphael-min.js')}}"></script>
{{-- <script src="{{asset('BackEnds/js/morris.js')}}"></script> --}}
</head>
<body>
<section id="container">
<!--header start-->
@include('BackEnds.header')
<!--header end-->
<!--sidebar start-->
<aside>
    @include('BackEnds.sidebar')
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Lượt truy cập</h4>
					<h3>13,500</h3>
					<p>Other hand, we denounce</p>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Người dùng</h4>
						<h3>1,250</h3>
						<p>Other hand, we denounce</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Doanh thu</h4>
						<h3>1,500</h3>
						<p>Other hand, we denounce</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Đơn hàng</h4>
						<h3>1,500</h3>
						<p>Other hand, we denounce</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
        @yield('mainAdmin')
    </section>
 <!-- footer -->
		 @include('BackEnds.footer') 
  <!-- / footer -->
</section>
<!--main content end-->
</section>
{{-- ckeditor --}}
<script src="{{asset('BackEnds/ckeditor_4.20.0/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">  
	CKEDITOR.replace( 'editor' ); 
	CKEDITOR.replace( 'editor1');
 </script> 
<script src="{{asset('BackEnds/js/bootstrap.js')}}"></script>
<script src="{{asset('BackEnds/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('BackEnds/js/scripts.js')}}"></script>
<script src="{{asset('BackEnds/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('BackEnds/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{asset('BackEnds/js/flot-chart/excanvas.min.js')}}"></script><![endif]-->
<script src="{{asset('BackEnds/js/jquery.scrollTo.js')}}"></script>

</body>
</html>
