@extends('main')
@section('header')


@endsection
@section('content')
	<!--menu-icon-->
	
	<!--chi tiet ssan pham-->
	
	<div class="detail">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-5 col-xs-12 category ">
					 <a class="test-popup-link" href="#">
						<img class="img-responsive " src="{{asset('source/KOIBENTO/images/')}}/{{$product->url_image}}" alt="image for food">
					</a>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-12 ">
					<div class="content-detail">
						<h4>{{$product->name}}</h4>
						<span>{{number_format($product->unit_price)}}<sup>đ</sup></span>
						<p>{{$product->description}}</p>
					</div>
					<div class="form">	
												
						<div class="quantity">

							<button class="sub_product"> - </button>
							
							<input type="number" name="quanity" class="add_more_product" value="1" min="1">
							<button class="add_product"> + </button>

						</div>
						<button id="add-to-cart" data-id="{{ $product->id }}">Thêm vào giỏ</button>

						
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<!--san pham co lien quan-->
	
	<div class="products">
		<div class="container">
			<h4>related products</h4>
			<div class="slide">
				<div class="owl-carousel owl-theme owl-banner">
					@foreach($relaProduct as $value)
					<div class="item">
						<a class="test-popup-link " href="{{Route('detail',$value->id)}}">
							<img class="img-responsive" src="{{asset('source/KOIBENTO/images/')}}/{{$product->url_image}}" alt="comgasotnam.png">
						</a>
						<div class="list-menu">
							<span>{{$value->unit_price}}<sup>đ</sup></span>
							<h5 class="custom_menu"><a href="luonnhat.html">{{$value->name}}</a></h5>
							<div class="sub-menucon">
								<ul class="nav nav-tabs">
									<li class="checkout"><a href="{{Route('addCart',$value->id)}}">add to cart</a>
										
									</li>
									<li><a href="{{Route('detail',$value->id)}}">xem thêm</a></li>
								</ul>
							</div>
						</div>
					</div>
				
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var flag = false;
	</script>
	
@endsection