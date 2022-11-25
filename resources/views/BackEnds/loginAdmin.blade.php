<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Admin Login</title>
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
<!-- //font-awesome icons -->
<script src="{{asset('BackEnds/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Đăng Nhập</h2>
    <?php 
	// $messages = Session::get('message');
    // if ($messages) {
        // echo '<div class="alert alert-danger" role="alert">';
        //     echo $messages;
        //     Session::put('message',null);
        // echo '</div>';
    // }
    ?>
	@include('BackEnds.messengers.messages')
		<form action="{{ route('adminDashboard') }}" method="post">
            @csrf
			<input type="email" class="ggg" name="admin_email" value="{{ old('admin_email') }}" placeholder="Email *" >
				@error('admin_email')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			<input type="password" class="ggg" name="admin_password"  placeholder="Password *" >
				@error('admin_password')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			<span><input type="checkbox" name="remember" />Nhớ</span>
			<h6><a href="#">Quên mật khẩu?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Đăng nhập" name="login">
		</form>
		{{-- <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p> --}}
</div>
</div>
<script src="{{asset('BackEnds/js/bootstrap.js')}}"></script>
<script src="{{asset('BackEnds/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('BackEnds/js/scripts.js')}}"></script>
<script src="{{asset('BackEnds/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('BackEnds/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{asset('BackEnds/js/flot-chart/excanvas.min.js')}}"></script><![endif]-->
<script src="{{asset('BackEnds/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
