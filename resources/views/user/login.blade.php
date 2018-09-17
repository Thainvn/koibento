@extends('main')
@section('content')
	<div id="main-wrapper">

	    <div class="unix-login">
	        <div class="container-fluid">
	            <div class="row ">
	                <div class=" col-lg-offset-4 col-lg-4">
	                	

	                	@if(Session::has('message'))
	                	<div class="alert alert-danger" >{{Session::get('message')}}</div>
	                	@endif

	                    <div class="login-content card">
	                        <div class="login-form">
	                            <h4>Login</h4>
	                            <form action="{{Route('login')}}" method="post">
	                            <input type="hidden" name="_token" value="{{csrf_token()}}">
	                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                                    <label>Email address</label>
	                                    @if ($errors->has('email'))
	                                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
	                                    @endif
	                                    <input type="text" class="form-control" name ="email"placeholder="Email">
	                                </div>
	                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                                    <label>Password</label>
	                                    @if ($errors->has('password'))
                                           <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                        @endif
	                                    <input type="password" name="password" class="form-control" placeholder="Password">
	                                </div>
	                                 <div >
	                                   
	                                    <label>
	    									<a class="reset_pass" href="#">Lost your password?</a>
	    								</label>

	                                </div>
	                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
	                                <div class="register-link m-t-15 text-center">
	                                    <p>Don't have account ? <a href="{{Route('register')}}"> Sign Up Here</a></p>
	                                </div>
	                            </form>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

	</div>
	<script type="text/javascript">
		var flag = false;
	</script>
@endsection