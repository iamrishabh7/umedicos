@extends('admin.layouts.app')
@section('content')
@section('title','Dashboard')


<div class="page-inner">
	<div class="page-title">
		<h3>Dashboard</h3>
		<div class="page-breadcrumb">
			<ol class="breadcrumb">
				<li><a href="{{URL('/admin/dashboard')}}">Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
	</div>
	<div id="main-wrapper">
		<div class="row" id="dashboard">
			<div class="col-lg-3 col-md-6">
				<a href="{{URL('/admin/doctors?type=active')}}" title="" class="weight-hover">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-icon">
								<i class="icon-users"></i>
							</div>
							<div class="info-box-stats">
								<span class="info-box-title">Active Doctors</span>
							</div>

						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-3 col-md-6">
				<a href="{{URL('/admin/doctors?type=inactive')}}" title="" class="weight-hover">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-icon">
								<i class="icon-users"></i>
							</div>
							<div class="info-box-stats">
								<span class="info-box-title">In-Active Doctors</span>
							</div>

						</div>
					</div>
				</a>
			</div>


			<div class="col-lg-3 col-md-6">
				<a href="{{URL('/admin/patients?type=active')}}" title="" class="weight-hover">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-icon">
								<i class="icon-users"></i>
							</div>
							<div class="info-box-stats">
								<span class="info-box-title">Active Patients</span>
							</div>

						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-3 col-md-6">
				<a href="{{URL('/admin/patients?type=inactive')}}" title="" class="weight-hover">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-icon">
								<i class="icon-users"></i>
							</div>
							<div class="info-box-stats">
								<span class="info-box-title">In-Active Patients</span>
							</div>

						</div>
					</div>
				</a>
			</div>


			<div class="col-lg-3 col-md-6">
				<a href="#" data-toggle="modal" data-target="#myModal-change" title="" class="weight-hover">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-icon">
								<i class="icon-pencil"></i>
							</div>

							<div class="info-box-stats">

								<span class="info-box-title">Change password</span>
							</div>



						</div>
					</div>
				</a>
			</div>


			<!--add new div --->
			
		</div><!-- Row -->
	</div>
	<!-- <div class="page-footer">
		<p class="no-s">{{date('Y')}} &copy; Coding Brains Software Solution Pvt Ltd.</p>
	</div> -->
</div><!-- Page Inner -->
@section('script')

{{ Html::script("assets/plugins/waypoints/jquery.waypoints.min.js") }}
{{ Html::script("assets/plugins/jquery-counterup/jquery.counterup.min.js") }}
{{ Html::script("assets/plugins/toastr/toastr.min.js") }}
{{ Html::script("assets/plugins/flot/jquery.flot.min.js") }}
{{ Html::script("assets/plugins/flot/jquery.flot.time.min.js") }}
{{ Html::script("assets/plugins/flot/jquery.flot.symbol.min.js") }}
{{ Html::script("assets/plugins/flot/jquery.flot.resize.min.js") }}
{{ Html::script("assets/plugins/flot/jquery.flot.tooltip.min.js") }}
{{ Html::script("assets/plugins/curvedlines/curvedLines.js") }}
{{ Html::script("assets/plugins/metrojs/MetroJs.min.js") }}
{{ Html::script("assets/js/pages/dashboard.js") }}
@endsection
@endsection
