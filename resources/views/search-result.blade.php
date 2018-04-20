<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<style>
/* FontAwesome for working BootSnippet :> */

@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
#team {
	background: #eee !important;
}

.btn-primary:hover,
.btn-primary:focus {
	background-color: #108d6f;
	border-color: #108d6f;
	box-shadow: none;
	outline: none;
}

.btn-primary {
	color: #fff;
	background-color: #007b5e;
	border-color: #007b5e;
}

section {
	padding: 60px 0;
}

section .section-title {
	text-align: center;
	color: #007b5e;
	margin-bottom: 50px;
	text-transform: uppercase;
}

#team .card {
	border: none;
	background: #ffffff;
}

.image-flip:hover .backside,
.image-flip.hover .backside {
	-webkit-transform: rotateY(0deg);
	-moz-transform: rotateY(0deg);
	-o-transform: rotateY(0deg);
	-ms-transform: rotateY(0deg);
	transform: rotateY(0deg);
	border-radius: .25rem;
}

.image-flip:hover .frontside,
.image-flip.hover .frontside {
	-webkit-transform: rotateY(180deg);
	-moz-transform: rotateY(180deg);
	-o-transform: rotateY(180deg);
	transform: rotateY(180deg);
}

.mainflip {
	-webkit-transition: 1s;
	-webkit-transform-style: preserve-3d;
	-ms-transition: 1s;
	-moz-transition: 1s;
	-moz-transform: perspective(1000px);
	-moz-transform-style: preserve-3d;
	-ms-transform-style: preserve-3d;
	transition: 1s;
	transform-style: preserve-3d;
	position: relative;
}

.frontside {
	position: relative;
	-webkit-transform: rotateY(0deg);
	-ms-transform: rotateY(0deg);
	z-index: 2;
	margin-bottom: 30px;
}

.backside {
	position: absolute;
	top: 0;
	left: 0;
	background: white;
	-webkit-transform: rotateY(-180deg);
	-moz-transform: rotateY(-180deg);
	-o-transform: rotateY(-180deg);
	-ms-transform: rotateY(-180deg);
	transform: rotateY(-180deg);
	-webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
	-moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
	box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
}

.frontside,
.backside {
	-webkit-backface-visibility: hidden;
	-moz-backface-visibility: hidden;
	-ms-backface-visibility: hidden;
	backface-visibility: hidden;
	-webkit-transition: 1s;
	-webkit-transform-style: preserve-3d;
	-moz-transition: 1s;
	-moz-transform-style: preserve-3d;
	-o-transition: 1s;
	-o-transform-style: preserve-3d;
	-ms-transition: 1s;
	-ms-transform-style: preserve-3d;
	transition: 1s;
	transform-style: preserve-3d;
}

.frontside .card,
.backside .card {
	min-height: 312px;
}

.backside .card a {
	font-size: 18px;
	color: #007b5e !important;
}

.frontside .card .card-title,
.backside .card .card-title {
	color: #007b5e !important;
}

.frontside .card .card-body img {
	width: 120px;
	height: 120px;
	border-radius: 50%;
}
</style>
<body>
	

	<!-- Team -->
	<section id="team" class="pb-5">
		<div class="container">
			<h5 class="section-title h1">Search Result</h5>
			<div class="row">
				@if(count($doctors) > 0)
				@foreach($doctors as $doctor)
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="image-flip" ontouchstart="this.classList.toggle('hover');">
						<div class="mainflip">
							<div class="frontside">
								<div class="card">
									<div class="card-body text-center">
										<p><img class=" img-fluid" src="{{$doctor->profile_pic}}" alt="card image"></p>
										<h4 class="card-title">{{$doctor->user->name}}</h4>
										<p class="card-text">This is basic description of user.</p>
									</div>
									
								</div>
							</div>
							<div class="backside">
								<div class="card">
									<div class="card-body text-center mt-4">
										<h4 class="card-title">{{$doctor->clinic->name}}</h4>
										<p class="card-text">This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.</p>
										<ul class="list-inline">
											<li class="list-inline-item">
												<a class="social-icon text-xs-center" target="_blank" href="#">
													<i class="fa fa-facebook"></i>
												</a>
											</li>
											<li class="list-inline-item">
												<a class="social-icon text-xs-center" target="_blank" href="#">
													<i class="fa fa-twitter"></i>
												</a>
											</li>
											<li class="list-inline-item">
												<a class="social-icon text-xs-center" target="_blank" href="#">
													<i class="fa fa-skype"></i>
												</a>
											</li>
											<li class="list-inline-item">
												<a class="social-icon text-xs-center" target="_blank" href="#">
													<i class="fa fa-google"></i>
												</a>
											</li>
										</ul>
										<a href="{{URL('/doctorID/'.$doctor->doctor_id)}}" class="btn btn-primary" style="color: white;">View profile</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@else
				<h1>No Doctors Found</h1>
				@endif
			</div>
		</div>
	</section>
	<!-- Team -->
	<footer>
	<div class="footer">
		<a href="">Powered by</a>
	</div>
</footer>
</body>
</html>