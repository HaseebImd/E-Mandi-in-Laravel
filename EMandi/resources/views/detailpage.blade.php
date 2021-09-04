@extends('base')

@section('title','Product details')

@section('content')

<section>
		<div class="container">
			<div class="row">
				@foreach($products as $stock)
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{asset('assets/uploads/stock/')}}/{{$stock['image']}}" alt="" />

							</div>
						
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
							<span>
							<span>
									{{$stock['name']}}
								</span>
								</span>	
								<p>Stock Code: 
								{{$stock['code']}}
									
								</p>
								<span>
									<h4><strong>RS. {{$stock['base_price']}}</strong></h4>
									<form action="/add_to_cart" method="POST">
                                         @csrf
                                        <input type="hidden" name="product_id" value={{$stock['id']}}>
                                        <button class="btn" ><i class="fa fa-shopping-cart"></i></button>
                                         </form>
									
								</span>
								<p><b>Base Bid:</b> {{$stock['base_bid']}}</p>
								<p><b>Status:</b> {{$stock['status']}}</p>
								<p><b>Color:</b> {{$stock['color']}}</p>
								<p><b>Weight:</b> {{$stock['weight']}}</p>
								<p><b>Age:</b> {{$stock['age']}} Years</p>
								<p><b>Origin:</b> {{$stock['origin']}}</p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					

					
					
				</div>
                @endforeach
			</div>
		</div>
	</section>
	




@stop