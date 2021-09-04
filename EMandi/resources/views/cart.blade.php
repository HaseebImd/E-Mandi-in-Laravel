@extends('base')
@section('title','Cart')


@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							
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
							
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="/removecart/{{$item->cart_id}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	


@stop