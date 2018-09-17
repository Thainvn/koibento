@extends('master')
@section('content')
	<div class="user-profile">

		<div class="container">
			<div class="row">	
				<div class="col-lg-11">
					<div class='right-button-margin'>
					  <a href={{Route('listUser')}} class='btn btn-primary pull-right'>Back</a>
					</div>
				</div>
			</div>
			<h3>user profile</h3>
			
			<div class="row">

				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="text-center">
					@if($user->url_image)
						<img src="{{asset('source/KOIBENTO/images/')}}/{{$user->url_image}}" width="215px" height="215px" class="avatar img-circle " alt="avatar">
					@else
						<img src="{{asset('source/KOIBENTO/images/profile.png')}}" class="avatar img-circle " alt="avatar">
					@endif
					</div>
					
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class=" personal information">
				
						<div class="profile-user-info">
							<div class="profile-info">
								<div class="name"> fullname </div>

								<div class="profile">
									<span>{{$user->fullname}}</span>
								</div>
							</div>
							
							
							<div class="profile-info">
								<div class="phone"> phone </div>

								<div class="profile">
									<span>{{$user->contactnumber}}</span>
								</div>
							</div>

							
							<div class="profile-info">
								<div class="email"> email </div>

								<div class="profile-info">
									<a href="#" target="_blank">{{$user->email}}</a>
								</div>
							</div>
							
							<div class="profile-info">
								<div class="gender"> gender </div>

								<div class="profile">
									<span>{{$user->gender}}</span>
								</div>
							</div>

							<div class="profile-info">
								<div class="address"> address </div>

								<div class="profile">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
									<span>{{$user->address}}</span>
								</div>
							</div>

						</div>

						
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection