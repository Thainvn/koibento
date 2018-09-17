@extends('main')
@section('header')
@endsection
@section('content')
	<!--phần thong tin-->
		<div class="information">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12 hvr-bounce-out">
						<a class="test-popup-link" href="#">

							<img class="img-responsive" src="{{asset('source/KOIBENTO/images/')}}/{{$employee[0]->url_image}}" alt="chef2.png">

						</a>
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-12 ">
						<div class="infor">

							<h3>{{$employee[0]->name}}</h3>
							<span>{{$employee[0]->position}}</span>
							<div class="setplem"></div>
							<p>{{$employee[0]->description}}</p>

						</div>
						<div class="percent">
							<h4>skills</h4>
							<div class="skill">
								<h5> Happy Clients</h5>
								<div class="myProgress">
									<div class="myBar" style="width:{{$employee[0]->happy}};">{{$employee[0]->happy}}</div>
								</div>
							</div>
							<div class="skill">
								<h5> Recipes</h5>
								<div class="myProgress">
									<div class="myBar" style="width:{{$employee[0]->recipes}};">{{$employee[0]->recipes}}</div>
								</div>
							</div>
							<div class="skill">
								<h5> Work</h5>
								<div class="myProgress">
									<div class="myBar" style="width:{{$employee[0]->work}};">{{$employee[0]->work}}</div>
								</div>
							</div>

							<div class="flow1">
							<h4>Follow Me On:</h4>
							<div class="icon-flow">
								<ul class="list-inline">
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--end skills-->
		
		
		<div class="other">
			<div class="container">
				<h4>OTHER CHEFS</h4>
				<div class="row">
					@foreach($relEmployee as $value)

					<div class="col-md-4 col-sm-4 col-xs-12 sBtn06 wow bounceInLeft">

						<a class="test-popup-link" href="{{Route('employee_detail',$value->id)}}">
							<img width="400px" height="400px" class="img-responsive " src="{{asset('source/KOIBENTO/images/')}}/{{$value->url_image}}" alt="chef1.png">
						</a>

						<div class="details ">

							<h5><a href="{{Route('employee_detail',$value->id)}}">{{$value->name}}</a></h5>
							<p>{{$value->position}}</p>

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

		<script type="text/javascript">
			var flag = false;
		</script>
@endsection 