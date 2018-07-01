<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Find Doctor | @yield('title')</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="_token" content="{{ csrf_token() }}" />
	<!-- Bootstrap 3.3.7 -->
	
	{{Html::style("css/style.css")}}
	{{Html::style("assets/plugins/bootstrap/css/bootstrap.min.css")}}
	{{Html::style("assets/plugins/fontawesome/css/font-awesome.css")}}
	{{Html::style("assets/plugins/bootstrap-datepicker/css/datepicker3.css")}}
	{{Html::style("assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css")}}
	{{Html::style("css/sweetalert2.min.css")}}
	{{Html::style("css/select2.min.css")}}
	@yield('style')

<style>
	img.img-responsive.logo { width: 150px; padding-top: 10px;}
</style>

	<body>

		<nav class="navbar navbar-inverse "  role="navigation">
			<div class="container abc">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{URL('/')}}">
						<img src="{{URL('/images/logo.png')}}" class=" img-responsive logo">

					<!-- 
						<img src="https://image.flaticon.com/icons/svg/840/840644.svg" alt="logo" class="img-responsive logo"><span style="color: #08aaf4; padding-left: 8px;">DocApp</span> -->

					</a>
				</div>

				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right">
						@if(\Auth::check())
						@if(\Auth::user()->role != 0)
						<li>
							<a class="" data-toggle="modal" href="{{\Auth::user()->role == 1 ? URL('/doctor/profile/edit') : URL('/patient/profile/edit')}}">Edit Profile</a>
						</li> 
						<li>
							<a class="" data-toggle="modal" href='#changePassModal'>Change Password</a>
						</li>
						@else
						<li>
							<a class="" href="{{URL('/admin/dashboard')}}">Dashboard</a>
						</li> 
						@endif
						<li>
							<a class="" data-toggle="modal" href="{{URL('/logout')}}">Logout</a>
						</li>
						
						@else
						<li><a class="" data-toggle="modal" href='#loginModal'><span class="glyphicon glyphicon-user"></span> Sign In</a></li>
						<li><a class="" data-toggle="modal" href='#registerModal'><span class="glyphicon glyphicon-log-in"></span> Sign up</a></li>
						@endif

					</ul>
				</div>
			</div>
		</nav>
		@yield('content')
		<!-- change password Modal -->
		<div class="modal fade empList-modal-lg " id="changePassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-body">
					<div class="panel panel-white">
						<div class="panel-heading clearfix">
							<h4 class="panel-title" id="msg">Change Password</h4> 

						</div>
						<div class="panel-body">
							<form class="form-horizontal" >
								{{csrf_field()}}
								<div class="form-group">
									<label for="old_password" class="col-sm-4 control-label">Old Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password">  
									</div>
								</div>
								<div class="form-group">
									<label for="new_password" class="col-sm-4 control-label">New Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">  
									</div>
								</div>
								<div class="form-group">
									<label for="confirm_password" class="col-sm-4 control-label">Confirm Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">  
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<a  id="changePassword"  class="btn btn-success">Change</a>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- change password Modal -->

		<!-- Login Modal-->
		<div class="modal fade login-register-form" role="dialog" id="loginModal">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span class="glyphicon glyphicon-remove"></span>
						</button>
						<a href="#login-form"> Sign In <span class="glyphicon glyphicon-user"></span></a>
					</ul>
				</div>
				<div class="modal-body">
					<form action="{{URL('/login')}}"  id="loginForm">
						{{csrf_field()}}
						<div class="form-group">
							<label for="login_email">Email:</label>
							<input type="email" class="form-control" id="login_email" placeholder="Enter email" name="login_email">
						</div>
						<div class="form-group">
							<label for="login_password">Password:</label>
							<input type="password" class="form-control" id="login_password" placeholder="Enter password" name="login_password">
						</div>
						<button type="submit" class="btn btn-default">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- Register Modal-->
	<div class="modal fade login-register-form" role="dialog" id="registerModal">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
					<a data-toggle="tab" href="#registration-form"> Sign Up <span class="glyphicon glyphicon-pencil"></span></a>
				</ul>
			</div>
			<div class="modal-body">
				<div class="tab-content">
					<div id="registration-form" class="tab-pane fade in active">
						<form action="{{URL('/register')}}"  id="registerForm">
							{{csrf_field()}}
							<div class="form-group">
								<label for="name">Your Name:</label>
								<input type="text" class="form-control" id="reg_name" onkeypress="return alphaOnly(event)" placeholder="Enter your name" name="name" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="mobile">Mobile Number:</label>
								<input type="text" class="form-control" id="reg_mobile" onkeypress="return isNumber(event)" placeholder="Enter Mobile Number" name="reg_mobile">
							</div>
							<div class="form-group">
								<label for="reg_email">Email:</label>
								<input type="email" class="form-control" id="reg_email" placeholder="Enter new email" name="reg_email">
							</div>
							<div class="form-group">
								<label for="reg_password">Password:</label>
								<input type="password" class="form-control" id="reg_password" placeholder="New password" name="reg_password">
							</div>

							<div class="form-group">
								<label for="reg_password">Who are you :</label>
								<input type="radio" id="reg_role" value="1" name="reg_role" checked="checked"> Doctor
								<input type="radio" id="reg_role" value="2" name="reg_role"> Patient
							</div>
							<button type="submit" class="btn btn-default">Register</button>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="cd-overlay"></div>


