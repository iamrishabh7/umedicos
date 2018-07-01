@extends('admin.layouts.app')
@section('content')
@section('title','Doctors')
<style>
.table td, .table>tbody>tr>td
{
	
	vertical-align:  middle;
}
</style>

<div class="page-inner">
	<div class="page-title">
		<h3>doctors</h3>
		<div class="page-breadcrumb">
			<ol class="breadcrumb">
				<li><a href="{{URL('/admin/dashboard')}}">Home</a></li>
				<li class="active"><a href="{{URL('/admin/doctors')}}">Doctors</a></li>
			</ol>
		</div>
	</div>
	<div id="main-wrapper">
		<div class="row">
			<div class="col-md-12">
				@if (session('success'))
				<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					{{ session('success') }}
				</div>
				@endif
				@if (session('error'))
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					{{ session('error') }}
				</div>
				@endif

				<div class="panel panel-white">
					<div class="panel-heading clearfix">
						<h4 class="panel-title">Doctors</h4>
					</div>

					<div class="panel-heading clearfix">
						<a href="{{URL('/admin/export/doctor-sheet')}}" class="btn btn-danger pull-right" style="margin-top: -16px;margin-right: 10px;">Export Doctors</a>
					</div>
					<div class="panel-body">
						<div class="table-responsive table-remove-padding">
							<table class="table" id="datatable">
								<thead>
									<tr>
										<th>#</th>
										<th>Photo</th>
										<th>Doctor ID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Role</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($doctors as $doctor)
									<tr>
										<td>{{$doctor->id}}</td>
										<td><img src="{{is_null($doctor->cb_profile->doctor_pic) ? 'assets/images/profile-picture.png':$doctor->cb_profile->doctor_pic}}" alt="" height="50" width="50" class="img-circle"></td>
										<td><b>{{$doctor->cb_profile->doctor_id}}</b></td>
										<td>{{$doctor->first_name}} {{$doctor->last_name}}</td>
										<td>{{$doctor->email}}</td>
										<td>{{getRoleById($doctor->role)}}</td>
										<td>
											<a class="btn btn-primary" href="{{URL('admin/doctor/profile/'.$doctor->id)}}">View</a>
											<a class="btn btn-primary" href="{{URL('admin/doctor/'.$doctor->id)}}">Edit</a></td>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!-- Row -->
	</div><!-- Main Wrapper -->

	
	<!-- <div class="page-footer">
		<p class="no-s">{{date('Y')}} &copy; Coding Brains Software Solution Pvt Ltd.</p>
	</div> -->
</div><!-- Page Inner -->
@section('script')
<script>
	
</script>
@endsection
@endsection