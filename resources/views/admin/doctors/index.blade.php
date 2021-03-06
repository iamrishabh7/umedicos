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
		<h3>Doctors</h3>
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
						<a href="#">Total Doctors <span class="badge">{{count($doctors)}}</span></a><br>
					</div>
					<div class="panel-body">
						<div class="table-responsive table-remove-padding">
							<table class="table" id="datatable">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Photo</th>
										<th>Name</th>
										<th>Email</th>
										<th># Reedemed Codes</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									@foreach($doctors as $doctor)
									<tr>
										<td>{{$i}}</td>
										<td><img src="{{is_null($doctor->doctor->profile_pic) ? '/images/user_default.png':$doctor->doctor->profile_pic}}" alt="" height="50" width="50" class="img-circle"></td>
										<td>{{$doctor->name}}</td>
										<td>{{$doctor->email}}</td>
										<td>{{count(couponUsedByDoctor($doctor->id))}}</td>
										<td>
											@if($doctor->is_active == 0)
											<a class="btn btn-danger" href="#">In Active</a>
											@else
											<a class="btn btn-primary" href="#">Active</a>
											@endif
										</td>
										<td>
											@if($doctor->is_active == 0)
											<a class="btn btn-danger" href="{{URL('admin/doctor/activate/'.$doctor->id)}}">Activate</a>
											@else
											<a class="btn btn-primary" href="{{URL('admin/doctor/deactivate/'.$doctor->id)}}">De-activate</a>
											@endif
											<a class="btn btn-primary" href="{{URL('admin/doctor/profile/'.$doctor->id)}}">View</a>
											<a class="btn btn-danger" href="{{URL('admin/doctor/delete/'.$doctor->id)}}">Delete</a>
										</td>
									</tr>
									<?php $i++ ; ?>
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