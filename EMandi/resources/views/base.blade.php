<?php
use App\Http\Controllers\Product_Controller;
$total=0;
if(Session::has('user'))
{
  $total= Product_Controller::cartItem();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href=" {{asset('assets/css/font-awesome.min.css ')}}" rel="stylesheet">
    <link href="{{asset('assets/css/prettyPhoto.css ')}}" rel="stylesheet">
    <link href="{{asset('assets/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/jquery.growl.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    {{--    For Eye Icon--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +92-321-1011038</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> e-Mandi@contact.pk</a></li>
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
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="/"><img src="{{asset('assets/images/home/logo.png')}}" alt="" /></a>
						</div>

					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">


								<?php if(request()->session()->has('user') && session('user')['type']=="admin"):?>
							    <li><a href="/addproduct"><i class=""></i>Add Product</a></li>
								<?php endif;?>
							
								<li><a href="/products"><i class=""></i>Products</a></li>
								@if(Session::has('user'))
								
								
								<li><a href="/checkout"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="/cart"><i class="fa fa-shopping-cart"></i>({{$total}}) Cart</a></li>
								<li><a href="#" class="nav-item nav-link">
                   				<img class="rounded-circle" src="{{asset('assets/uploads/users/')}}/{{Session::get('user')['image']}}" alt="Logo" style="width:30px; height:30px;" >
								</a></li>
								@else
								
								<li><a href="/login"><i class="fa fa-unlock"></i>Login</a></li>
								<li><a href="/signup"><i class="fa fa-user"></i>Signup</a></li>
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
								
								@if(Session::has('user'))
								<li class="dropdown active"><a href="#">{{Session::get('user')['name']}}<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        
										<li><a href="/orders">Orders</a></li> 
										<li><a href="/checkout">Checkout</a></li> 
										<li><a href="/cart">Cart</a></li>
										<li><a href="/edituser/{{Session::get('user')['id']}}">Edit</a></li> 
										<li><a href="/logout">SignOut</a></li> 
                                    </ul>
                                </li> 
								@endif
								
							</ul>
							
						</div>
					</div>
					<div class="col-sm-3">

							<div class="search_box pull-right">
								<form action="/search">
                					<div class="search">
                    				<input type="text" name='query' placeholder="Search">
                    				
                					</div>
                </form>
							</div>
						</div>
					
				</div>
			</div>
		</div><!--/header-bottom-->

	

		




    @yield('content')
	<input type="hidden" value="{{ csrf_token() }}" id="token">










    <script src="{{asset('assets/js/jquery.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('assets/js/price-range.js')}}"></script>
    <script src="{{asset('assets/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/jquery.growl.js')}}"></script>
    
    @yield('script')

</body>
</html>