{{ Html::script("assets/plugins/jquery/jquery-2.1.4.min.js") }}
{{ Html::script("assets/plugins/jquery-ui/jquery-ui.min.js") }}
{{ Html::script("assets/plugins/jquery-blockui/jquery.blockui.js") }}
{{ Html::script("assets/plugins/bootstrap/js/bootstrap.min.js") }}
{{ Html::script("assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js") }}
{{ Html::script("assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js") }}
{{ Html::script("js/sweetalert2.min.js") }}
{{ Html::script("js/custom.js") }}
{{ Html::script("js/select2.min.js") }}
<script>
	$( function() {
		$('#pac-input').attr('placeholder','Enter Location');
		$('.select2').select2();
		$('.timepicker').timepicker();
		$('.multi_select2').select2();
		$( ".datepicker" ).datepicker();
	} );
</script>
<script>
	$('#changePassword').on('click',function(){
		var old_password = $('#old_password').val();
		var new_password = $('#new_password').val();
		var confirm_password = $('#confirm_password').val();
		if(old_password == ""){
			swal('Oops',"Old Password Required",'error');  
		}else if(new_password == ""){
			swal('Oops',"New Password Required",'error');  
		}else if(confirm_password == ""){
			swal('Oops',"Confirm Password Required",'error');  
		}else if(confirm_password !== new_password){
			swal('Oops',"Confirm Password & New Password Not Matched ",'error');  
		}else{
			$.ajaxSetup({
				headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
			});
			var url  = "{{URL('/change-password')}}";
			$.ajax({
				url: url,
				type: 'POST',
				data: {'old_password':old_password,'new_password':new_password},
				success: function (data) {
					console.log(data);
					if(data.flag){
						$('#changePassModal').modal('toggle');
						swal('Success','Password Changed Successfully','success'); 
					}else{
						$('#changePassModal').modal('toggle');
						swal('Oops',data.error,'error');  
					}
				}
			});
		}

	});

	function initAutocomplete() {
		var map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -33.8688, lng: 151.2195},
			zoom: 13,
			mapTypeId: 'roadmap'
		});

		var input = document.getElementById('pac-input');
		var input2 = document.getElementById('pac-input2');
		var searchBox = new google.maps.places.SearchBox(input);
		var searchBox2 = new google.maps.places.SearchBox(input2);
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input2);

		map.addListener('bounds_changed', function() {
			searchBox.setBounds(map.getBounds());
		});

		var markers = [];
		searchBox.addListener('places_changed', function() {
			var places = searchBox.getPlaces();

			if (places.length == 0) {
				return;
			}

			markers.forEach(function(marker) {
				marker.setMap(null);
			});
			markers = [];

			var bounds = new google.maps.LatLngBounds();
			places.forEach(function(place) {
				if (!place.geometry) {
					console.log("Returned place contains no geometry");
					return;
				}
				var icon = {
					url: place.icon,
					size: new google.maps.Size(71, 71),
					origin: new google.maps.Point(0, 0),
					anchor: new google.maps.Point(17, 34),
					scaledSize: new google.maps.Size(25, 25)
				};

				markers.push(new google.maps.Marker({
					map: map,
					icon: icon,
					title: place.name,
					position: place.geometry.location
				}));

				if (place.geometry.viewport) {
					bounds.union(place.geometry.viewport);
				} else {
					bounds.extend(place.geometry.location);
				}
			});
			map.fitBounds(bounds);
		});
	}


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHy1BcbxWG5gNfygIGP9DhwqpRUYBgkb0&libraries=places&callback=initAutocomplete"
async defer></script>
@yield('script')

<div class="footer">
	@include('includes.footer')
</div>
</body>
</html>
