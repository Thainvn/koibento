@extends('main')
@section('content')
		<div class="edit-profile">
			<div class="container">
				<h3>edit profile</h3>
				<div class="row">
					@if(count($errors)>0)
					    
					        <div class=" alert alert-danger">
					        @foreach($errors->all() as $err)

					            {{$err}}<br>

					        @endforeach
					        </div>
					    
					
					@endif

					@if(Session::has('message'))
					<div class="alert alert-success" >{{Session::get('message')}}</div>
					@endif

					<form action="{{Route('updateProfile',$user->id)}}" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="text-center">
								@if($user->url_image)
									<img src="{{asset('source/KOIBENTO/images/')}}/{{$user->url_image}}" width ="215px" height="215px" class="avatar img-circle " alt="avatar">
								@else
									<img src="{{asset('source/KOIBENTO/images/profile.png')}}" class="avatar img-circle " alt="avatar">
								@endif
								<h5>Upload a different photo...</h5>
							
								<input type="file" class="edit-file" name="image" value="{{$user->url_image}}">
							</div>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<div class=" personal-info">
								 <h4>Personal info</h4>
								
									<div class="form-group">
										<label for="fullname">full name:</label>
										<input type="text" class="form-control" name="fullname" id="name" placeholder="full name" value="{{$user->fullname}}" >
									</div>
									
									
									
									<div class="form-group">
										<label for="gender">gender:</label>
										 <input type="radio" name="gender" value="male" id="male"> Male
										  <input type="radio" name="gender" value="female" id="female" checked> Female
										  <input type="radio" name="gender" value="other" id="other"> Other  
									</div>
									
									<div class="form-group">
										<label for="phone">phone:</label>
										<input type="text" class="form-control" name="contactnumber" id="email" placeholder="phone" value="{{$user->contactnumber}}">
									</div>
									
									<div class="form-group">
										<label for="address">address:</label>
										<input type="text" class="form-control" name="address" id="address" placeholder="address" value="{{$user->address}}">
									</div>
									
									
									<div class="form-group">
										
										
										<a href="{{Route('user_profile',$user->id)}}" class="back" >Back</a>
										<button class="change"  type="submit">Save Changes</button>
									</div>
								
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	<script type="text/javascript">
		var flag = false;
	</script>
@endsection