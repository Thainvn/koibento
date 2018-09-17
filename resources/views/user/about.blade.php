@extends('main')
@section('header')
@endsection
@section('content')
	<!--phan history-->
	<div class="our-history">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-sm-7 col-xs-12 history">
					<h4>OUR HISTORY</h4>
					<p class="koi">KOI Bento là một dự án doanh nghiệp xã hội trong đó toàn bộ lợi nhuận dùng để giúp đỡ những thanh niên có hoàn cảnh khó khăn đang theo học tại REACH – một trong những NGO đạt đước nhiều thành công tại Việt Nam. Hằng năm, REACH đào tạo hơn 1000 thành niên có hoàn cảnh khó khăn tại Việt Nam, từ đó giúp các em có được công việc ổn định.</p>
					<p class="koi">KOI Bento chuyên cung cấp hộp cơm trưa Nhật Bản tới tận tay khách hàng. Tất cả các sản phẩm của KOI đều được chuẩn bị công phu bởi các đầu bếp của REACH và các học sinh. Đầu bếp tại REACH được đào tạo bởi đầu bếp có kinh nghiệm dày dặn tại Nhật Bản. Các em học sinh theo chương trình đào tạo có đủ điều kiện để phục vụ cho các nhà hàng Nhật Bản và khách sạn 5 sao.</p>
					<p class="koi">Tất cả thực đơn đảm bảo tươi ngon, giàu dinh dưỡng và chuẩn bị bởi những nguyên liệu tuyệt vời nhất. Chúng tôi luôn nỗ lực mang tới những món ăn chuẩn Nhật tới thực khách của KOI.<p>
					<span>KOI BENTO – Hộp cơm trưa Nhật Bản tươi ngon và dinh dưỡng cho tất cả mọi người.</span>
				</div>
				<div class="col-md-5 col-sm-5 col-xs-12 img">
					<a class="test-popup-link" href="#">
						<img class="img-responsive " src="{{asset('source/KOIBENTO/images/aboutKoi.jpg')}}" alt="chef.jpg">
					</a>
				</div>
			</div>
		</div>
	</div><!--het phan history-->
	
	<!--phan dau bep-->
	
	<div class="chef">
		<div class="container">
			<div class="expanded">
				<h4>OUR EXPERT CHEF </h4>
				<div class="separator"></div>
			</div>
			<div class="Column">
				<div class="row">
					@foreach($employee as $employee)
					<div class="col-md-4 col-sm-4 col-xs-12 sBtn06 wow bounceInLeft">
						<a class="test-popup-link" href="{{Route('employee_detail',$employee->id)}}">
							<img width="400px" height="400px" class="img-responsive " src="{{asset('source/KOIBENTO/images/')}}/{{$employee->url_image}}" alt="chef.png">
						</a>
						<div class="details ">
							<h5><a href="{{Route('employee_detail',$employee->id)}}">{{$employee->name}}</a></h5>
							<p>{{$employee->position}}</p>
							<div class="list-container">
								<ul class="btn-list">
									<li><a href="#" class="fa fa-facebook"></a>	</li>
									<li><a href="#" class="fa fa-twitter"></a></li>
									<li><a href="#" class="fa fa-plus"></a>
									</li>
									<li><a href="#" class="fa fa-linkedin"></a></li>
									
								</ul>
							</div>
						</div>
					</div>
					@endforeach
					
				</div>
			</div>
		</div>
	</div><!--end chef-->
	<script type="text/javascript">
		var flag = false;
	</script>
@endsection 