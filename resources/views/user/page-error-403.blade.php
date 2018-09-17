@extends('main')
@section('content')
	    <!-- Preloader - style you can find in spinners.css -->
	    <div class="preloader">
	        <svg class="circular" viewBox="25 25 50 50">
				<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
	    </div>
	    <!-- Main wrapper  -->
	    <div class="error-page" id="wrapper">
	        <div class="error-box">
	            <div class="error-body text-center">
	                <h1>503</h1>
	                <h3 class="text-uppercase">This site is getting up in few minutes. </h3>
	                <p class="text-muted m-t-30 m-b-30">Please try after some time</p>
	                <a class="btn btn-info btn-rounded waves-effect waves-light m-b-40" href="{{Route('product')}}">Back to home</a> </div>
	            <footer class="footer text-center">&copy; N & T</footer>
	        </div>
	    </div>
	    <!-- End Wrapper -->
@endsection