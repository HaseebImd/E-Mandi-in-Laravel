@extends('base')

@section('title','Search')

@section('content')
	
	
	<section>
		<div class="container ">

        <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Search Product</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="row ">
			
				
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						
						@foreach($products as $product)
						<div class="col-sm-3">
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
												<span>
													<h2>Base Bid</h2>
													<h2>Rs/-{{$product['base_price']}}</>
												</span>
												
												<a href="detailpage/{{$product['id']}} class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Details</a>
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
	


    @stop
