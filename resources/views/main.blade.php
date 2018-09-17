
<!DOCTYPE html>
<html lang="vi">
	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		@yield('title')
		<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/normalize.css')}}">
		<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/font-awesome-4.7.0/css/font-awesome.min.css')}}">
		
		<link href="{{asset('source/KOIBENTO/css/hover.css')}}" rel="stylesheet" >
		<link href="{{asset('source/KOIBENTO/css/hover2.css')}}" rel="stylesheet" >
		<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/bootstrap.min.css')}}">		
		<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/animate.css')}}">
		<!-- custom style -->
		<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/home.css')}}">
		<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/details.css')}}">
		<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/menu.css')}}">
		<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/about.css')}}">
		<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/contact.css')}}">
		<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/dinhnguyen.css')}}">
		<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/cart.css')}}">
		<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/checkout.css')}}">
		<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/user-profile.css')}}">
		<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/editProfile.css')}}">
		
		@if(!isset($title))

			<link rel="stylesheet" href="{{asset('source/KOIBENTO/css/custom.css')}}">
			
		@endif
	</head>
	<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
		<div class="preloader">
		    <svg class="circular" viewBox="25 25 50 50">
		        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
		</div>
		<div class="main-wrapper">
			<!--menu-icon-->
			<div class="header-top">
				<div class="background">
					<div class="headder main_header">
						<div class="icon-header">
							<div class="container">
								<div class="row">
									<div class="col-md-6 col-sm-6 col-xs-12">
										<div class="icon1">
											<ul class="list-inline list-item">
												<li><a href="tel:0974704288"><i class="fa fa-phone" aria-hidden="true"></i> 0974 704 288</a></li>
												<li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>    koibento@reach.org.vn</a></li>
											</ul>
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<div class="icon2">
											<ul class="nav navbar-nav navbar-right list-item">
												@if(Auth::check() && (Auth::user()->dec == 0))

												<li>

													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
											           <span class="fa fa-user" aria-hidden="true"></span>
											           &nbsp;&nbsp;{{Auth::user()->fullname}}
											           &nbsp;&nbsp;<span class="caret"></span>
													</a>

													<ul class="dropdown-menu" role="menu">
											           	<li><a href="{{Route('user_profile',Auth::user()->id)}}">Profile</a></li>
											       </ul>

												</li>

												<li><a href="{{Route('logout')}}"><i class="fa fa-lock" aria-hidden="true"></i>Logout</a></li>

											
												@else
												<li><a href="{{Route('login')}}"><i class="fa fa-user-circle" aria-hidden="true"></i>đăng nhập</a></li>
												<li><a href="{{Route('register')}}"><i class="fa fa-lock" aria-hidden="true"></i>đăng ký</a></li>

											@endif
											</ul>
										</div>
									</div>
								</div>
							</div>
							
						</div>	<!-- end menu-icon -->
						
						<!-- menu head -->
						<header id="main_menu" class="header navbar-top"> 
							<div class="nave-menu">
								<nav class="navbar navbar-default">
									<div class="container">
										<div class="navbar-header">
											<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>
										</div>
										<div class="row">
											<div class="col-md-2 col-sm-2 col-xs-12 logo">
												 <a class="navbar-brand" href="{{Route('product')}}">
													<img class="img-responsive logon_fish" src="{{asset('source/KOIBENTO/images/logo.png')}}" alt="logo">
													<p>koi bento</p>
												</a>
												
											</div>
											
											<div class="col-md-10 col-sm-10 col-xs-12">
												<div class="collapse navbar-collapse" id="menu">
													<ul class="nav navbar-nav navbar-right list-item">
													
														<li><a href="{{Route('product')}}">Home</a></li>
														<li><a href="{{Route('category')}}">menu</a></li>
														<li><a href="{{Route('about')}}">about koi</a></li>
														<li><a href="{{Route('contact')}}">contact</a></li>
														<li><a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i></a></li>

														<li class="form"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
															<form action="{{Route('search')}}" method="get">
																<input type="text" name="key" placeholder="search here ..." class="search">
															</form>
														</li>

														<li class="cart"><a href="{{Route('cart')}}">  <span class="red_text"><i class="fa fa-cart-plus" aria-hidden="true"></i><sup id="quanity">
														@if(Session::has('cart'))
														{{$totalQty}}
														@else 0
														@endif
														 </sup></span>
														 </a>
														<!--  @if(Session::has('cart'))
															<div class="sub-menu">
														 	@foreach($product_cart as $item)
																<div class="sub-menu1">
																 	<div class="media"> 
																 		<div class="media-left media-top"> 
																 			<img src ="{{asset('source/KOIBENTO/images/')}}/{{$item['item']->url_image}}" width="70px" height="70px" alt="image"> 
																 		</div> 
																 		<div class="media-body"> 
																 			<h5>{{$item['item']->name}}</h5> 

																 			<p>
																 			<span>{{$item['qty']}}</span>*<span>{{number_format($item['item']->unit_price)}}</span></p> 
																 		</div> 
																	</div> 
																<hr> 
																</div>
															@endforeach 
														
																
																<div class="total">
																	<p>tổng tiền: <span>{{number_format($totalPrice)}}<sup>đ</sup></span></p>
																	<hr>
																</div>
														@endif			
																 <a href="{{Route('cart')}}" class="btn btn_cart">đặt hàng <i class="fa fa-angle-right" aria-hidden="true"></i></a>
																
															</div> -->
															
														</li>
													</ul>
												</div>
											</div>	
										</div>
									</div>
								</nav>
							</div>
						</header><!-- end menu-head -->
					</div>
					@yield('header')
					<!-- phan sline banner -->
					
					
				</div>
			</div>
		
		


		
			@yield('content')
		
		
			<!--phan footer-->
			
			<div class="bottom">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12 addre ">
							<h4>địa chỉ</h4>
							<p>Tầng 2, nhà B, Khu VL1, Trung tâm Thương mại Dịch vụ Trung Văn 1, Q. Nam Từ Liêm,Hà Nội</p>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12 flow ">
							<h4>contact</h4>
							<div class="menu-flow">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="tel:0974704288"><i class="fa fa-phone" aria-hidden="true"></i> 0974 704 288</a></li>
									<li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>    koibento@reach.org.vn</a></li>
									<li><a href="https://www.facebook.com/koibentovietnam/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i>koibentovietnam</a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>koibento@reach.org.vn</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-5 col-sm-5 col-xs-12 time ">
							<h4>Thời gian mở cửa</h4>
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-6 ">
									<div class="opening-schedule">
										<ul class="nav nav-pills nav-stacked">
											<li>Monday  </li>
											<li>Tuesday	 </li>
											<li>Wednesday </li>
											<li>Thursday </li>
											<li>Friday </li>
											<li>Saturday </li>
											<li>Sunday </li>
										</ul>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6 ">
									<div class="opening">
										<ul class="nav nav-pills nav-stacked">
											<li> 8am - 5pm  </li>
											<li> 8am - 5pm  </li>
											<li> 8am - 5pm </li>
											<li> 8am - 5pm</li>
											<li> 8am - 5pm </li>
											<li>Closed</li>
											<li>Closed</li>
										</ul>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			
			<!-- phan write-->
			<div class="writer">
				<div class="container">
					<p>© Copyright KOI Bento 2018. All Right Reserved. Designed and Developed by KOI BenTo</p>
				</div>
			</div><!--het phan write-->


			<div class="scrollup">
	            <a href="#"><i class="fa fa-chevron-up"></i></a>
	        </div>			
	
		</div>
		<script src="{{asset('source/KOIBENTO/js/jquery-1.11.3.min.js')}}"></script>
		<script src="{{asset('source/KOIBENTO/js/jquery.magnific-popup.js')}}"></script>
		<script src="{{asset('source/KOIBENTO/js/jquery.masonry.min.js')}}"></script>
 		<script src="{{asset('source/KOIBENTO/js/bootstrap.min.js')}}"></script>	
		<script src="{{asset('source/KOIBENTO/js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('source/KOIBENTO/js/wow.min.js')}}"></script>
		<script src="{{asset('source/KOIBENTO/js/plugins.js')}}"></script>
		<script src="{{asset('source/KOIBENTO/js/main.js')}}"></script>
		<script src="{{asset('source/KOIBENTO/js/ajax_user.js')}}"></script>
		

		
			<script>
			$(document).ready(function() {
				$('.owl-background').owlCarousel({
					loop:true,
					margin:10,
					 center: true,
					 autoHeight:true,
					 autoplayHoverPause:true,
					nav:true,
					autoplay:true,
					autoplayTimeout:10000,
					dotsEach:true,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:1
						},
						1000:{
							items:1
						}
					}
				});
				
				$('.owl-clent').owlCarousel({
					loop:true,
					margin:10,
					nav:true,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:1
						},
						1000:{
							items:1
						}
					}
				});
				$('.owl-banner').owlCarousel({
							loop:true,
							margin:10,
							 center: true,
							 autoHeight:true,
							nav:true,
							autoplay:true,
							autoplayTimeout:10000,
							dotsEach:true,
							responsive:{
								0:{
									items:1
								},
								600:{
									items:3
								},
								1000:{
									items:3
								}
							}
						});
			});
			
		</script>
		
		<script> new WOW().init(); </script>
		
		<script src="{{asset('source/KOIBENTO/js/jquery.mixitup.min.js')}}"></script>

		
	</body>	
</html>