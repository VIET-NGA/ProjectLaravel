<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title_page')</title>
    <link href="{{ asset('FrontEnds/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('FrontEnds/css/font-awesome.min.css') }}"  rel="stylesheet">
    <link href="{{ asset('FrontEnds/css/prettyPhoto.css') }}"  rel="stylesheet">
    <link href="{{ asset('FrontEnds/css/price-range.css') }}"  rel="stylesheet">
    <link href="{{ asset('FrontEnds/css/animate.css') }}"  rel="stylesheet">
	<link href="{{ asset('FrontEnds/css/main.css') }}"  rel="stylesheet">
	<link href="{{ asset('FrontEnds/css/responsive.css') }}"  rel="stylesheet">
    <!--[if lt IE 9]>
   
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('FrontEnds/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('FrontEnds/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('FrontEnds/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('FrontEnds/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('FrontEnds/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
    <!--header-->
    @include('header')
	<!--/header-->
	
    <!--slider-->
	@yield('slide')
    <!--/slider-->
	
    <!--body-->
	<section>
		<div class="container">
			@yield('main')
		</div>
	</section>
    <!--/body-->
	
    <!--Footer-->
    @include('footer')
    <!--/Footer-->
	

  
    <script src="{{asset('FrontEnds/js/jquery.js')}}"></script>
	<script src="{{asset('FrontEnds/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('FrontEnds/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('FrontEnds/js/price-range.js')}}"></script>
    <script src="{{asset('FrontEnds/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('FrontEnds/js/main.js')}}"></script>
</body>
</html>