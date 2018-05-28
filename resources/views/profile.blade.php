	@extends('layout.app')
	@section('content')
	@section('title','Profile')


	<style type="text/css">
	.footer
	{
		position: relative !important;
	}
	#map {
		width: 100%;
		height: 400px;
		background-color: grey;
	}
	.text-bold {font-weight: bold; color: #039be5; }
	th, td { text-align: left; padding: 30px;}
	tr:nth-child(even){background-color: #f2f2f2;}
	.padd-30 {padding-top: 30px;}



</style>

<header id="header">
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
			<a class="profile_pic" href="#"><img class="img-responsive" src="{{$user->doctor->profile_pic}}"></a>
			<span class="site-name">{{$user->name}}</span>
		</div>

	</nav>
</header>

<div class="clearfix"></div>
<section class="pro-marg"> 
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default color-text">
					<div class="panel-heading">Profile Details</div>
					<div class="panel-body panel-body-fixh">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab_default_1" data-toggle="tab">About </a></li>
							<li><a href="#tab_default_2" data-toggle="tab">Clinic Details</a></li>
							<li>
								<a href="#tab_default_3" data-toggle="tab">Operational Days</a>
							</li>
							<li>
								<a href="#tab_default_4" data-toggle="tab">Map</a>
							</li>
						</ul>

						<div class="tab-content">

							<div class="tab-pane fade in active" id="tab_default_1">
								<table class="table table-responsive">

									<tbody>

										<tr>
											<td class="text-bold">Name</td>
											<td>{{$user->name}}</td>
										</tr>
										<tr>
											<td class="text-bold">Email</td>
											<td>{{$user->email}}</td>
										</tr>
										<tr>
											<td class="text-bold">Qualification</td>
											<td>{{$user->doctor->qualification}}</td>
										</tr>
										<tr>
											<td class="text-bold">Mobile</td>
											<td>{{$user->doctor->primary_contact}} , {{$user->doctor->secondary_contact}}</td>
										</tr>

										<tr>
											<td class="text-bold">Specialisation</td>
											<td>
												@foreach($user->doctor_specialization as $doctor_specialization)
												<span>{{getSpecializationById($doctor_specialization->specialization_id)->name}}</span>
											@endforeach</td>
										</tr>

									</tbody>
								</table>
							</div>



							<div class="tab-pane fade" id="tab_default_2">
								<table class="table table-responsive">
									<tbody>
										<tr>
											<td class="text-bold">Registration Number</td>
											<td>{{$doctor_clinic->registration_number}}</td>
										</tr>
										<tr>
											<td class="text-bold">Address 1</td>
											<td id="addr1">{{$user->doctor->address1}}</td>
										</tr>

										<tr>
											<td class="text-bold">Address 2</td>
											<td>{{$user->doctor->address2}}</td>
										</tr>

									</tbody>
								</table>
							</div>

							<div class="tab-pane fade" id="tab_default_3">

								<p class="text-bold">Operational Days 1</p>
								<table class="table table-responsive">
									<thead>
										<tr>
											<th class="text-bold">Days</th>
											<th class="text-bold">Timing Morning </th>
											<th class="text-bold">Evening Timing</th>
										</tr>
									</thead>
									<tbody>
										@foreach($operational_days1 as $operational_day1)
										<tr>
											<td>{{$operational_day1->day}}</td>
											<td>{{$operational_day1->from_time}}</td>
											<td>{{$operational_day1->to_time}}</td>
										</tr>
										@endforeach


									</tbody>
								</table>
								<p class="text-bold">Operational Days 2</p>
								<table class="table table-responsive">
									<thead>
										<tr>
											<th class="text-bold">Days</th>
											<th class="text-bold">Timing Morning </th>
											<th class="text-bold">Evening Timing</th>
										</tr>
									</thead>
									<tbody>
										@foreach($operational_days2 as $operational_day2)
										<tr>
											<td>{{$operational_day2->day}}</td>
											<td>{{$operational_day2->from_time}}</td>
											<td>{{$operational_day2->to_time}}</td>
										</tr>
										@endforeach


									</tbody>
								</table>
							</div>


							<div class="tab-pane fade" id="tab_default_4">
								<div id="map"></div>
								
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>

<div class="clearfix"></div>

@section('script')
<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->

<script>
	
	var geocoder;
	var map;
	var address = document.getElementById("addr1").innerText;
	function initialize() {
		geocoder   = new google.maps.Geocoder();
		var latlng = new google.maps.LatLng(28.644800,77.216721);
		var myOptions = {
			zoom: 15,
			center: latlng,
			mapTypeControl: true,
			mapTypeControlOptions: {
				style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
			},
			navigationControl: true,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById("map"), myOptions);
		
		if (geocoder) {
			geocoder.geocode({
				'address': address
			}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
						map.setCenter(results[0].geometry.location);

						var infowindow = new google.maps.InfoWindow({
							content: '<b>' + address + '</b>',
							size: new google.maps.Size(150, 50)
						});

						var marker = new google.maps.Marker({
							position: results[0].geometry.location,
							map: map,
							title: address
						});
						google.maps.event.addListener(marker, 'click', function() {
							infowindow.open(map, marker);
						});

					} else {
						alert("No results found");
					}
				} else {
					alert("Geocode was not successful for the following reason: " + status);
				}
			});
		}
	}
	google.maps.event.addDomListener(window, 'load', initialize);

</script>
@endsection
@endsection
