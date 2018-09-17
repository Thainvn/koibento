@extends("main")
@section('content')
	<!--phan checkout-->
	
	
	
		<!--phan thanh toan-->
	@if(Session::has('cart') && (Session::get('cart')->totalPrice)>0)
		<div class="bill_detail">
		<div class="container">
		@if($errors->has('payment'))
				
			<div class=" alert alert-danger">
				{{$errors->first('payment')}}
			</div>
				
			
			@endif

        	

			<div class="row">
				<form action="{{Route('checkout')}}" method="post">
	                <input type="hidden" name="_token" value="{{csrf_token()}}">
	                @if(Auth::check() && (Auth::user()->dec == 0))
						<div class="col-md-6 col-sm-6 col-xs-12 content-details">
						<h4>Billing Address</h4>
						
					
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-12">
									<p class="form-row form-row-last">
										
										<label>Full name *</label>
										<input type="text" class="form-control" name="fullname" id="firstname" value="{{Auth::user()->fullname}}" disabled="disabled">
										
									</p>
									<p class="form-row form-row-last">
										<label> phone *</label>
											<div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
												@if(Auth::user()->phone)
												<input type="text" class="form-control" name="phone" id="phone"  value="{{Auth::user()->phone}}">
												@else
												 @if ($errors->has('phone'))
		                                        	<span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
		                                    	@endif
												<input type="text" class="form-control" name="phone" id="phone" placeholder ="phone">
												@endif
										 	</div>
									</p>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="form-row form-row-last">
										<label >Gender *</label>
										<div class="checkbox">
	                                       <label class="radio-inline">
	                                            <input type="radio" name="gender" value="Nữ" 
	                                            @if(Auth::user()->gender == "Nữ") 
	                                            checked 
	                                            @else ""
	                                            @endif 
	                                            disabled="disabled">Nữ
	                                        </label>
	                                        <label class="radio-inline">
	                                            <input type="radio" name="gender" value="Nam" 
	                                            @if(Auth::user()->gender == "Nam") 
	                                            	checked 
	                                            @else ""
	                                            @endif 
	                                            disabled="disabled">Nam
	                                        </label>
										
	                                    </div>
									</div>
									<p class="form-row form-row-last">
										<label>email *</label>
										<input type="text" class="form-control" name="email" id="email" value="{{Auth::user()->email}}" disabled="disabled">
									</p>
								</div>
							</div>
							
							<p class="form-row form-row-last">
								<label>street address* </label>
								 <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
									@if(Auth::user()->address)
										<input type="text" class="form-control" id="address" name="address" value="{{Auth::user()->address}}">
									@else
									    @if ($errors->has('address'))
									    	<span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
										@endif
										<input type="text" class="form-control" id="address" name="address" placeholder =" house number and sheet name *">
									@endif
								</div>
							</p>
							
							<label>order notes</label>
							<textarea class="form-control" rows="6" id="notes" name="note"
						
							 placeholder=" Notes about your order, e.g. special notes for delivery." ></textarea>
							
					

					</div>
	                @else
						<div class="col-md-6 col-sm-6 col-xs-12 content-details">
						<h4>Billing Address</h4>
						
					
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-12">
									<p class="form-row form-row-last">
										<div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
											<label>Full name *</label>
											@if ($errors->has('fullname'))
		                                        <span class="help-block"><strong>{{ $errors->first('fullname') }}</strong></span>
		                                    @endif
											<input type="text" class="form-control" name="fullname" id="firstname" placeholder="Full name *" >
										</div>
									</p>
									<p class="form-row form-row-last">
										<div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
											<label> phone *</label>
										    @if ($errors->has('phone'))
										    	<span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
											@endif
											<input type="text" class="form-control" name="phone" id="phone" placeholder="phone  *" >
										</div>
									</p>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="form-row form-row-last">
										<label >Gender *</label>
										<div class="checkbox">
	                                       <label class="radio-inline">
	                                            <input type="radio" name="gender" value="Nữ" checked>Nữ
	                                        </label>
	                                        <label class="radio-inline">
	                                            <input type="radio" name="gender" value="Nam">Nam
	                                        </label>
										
	                                    </div>
									</div>
									<p class="form-row form-row-last">
										<div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
											<label>email *</label>
											 @if ($errors->has('email'))
		                                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
		                                    @endif
											<input type="text" class="form-control" name="email" id="email" placeholder="Email address *" >
										</div>
									</p>
								</div>
							</div>
							
							<p class="form-row form-row-last">
								<div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
									<label>street address* </label>
								    @if ($errors->has('address'))
								    	<span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
									@endif
									<input type="text" class="form-control" id="address" name="address" placeholder=" house number and sheet name *" >
								</div>
							</p>
							
							<label>order notes</label>
							<textarea class="form-control" rows="6" id="notes" name="note" placeholder=" Notes about your order, e.g. special notes for delivery." ></textarea>
							
					

					</div>
					@endif
					<div class="col-md-6 col-sm-6 col-xs-12 additional">
						<h4>Your Cart</h4>
						<div class="your-order-body">

							<div class="your-order-item">
								<div>
								@foreach($product_cart as $item)
								<!--  one item	 -->
									<div class="media checkout_media">
										<img width="25%" height="25%" src="{{asset('source/KOIBENTO/images/')}}/{{$item['item']->url_image}}" alt="image" class="pull-left">
										<div class="media-body">
											<p class="product-name">{{$item['item']->name}}&nbsp;		
												<strong class="product-quantity">&times; {{$item['qty']}}</strong>
											</p>
											<p class="product-total">
												<span>{{number_format($item['item']->unit_price)}}&nbsp;<span class="quantity">&#8363;</span></span>	
											</p>
										</div>
									</div>
								<!-- end one item -->
								@endforeach
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left"><p class="order-total">Tạm Tính:</p></div>
								<div class="pull-right"><strong><span id="demoPrice" class="price">{{$totalPrice}}&nbsp;</span><span class="quantity">&#8363;</span></strong></div>
								<div class="clearfix"></div>
							</div>

							<div class="your-order-item">
								<div class="pull-left"><p class="order-total" >Phí Vận Chuyển:</p></div>
								<div class="pull-right"><strong><span class="price" id="feeShip">&nbsp;</span><span class="quantity">&#8363;</span></strong></div>
								<input type="hidden" name="feeShip" id = "fee_ship">
								<div class="clearfix"></div>
							</div>

							<div class="your-order-item">

								<div class="pull-left"><p class="order-total" id="totalPrice">Tổng tiền:</p></div>

								<div class="pull-right">
									<strong>
										<span class="price" id="total_price">

											{{number_format($totalPrice)}}

										</span>

										<span class="quantity">&#8363;</span>
									</strong>
								</div>

								<div class="clearfix"></div>

							</div>
						</div>

						<h4>Hình thức thanh toán</h4>
						
						<div class="checkbox your-order-body">
							<ul class="payment_methods methods" >
								<li class="payment_method_bacs">
																
								
									<label class="radio-inline">
									    <input id="payment_method_bacs" type="radio" name="payment" value="COD">Thanh Toán Khi Nhận Hàng
									</label>

									<div class="payment_box bacs " style="display: none;">
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
									</div>
									
								</li>

								<li class="payment_method_cheque">

									<label class="radio-inline">
									    <input id="payment_method_cheque" type="radio" name="payment" value="ATM">Chuyển Khoản
									</label>
									<div class="payment_box cheque" style="display: none;">
										Chuyển tiền đến tài khoản sau:
										<br>- Số tài khoản: 123 456 789
										<br>- Chủ TK: Nguyễn A
										<br>- Ngân hàng ACB, Chi nhánh TPHCM
									</div>						
								</li>
								
							</ul>
						</div>
						
							<button type="submit" class="btn-primary" >Đặt hàng <i class="fa fa-chevron-right"></i></button>
						
					</div>
					
					
				</form>
			</div>
		</div>
		</div>
	@elseif(Session::has('message'))
	<div class="shoppe">
    	<img class="img-responsive" src="{{asset('source/KOIBENTO/images/cart-empty.png')}}" alt="cart-empty.png">
		<div class="text-center empty_cart " >Đặt Hàng Thành Công</div>
		<a  class="shopping" href="{{Route('product')}}">Tiếp tục mua sắm</a>
	</div>
    <!-- 	<div class="alert alert-success" >{{Session::get('message')}}</div>
    	<a class="btn btn-primary" href="{{Route('product')}}">Tiếp tục mua sắm</a> -->
    @else
    <div class="shoppe">
    	<img class="img-responsive" src="{{asset('source/KOIBENTO/images/cart-empty.png')}}" alt="cart-empty.png">
		<div class="text-center empty_cart" >Giỏ hàng trống.</div>
		<a  class="shopping" href="{{Route('product')}}">Tiếp tục mua sắm</a>
	</div>
	@endif


	<script type="text/javascript">
		var flag = false;
	</script>
@endsection