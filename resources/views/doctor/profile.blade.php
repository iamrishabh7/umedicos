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
						<li>
							<a href="#tab_default_4" data-toggle="tab">
							Contact</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">

							<h4>Specialisation</h4>
							<p>
								@foreach($user->doctor_specialization as $doctor_specialization)
								<span class="label label-success">{{getSpecializationById($doctor_specialization->specialization_id)->name}}</span>
								@endforeach								
							</p>
							<h4>Education </h4>
							<p>I have done PG in Human Resourses</p>
							<h4>Occupation</h4>
							<p>At present Working in Insurance sector</p>

						</div>
						<div class="tab-pane" id="tab_default_2">
							<p>
								Education& Career
							</p>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="email">Highest Education:</label>
										<p> MBA/PGDM</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>

								</div>
							</div>



						</div>
						<div class="tab-pane" id="tab_default_3">
							<p>
								Family Details
							</p>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="email">Highest Education:</label>
										<p> MBA/PGDM</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>

								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab_default_4">
							<p>
								Lifestyle

							</p>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="email">Highest Education:</label>
										<p> MBA/PGDM</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>
									<div class="form-group">
										<label for="email">Place of Birth:</label>
										<p> pune, maharashtra</p>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="menu_title">
					Horoscope
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label for="email">Place of Birth:</label>
								<p> pune, maharashtra</p>
							</div>
							<div class="form-group">
								<label for="email">Date of Birth:</label>
								<p> 26 Sep 2017</p>
							</div>
							<div class="form-group">
								<label for="email">Time of Birth:</label>
								<p> 11:20 min.</p>
							</div>
							<div class="form-group">
								<label for="email">Horroscoe Match not Necessory</label>
							</div>
							<div class="form-group">
								<label for="email">Sun Sign:</label>
								<p> Scorpio</p>
							</div>
							<div class="form-group">
								<label for="email">Rashi/ Moon sign:</label>
								<p> Mesh</p>
							</div>
							<div class="form-group">
								<label for="email">Nakshtra:</label>
								<p> Bharani</p>
							</div>
							<div class="form-group">
								<label for="email">Manglik:</label>
								<p> Manglik</p>
							</div>
							<button type="submit" class="btn btn-danger btn-block">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection