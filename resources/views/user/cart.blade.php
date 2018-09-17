@extends('main')
@section('content')
	@if(Session::has('cart') && (Session::get('cart')->totalPrice)>0)
	<div class="quality">
		<div class="container">
			<div class="customer orders">
				
					
					<table class="order">
						<caption> customer orders</caption>
						<tr class="menu-order">
							<th class="image">Item</th>
							<th class="product">product</th>
							<th class="price">Price</th>
							<th class="quantity">Quantity</th>
							<th >Total</th>
							<th></th>
						</tr>
						@foreach($product_cart as $item)
						<tr id="item-{{$item['item']->id}}">
							<td class="item">
								<img class="img-responsive" src="{{asset('source/KOIBENTO/images/')}}/{{$item['item']->url_image}}" alt="{{$item['item']->url_image}}">
							</td>
							<td class="product-name">
								<h4><a href="#">{{$item['item']->name}}</a></h4>
							</td>
							<td class="price-cart">
								<p>{{number_format($item['item']->unit_price)}}<sup>đ</sup></p>
							</td>
							<td class="quatity-cart">
								<div class="button-cart">
									<button class="down" id="down-{{$item['item']->id}}"  >-</button>
									
									<input type="number"  name="quanity" class="cart_quantity" id="cart_quantity-{{$item['item']->id}}" value="{{$item['qty']}}" min="1">
									<button class="up" id="up-{{$item['item']->id}}" >+</button>
								</div>
							</td>
							<td class="cart_total">
								<p id="total_price-{{$item['item']->id}}"> {{number_format(($item['item']->unit_price)*($item['qty']))}} <sup>đ</sup></p>
							</td>
							<td class="cart-close">
								<a class="removeCart" id="remove-{{$item['item']->id}}" href="#"><p><i class="fa fa-times"></i></p></a>
							</td>
						</tr>
						@endforeach
						
						
					</table>
				
			</div>
		</div>
	</div>
	
	
	<!--Cart totals-->
	<div class="promotion">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-5 col-xs-12">
				</div>
				
				<div class="col-md-7 col-sm-7 col-xs-12 cart_totals">
					<table class="sub_total">
						<caption>Cart totals</caption>
						<tr>
							<th>Tạm Tính</th>
							<td>
								<p id="subTotal">{{number_format($totalPrice)}}<sup>đ</sup></p>
							</td>
						</tr>
						
						<tr>
							<th>Total</th>
							<td class="totalPrice">
								<p id="totalPrice">{{number_format($totalPrice)}}<sup>đ</sup>

								</p>
								<p>(Đã bao gồm thuế VAT)</p>
							</td>
						</tr>
					</table>
					
					<p class="check_order"><a href="{{Route('checkout')}}">Proceed to checkout</a></p>
				</div>
			</div>
		</div>
	</div>
	@else
	<div class="shoppe">
		<img class="img-responsive" src="{{asset('source/KOIBENTO/images/cart-empty.png')}}" alt="cart-empty.png">
		<div class=" text-center empty_cart"> Giỏ hàng trống</div>
		<a class="shopping" href="{{Route('product')}}">Tiếp tục mua sắm</a>
	</div>
	@endif
	<script type="text/javascript">
		var flag = false;
	</script>
@endsection