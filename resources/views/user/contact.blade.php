@extends('main')
@section('header')

@endsection
@section('content')

		
		<!--map-->
		<div class="map">
			<div class="container">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4429.725973198409!2d105.77847852647008!3d20.995014394966482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134534b3ece9ae7%3A0x2c54e8431a783aaf!2zVHJ1bmcgdMOibSBSRUFDSCBIw6AgTuG7mWk!5e0!3m2!1svi!2s!4v1535687772894" ></iframe>
			</div>
		</div><!--end map-->
		
		<div class="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12 informaition">
						<h4>INFORMATION</h4>
						<div class="setplem"></div>
						<div class="content-contact">
							<div class="media">
								<div class="media-left ">
									<i class="fa fa-phone" aria-hidden="true"></i>
								</div>
								<div class="media-body ">
									<h4 class="media-heading">Phone</h4>
									<p> 0974 704 288</p>
								</div>
							</div>
							
							<div class="media">
								<div class="media-left">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>
								<div class="media-body ">
									<h4 class="media-heading">Address</h4>
									<p>  Trung tâm Thương mại Dịch vụ Trung Văn 1, Q. Nam Từ Liêm,Hà Nội</p>
								</div>
							</div>
							
							<div class="media">
								<div class="media-left">
									<i class="fa fa-envelope-o" aria-hidden="true"></i>

								</div>
								<div class="media-body ">
									<h4 class="media-heading">E-mail</h4>
									<p> koibento@reach.org.vn</p>
								</div>
							</div>
							
							<div class="media">
								<div class="media-left">
									<i class="fa fa-share-alt" aria-hidden="true"></i>

								</div>
								<div class="media-body ">
									<h4 class="media-heading">Follow Us</h4>
									<ul class="list-inline">
										<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8 col-sm-8 col-xs-12 form">
						<h4>SEND US A MASSEGE</h4>
						<div class="setplem"></div>
						<div class="content-form">
							<form action="#" method="post">
								<div class="row">
									<div class="col-md-6 col-sm-6 col-xs-12 ">
										<input type="text" class="form-control" id="name" placeholder="Name *" required>
									</div>
									
									<div class="col-md-6 col-sm-6 col-xs-12 ">
										<input type="text" class="form-control" id="email" placeholder="email *" required>
									</div>
								</div>
								
								<input type="text" class="form-control" id="subject" placeholder="subject *" required>
								 <textarea class="form-control" rows="6" id="message"placeholder="message *" required></textarea>
								 <button type="submit" class="send">send</button>
		
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--het phan form-->
		<script type="text/javascript">
			var flag = false;
		</script>
@endsection 