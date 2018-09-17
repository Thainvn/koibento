@extends('main')
@section('content')
	    <div id="main-wrapper">

	        <div class="unix-login">
	            <div class="container-fluid">
	                <div class="row ">
	                    <div class=" col-lg-offset-4 col-lg-4">
	                    	
	                        <div class="login-content card">
	                            <div class="login-form">
	                                <h4>Register</h4>


	                                <form action="{{Route('register')}}" method="post">
	                                	<input type="hidden" name="_token" value="{{csrf_token()}}">
	                                     <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
	                                        <label>Full Name</label>
	                                        @if ($errors->has('fullname'))
	                                        	<span class="help-block"><strong>{{ $errors->first('fullname') }}</strong></span>
	                                    	@endif
	                                        <input type="text" name="fullname" class="form-control" placeholder="User Name">
	                                    </div>
	                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                                        <label>Email address</label>
											 @if ($errors->has('address'))
	                                        	<span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
	                                    	@endif
	                                        <input type="text" name="email" class="form-control" placeholder="Email">
	                                    </div>
	                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                                        <label>Password</label>
	                                         @if ($errors->has('password'))
	                                        	<span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
	                                    	@endif
	                                        <input type="password" name="password" class="form-control" placeholder="Password">
	                                    </div>
	                                    <div class="checkbox">
	                                       <label class="radio-inline">
	                                            <input type="radio" name="gender" value="Nữ" checked>Nữ
	                                        </label>
	                                        <label class="radio-inline">
	                                            <input type="radio" name="gender" value="Nam">Nam
	                                        </label>
										
	                                    </div>
	                                    <button type="submit" class="btn btn-flat btn-primary  ">Register</button>
	                                    <div class="register-link m-t-15 text-center">
	                                        <p>Already have account ? <a href="{{Route('login')}}"> Sign in</a></p>
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