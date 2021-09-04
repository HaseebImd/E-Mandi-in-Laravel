@extends('base')

@section('title','E-Mandi')

@section('content')
	
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-MANDI</h1>
                                <p>A life of success and achievement is a direct result of utilizing the power of positive thinking. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('assets/images/home/9eb8ff73cf34bd34dd06e366d8b1ab4d.jpg')}}" style="width: 384px; height: 341px; border-radius: 50%;" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-MANDI</h1>
                                <p>A mistake is only a mistake if you don’t learn anything from it, once you learned something from it, it becomes a lesson... </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('assets/images/home/images.jpg')}}" style="width: 384px; height: 341px; border-radius: 50%;" class="girl img-responsive" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-MANDI</h1>
                                <p>Never judge anyone till you’ve heard the full story and found out why they do the things they do. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('assets/images/home/111111.jpg')}}" style="width: 384px; height: 341px; border-radius: 50%;" class="girl img-responsive" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->


		
	<section>
		<div class="container ">
			
			<div class="row ">
				<div class="col-sm-3">
					<div class="left-sidebar">
						@foreach($user as $u)
						<div class="rounded" style="margin-left:40px;margin-bottom:20px;">
						<img style="border:30px;" src="{{asset('assets/uploads/users/')}}/{{$u['image']}}" class="rounded-circle" alt="Cinque Terre" width="120" height="120"> 
						</div>
						<div class="panel panel-success">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											{{$u['name']}}
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
												<li><a href="#"><span><i class="fa fa-envelope"></i></span> : {{$u['email']}}</a></li>
												<li><a href="#"><span><i class="fa fa-phone"></i></span> : {{$u['contact']}}</a></li>
												<li><a href="#"><span><i class="fa fa-box"></i></span> : {{$u['address']}}</a></li>
												<li><a href="#"><span><i class="fa fa-marker"></i></span> : {{$u['username']}}</a></li>
	
										</ul>
									</div>
								</div>
							</div>
					

						@endforeach


						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							
							
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Al-Ahwar</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Al Jamoose or Jimes</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Assam</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Azi Kheli</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Badavan</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Baio</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Baladi</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						
					
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach($products as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img style="height: 250px ;" src="{{asset('assets/uploads/stock/')}}/{{$product['image']}}"  alt="" />
											<h2>Rs/-{{$product['base_price']}}</h2>
											<p>{{$product['name']}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<a href="detailpage/{{$product['id']}} class=""><i class="fa fa-bars"></i> View Details</a>
											</div>
										</div>
								</div>
								
							</div>
						</div>
						@endforeach
						
						
					</div><!--features_items-->
					
				
				
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="text-center">Copyright © 2019-22 E-Mandi Inc. All rights reserved.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->

    @stop
