@extends('base')
@section('title','Orders')
@section('content')



<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">My Orders</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
					<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="price">Name</td>
							<td class="price">Payment</td>
                    
                            <td class="price">Address </td>
                             
						
							
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($orders as $item)
						<tr>
							<td class="cart_product">
								<a href="detailpage/{{$item->id}}"><img class="rounded"  src="{{asset('assets/uploads/stock/')}}/{{$item->image}}" width="100" height="100"  alt="Image"></a>
							</td>
							<td class="cart_description">
								<p >{{$item->name}}</a></p>
								
							</td>
							<td >
								<p>{{$item->payment_status}}</p>
							</td>
							
							
                            <td colspan="4" class="cart_origin">
								<p>{{$item->address}}</p>
							</td>
							
						</tr>

						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->









@stop

