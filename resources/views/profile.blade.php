	@extends('layout.app')
	@section('content')
	@section('title','Profile')
	<style>
	#header {
		border: 1px solid #ddd;
		margin-bottom: 20px;
	}

	.navbar {
		border-radius: 0;
		margin-bottom: 0;
		border: none;
		font-family: 'Open Sans Condensed', sans-serif, sans-serif;
	}

	.navbar > li >a {}

	.navbar-header {}

	.profile_pic {
		width: 160px;
		height: 160px;
		float: left;
		padding: 0;
		margin-top: -130px;
		overflow: hidden;
		border: 3px solid #eee;
		margin-left: 15px;
		background: #333;
		text-align: center;
		line-height: 160px;
		color: #fff !important;
		font-size: 2em;
		-webkit-transition: all 0.3s ease-in-out;
		-moz-transition: all 0.3s ease-in-out;
		-o-transition: all 0.3s ease-in-out;
		transition: all 0.3s ease-in-out;
	}

	.site-name {
		color: #fff;
		font-size: 2.4em;
		float: left;
		margin-top: -75px !important;
		margin-left: 15px;
		font-family: 'Open Sans Condensed', sans-serif, sans-serif;
	}

	.site-description {
		color: #fff;
		font-size: 1.3em;
		float: left;
		margin-top: -30px !important;
		margin-left: 15px;
	}

	.main-menu {
		position: absolute;
		left: 190px;
	}

	.slider,
	.carousel {
		max-height: 360px;
		overflow: hidden;
	}

	.carousel-control .fa-angle-left,
	.carousel-control .fa-angle-right {
		position: absolute;
		top: 50%;
		font-size: 2em;
		z-index: 5;
		display: inline-block;
	}

	.carousel-control {
		background-color: transparent;
		background-image: none !important;
	}

	.carousel-control:hover,
	.carousel-control:focus {
		color: #fff;
		text-decoration: none;
		background-color: transparent !important;
		background-image: none !important;
		outline: 0;
	}

	@media (max-width: 768px) {
		.profile_pic {
			max-width: 100px;
			max-height: 100px;
			float: left;
			margin-top: -65px;
			margin-left: 15px;
			-webkit-transition: all 0.3s ease-in-out;
			-moz-transition: all 0.3s ease-in-out;
			-o-transition: all 0.3s ease-in-out;
			transition: all 0.3s ease-in-out;
		}
		.navbar {
			border-radius: 0;
			margin-bottom: 0;
			border: none;
		}
		.main-menu {
			left: 0;
			position: relative;
		}
	}

	@media (max-width: 490px) {
		.site-name {
			color: #fff;
			font-size: 1.5em;
			float: left;
			line-height: 20px;
			margin-top: -100px !important;
			margin-left: 125px;
		}
		.site-description {
			color: #fff;
			font-size: 1.3em;
			float: left;
			margin-top: -80px !important;
			margin-left: 125px;
		}
	}
</style>
<header id="header">
	<div class="slider">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<?php $i = 0; ?>
				@foreach($clinic_images as $clinic_image)
				<div class="item {{$i == 0 ? 'active':''}}">
					<img src="{{$clinic_image->image}}">
				</div>
				<?php $i++; ?>
				@endforeach
			</div>
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="profile_pic" href="#"><img class="img-responsive" src="{{$user->doctor->profile_pic}}"></a>
			<span class="site-name"><b>{{$user->name}}</span>
			</div>
			<div class="collapse navbar-collapse" id="mainNav">
				<ul class="nav  navbar-nav">
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				</ul>
			</div>
		</nav>
	</header>  
	<div class="container">
		<div class="col-sm-8">

			<div data-spy="scroll" class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#tab_default_1" data-toggle="tab">
							About </a>
						</li>
						<li>
							<a href="#tab_default_2" data-toggle="tab">
							Clinic Details</a>
						</li>
						<li>
							<a href="#tab_default_3" data-toggle="tab">
							Operational Days</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
							<h4>Mobile </h4>
							<p>{{$user->doctor->primary_contact}} , {{$user->doctor->secondary_contact}}</p>
							<h4>Email</h4>
							<p>{{$user->email}}</p>
						</div>
						<div class="tab-pane" id="tab_default_2">
							<h4>Specialisation</h4>
							<p>
								@foreach($user->doctor_specialization as $doctor_specialization)
								<span class="label label-success">{{getSpecializationById($doctor_specialization->specialization_id)->name}}</span>
								@endforeach								
							</p>
						</div>
						<div class="tab-pane" id="tab_default_3">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="email">Address 1</label>
										<p>{{$user->doctor->address1}}</p>
									</div>
									<div class="form-group">
										<label for="email">Operational Days</label>
										<p>
											<?php   $operational_days = explode(',',$user->doctor->operational_days1); ?>
											@foreach($operational_days as $day)
											{{$day}}
											@endforeach
										</p>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="email">Address 2</label>
										<p>{{$user->doctor->address2}}</p>
									</div>
									<div class="form-group">
										<label for="email">Operational Days</label>
										<p>
											<?php   $operational_days = explode(',',$user->doctor->operational_days2); ?>
											@foreach($operational_days as $day)
											{{$day}}
											@endforeach
										</p>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
		
	</div>
	@endsection
