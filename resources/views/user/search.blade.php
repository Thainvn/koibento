@extends('main')
@section('content')
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="list">
							<h3>Search Products</h3>
							<div class="beta-products-details">
								<h6 class="text-center">{{count($product)}} products is found</h6>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product as $value)
								<div class="col-md-4 col-sm-4 col-xs-12 image1 wow bounceInLeft" data-wow-duration="2s" >
									<div class="card">
										<a class="test-popup-link " href="{{Route('detail',$value->id)}}">
											<img class="img-responsive" src="{{asset('source/KOIBENTO/images/')}}/{{$value->url_image}}" alt="menu food">
										</a>
										<div class="content_list">
											<span>{{$value->unit_price}}<sup>đ</sup></span>
											<h5><a href="{{Route('detail',$value->id)}}">{{$value->name}}</a></h5>
											<div class="menucon">
												<ul class="nav nav-tabs">
													<li class="checkout"><a href="{{Route('addCart',$value->id)}}">add to cart</a>
														
													</li>
													<li><a href="{{Route('detail',$value->id)}}">xem thêm</a></li>
													
												</ul>
											</div>
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
						</div> <!-- .beta-products-list -->

						

					
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	<script type="text/javascript">
		var flag = false;
	</script>
@endsection