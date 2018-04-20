	@extends('layout.app')
	@section('content')
	@section('title','Profile')
<header id="header">
	<div class="container">
	<div class="slider">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<?php $i = 0; ?>
				@foreach($clinic_images as $clinic_image)
				<div class="item {{$i == 0 ? 'active':''}}">
					<img src="{{$clinic_image->image}}" width="100%" height="360" style="object-fit: cover; height: 360px;">
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
	</div>
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

									<div class="form-group">
										<label for="email">Timing</label>
										<p>{{$user->doctor->address1_timing}}</p>
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
									
									<div class="form-group">
										<label for="email">Timing</label>
										<p>{{$user->doctor->address2_timing}}</p>
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
