@extends('main')
@section('header')
@endsection

@section('content')
	<!--phần thực đơn món-->
	<div class="dishes">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-sm-2 col-xs-12 ">
					<div class="category">
						<h4>category</h4>
						<ul class="nav nav-pills nav-stacked ">
							<li class="active">
								<a data-toggle="pill" href="#all">show all</a>
							</li>
							@foreach($category as $cate)

							<li><a data-toggle="pill" href="#lab{{$cate->id}}">{{$cate->name}}</a></li>

							@endforeach
						</ul>


						
					</div>
				</div>
				<div class="col-md-10 col-sm-10 col-xs-12 ">
					<div class="category">
						<h2 class="text-center">Product</h2>
					</div>
					
					<div class="tab-content">
						<div id="all" class="tab-pane fade in active">
							
							<div class="row">
								@foreach($product as $value)
								<div class="col-md-4 col-sm-4 col-xs-12 image1 wow bounceInRight" data-wow-duration="2s" >
									<div class="card custom_card">
										<a class="test-popup-link " href="{{Route('detail',$value->id)}}">
											<img class="img-responsive" src="{{asset('source/KOIBENTO/images/')}}/{{$value->url_image}}" alt="menu food">
										</a>
										<div class="content-list">
											<span>{{number_format($value->unit_price)}}<sup>đ</sup></span>
											<h5><a href="{{Route('detail',$value->id)}}">{{$value->name}}</a></h5>
											<div class="menucon-sub">
												<ul class="nav nav-tabs">

													<li class="checkout"><a class="add_to_cart" href="#" data-id="{{ $value->id }}">add to cart</a></li>
													<li><a href="{{Route('detail',$value->id)}}">xem thêm</a></li>
												
												</ul>
											</div>
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

									<div class="col-md-4 col-sm-4 col-xs-12 image1 wow bounceInRight" data-wow-duration="2s">
										<a class="test-popup-link " href="{{Route('detail',$value->id)}}">
											<img class="img-responsive" src="{{asset('source/KOIBENTO/images/')}}/{{$value->url_image}}" alt="Menu big bento">
										</a>
										<div class="content-list">
											<span>{{number_format($value->unit_price)}}<sup>đ</sup></span>

											<h5><a href="{{Route('detail',$value->id)}}">
												{{$value->name}}
											</a></h5>

											<div class="menucon-sub">
												<ul class="nav nav-tabs">
													<li class="checkout"><a href="{{Route('addCart',$value->id)}}" class="add_to_cart" data-id="{{ $value->id }}">add to cart</a>
														
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
	</div><!--het phan thuc don-->
	
	<script>
		var flag = false;
	</script>
@endsection