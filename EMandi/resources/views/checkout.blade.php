@extends('base')
@section('title','CheckOut')


@section('content')


<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			

			
			
			

			
            <div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="price">age</td>
							<td class="price">weight</td>
						
							
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $item)
						<tr>
							<td class="cart_product">
								<a href="detailpage/{{$item->id}}"><img class="rounded"  src="{{asset('assets/uploads/stock/')}}/{{$item->image}}" width="100" height="100"  alt="Image"></a>
							</td>
							<td class="cart_description">
								<h4 ><a href="">{{$item->name}}</a></h4>
								<p>{{$item->origin}}</p>
							</td>
							<td class="cart_price">
								<p>Rs/-{{$item->base_price}}</p>
							</td>
							
							<td class="cart_origin">
								<p>{{$item->age}} years</p>
							</td>
							<td class="cart_weight">
								<p>{{$item->weight}}</p>
							</td>
						</tr>

						@endforeach
						
					</tbody>
				</table>
			</div>
				<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				  <form action="/orderplace" method="POST" >
              @csrf
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input required type="checkbox">
								<label>Cash on Delivery</label>
							</li>
						</ul>
						<ul class="user_info">
							
							<li >
								<label>Address</label>
								<input required size="80" name="address" type="text">
							</li>
						</ul>
						 <button style="margin-left:20px;"type="submit" class="btn btn-success">Order Now</button>
						
					</div>
				</div>
				</form>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>Rs-/ {{$total}}</span></li>
							<li>Eco Tax <span>Rs/-0</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Grand Total <span>Rs/- {{$total}}</span></li>
						</ul>
							
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

		</div>
	</section> <!--/#cart_items-->



@stop