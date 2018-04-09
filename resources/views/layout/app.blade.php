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
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	{{Html::style("css/style.css")}}
	{{Html::style("assets/plugins/bootstrap/css/bootstrap.min.css")}}
	{{Html::style("assets/plugins/fontawesome/css/font-awesome.css")}}
	{{Html::style("assets/plugins/bootstrap-datepicker/css/datepicker3.css")}}
	{{Html::style("assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css")}}
	{{Html::style("css/sweetalert2.min.css")}}
	{{Html::style("css/select2.min.css")}}
	{{Html::style("assets/plugins/datatables/css/jquery.datatables.min.css")}}
	@yield('style')

	<body>
		<nav class="navbar navbar-inverse "  role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Title</a>
				</div>

				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right">
						@if(\Auth::check())
						<li><a class="" data-toggle="modal" href="{{URL('/logout')}}">Logout</a></li>
						@else
						<li><a class="" data-toggle="modal" href='#loginModal'>Login</a></li>
						<li><a class="" data-toggle="modal" href='#registerModal'>Sign up</a></li>
						@endif

					</ul>
				</div>
			</div>
		</nav>
		@yield('content')

		<!-- change password Modal -->
		<div class="modal fade empList-modal-lg changePassModal" id="myModal-change" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

		<div class="cd-overlay"></div>


		{{ Html::script("assets/plugins/jquery/jquery-2.1.4.min.js") }}
		{{ Html::script("assets/plugins/jquery-ui/jquery-ui.min.js") }}
		{{ Html::script("assets/plugins/jquery-blockui/jquery.blockui.js") }}
		{{ Html::script("assets/plugins/bootstrap/js/bootstrap.min.js") }}
		{{ Html::script("assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js") }}
		{{ Html::script("js/sweetalert2.min.js") }}
		{{ Html::script("js/custom.js") }}
		{{ Html::script("js/select2.min.js") }}
		<script>
			$( function() {
				$('.select2').select2();
				$('.multi_select2').select2();
				$( ".datepicker" ).datepicker();
				$( "#datatable" ).DataTable({
					"order": [[ 0, "desc" ]]
				});
			} );
		</script>
		<script>
			$('#changePassword').on('click',function(){
				var old_password = $('#old_password').val();
				var new_password = $('#new_password').val();
				var confirm_password = $('#confirm_password').val();
				if(old_password == ""){
					swal('Oops',"Old Password Required",'warning');  
				}else if(new_password == ""){
					swal('Oops',"New Password Required",'warning');  
				}else if(confirm_password == ""){
					swal('Oops',"Confirm Password Required",'warning');  
				}else if(confirm_password !== new_password){
					swal('Oops',"Confirm Password & New Password Not Matched ",'warning');  
				}else{
					$.ajaxSetup({
						headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
					});
					var url  = "{{URL('/postChangePassword')}}";
					$.ajax({
						url: url,
						type: 'POST',
						data: {'old_password':old_password,'new_password':new_password},
						success: function (data) {
							console.log(data);
							if(data.flag){
								$('.changePassModal').modal('toggle');
								swal('Success','Password Changed Successfully','success'); 
							}else{
								$('.changePassModal').modal('toggle');
								swal('Oops',data.error,'warning');  
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
	</body>
	</html>
