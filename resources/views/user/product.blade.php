@extends('main')
	@section('title')
		<title>Koi Bento</title>
	<?php 
		$title = "Koi";
	 ?>
	@endsection
@section ('header')
	
	<div class="owl-carousel owl-theme owl-background">
		@foreach ($slide as $value)
		<div class="item">
			<div class="banner1">	
				<a class="test-popup-link" href="#">
					<img src="{{asset('source/KOIBENTO/images/')}}/{{$value->url_image}}" alt="Image food about Koibento">
					
				</a>
				<div class="content wow bounceInRight" data-wow-duration="5s" >
					<h1><span> KOI BENTO- </span> JAPANESE LUNCH BOX</h1>
					<h4>Fresh, tasty and healthy Japanese lunch boxes for everyone</h4>
					<button  type="button" class="btn btn-default">Order Now</button>
				</div>
			</div>
		</div>
		@endforeach
		
		
		
	</div><!-- hết phần slide banner	 -->
@endsection
@section('content')
	


	<!-- phan tab menu -->
	<div class="food-menu">
		<div class="container">
			<div class="food list">
				<h4>food menu</h4>
				<div class="list">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#all">show all</a></li>
						@foreach($category as $value)
						<li><a data-toggle="tab" href="#lab{{$value->id}}">{{$value->name}}</a></li>
						@endforeach
					 </ul>
					 
					 <div class="tab-content">
						<div id="all" class="tab-pane fade in active">
							
							<div class="row">
								@foreach($product as $value)
								<div class="col-md-4 col-sm-4 col-xs-12 image1">
									<a class="test-popup-link " href="{{Route('detail',$value->id)}}">
										<img class="img-responsive" src="{{asset('source/KOIBENTO/images/')}}/{{$value->url_image}}" alt="menu food">
									</a>
									<div class="content_list">
										<span>{{number_format($value->unit_price)}}<sup>đ</sup></span>
										<h5><a href="{{Route('detail',$value->id)}}">{{$value->name}}</a></h5>
										<div class="menucon">
											<ul class="nav nav-tabs">
												<li class="checkout"><a class="add_to_cart" href="#" data-id="{{ $value->id }}">add to cart</a>
																									
												</li>
												<li><a href="{{Route('detail',$value->id)}}">xem thêm</a></li>
												
											</ul>
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
							
							
						</div>

						@foreach($category as $category)
							<div id="lab{{$category->id}}" class="tab-pane fade">
								<div class="row">
									@foreach($product as $value)
									@if($value->category_id == $category->id)

									<div class="col-md-4 col-sm-4 col-xs-12 image1  ">
										<a class="test-popup-link " href="{{Route('detail',$value->id)}}">
											<img class="img-responsive" src="{{asset('source/KOIBENTO/images/')}}/{{$value->url_image}}" alt="Menu big bento">
										</a>
										<div class="content_list">
											<span>{{number_format($value->unit_price)}}<sup>đ</sup></span>

											<h5><a href="{{Route('detail',$value->id)}}">
												{{$value->name}}
											</a></h5>

											<div class="menucon">
												<ul class="nav nav-tabs">
													<li class="checkout"><a href="{{Route('addCart',$value->id)}}">add to cart</a>
														
													</li>
													<li><a href="{{Route('detail',$value->id)}}">xem thêm</a></li>
												</ul>
											</div>
										</div>
									</div>
									@endif
									@endforeach
									
								</div>
							</div>
						@endforeach
									
						
						
					 </div>
				</div>				
			</div>
		</div>
	</div><!-- End tab menu  -->
	
	
	<!-- phần favorite -->
	<div class="favorite">
		<div class="container">
			<div class="popular">
				<h4>Top products</h4>
				<div class="row">
					@foreach($topProduct as $value)
					<div class="col-md-4 col-sm-4 col-xs-12 image2">
						<div class="card">
							<a class="test-popup-link" href="{{Route('addCart',$value[0]->id)}}">
								<img class="img-responsive" src="{{asset('source/KOIBENTO/images/')}}/{{$value[0]->url_image}}" alt="image food">
							</a>
							<span>{{number_format($value[0]->unit_price)}}<sup>đ</sup></span>
							<h5 class="custom_menu"><a href="{{Route('detail',$value[0]->id)}}">{{$value[0]->name}}</a></h5>
							<div class="sub_menu">
								<ul class="nav nav-tabs">
									<li class="checkout"><a href="{{Route('addCart',$value[0]->id)}}">add to cart</a>
										
									</li>
									<li><a href="{{Route('detail',$value[0]->id)}}">xem thêm</a></li>
								</ul>
							</div>
						</div>
					</div>
					@endforeach
					
				</div>									
			</div>
		</div>			
	
	</div><!-- phần popular -->
	
	<!-- phần y kien khach hang -->
	
	<div class="our-client">
		<div clas="container">
			<h4>OUR Customer</h4>
			<h5>WHAT OUR CLIENT SAY</h5>
			<div class="owl-carousel owl-theme owl-clent">
				<div class="item">
					<a class="test-popup-link " href="#">
						<img class="img-responsive " src="{{asset('source/KOIBENTO/images/so1.png')}}" alt="so1.jpg/jpg" width="100">
					</a>
					<div class="icon">
						<ul class="nav nav-pills">
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<p class="coment">This is a very flavorful pasta salad. The crisp cooked bacon really adds a nice flavor. I get requests for this pasta salad for every get together and cook out.</p>
					<span>David Jack</span>
					
				</div>
				<div class="item">
					<a class="test-popup-link" href="#">
						<img class="img-responsive" src="{{asset('source/KOIBENTO/images/so2.png')}}" alt="so2.png/jpg">
					</a>
					<div class="icon">
						<ul class="nav nav-pills">
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<p class="coment">I have used it often. It's easy and uses pantry staples. Always a hit with adults and kids. Serve with basmati rice or quinoa and steamed or roasted vegetables.</p>
					<span>eniffer Maria</span>
				</div>
				<div class="item">
					<a class="test-popup-link" href="#">
						<img class="img-responsive" src="{{asset('source/KOIBENTO/images/so3.png')}}" alt="so3.png/jpg">
					</a>
					<div class="icon">
						<ul class="nav nav-pills">
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
	
						</ul>
					</div>
					<p class="coment">I have used it often. It's easy and uses pantry staples. Always a hit with adults and kids. Serve with basmati rice or quinoa and steamed or roasted vegetables.</p>
					<span>David Tommy</span>
				</div>
			</div>
		</div>
	</div><!-- het phan coment -->
<script type="text/javascript">
	var flag = true;
</script>

@endsection