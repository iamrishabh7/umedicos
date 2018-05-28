@extends('admin.layouts.app')
@section('content')
@section('title','Patients')
<style>
.table td, .table>tbody>tr>td
{
	
	vertical-align:  middle;
}
</style>

<div class="page-inner">
	<div class="page-title">
		<h3>Patients</h3>
		<div class="page-breadcrumb">
			<ol class="breadcrumb">
				<li><a href="{{URL('/admin/dashboard')}}">Home</a></li>
				<li class="active"><a href="{{URL('/admin/patients')}}">Patients</a></li>
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
						<h4 class="panel-title">Patients</h4>
					</div>

					<div class="panel-heading clearfix">
						
					</div>
					<div class="panel-body">
						<div class="table-responsive table-remove-padding">
							<table class="table" id="datatable">
								<thead>
									<tr>
										<th>#</th>
										<th>Photo</th>
										<th>Name</th>
										<th>Email</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($patients as $patient)
									<tr>
										<td>{{$patient->id}}</td>
										<td><img src="/images/user_default.png" alt="" height="50" width="50" class="img-circle"></td>
										<td>{{$patient->name}}</td>
										<td>{{$patient->email}}</td>
										<td>
											@if($patient->is_active == 0)
											<a class="btn btn-danger" href="#">In Active</a>
											@else
											<a class="btn btn-primary" href="#">Active</a>
											@endif
										</td>
										<td>
											@if($patient->is_active == 0)
											<a class="btn btn-danger" href="{{URL('admin/patient/activate/'.$patient->id)}}">Activate</a>
											@else
											<a class="btn btn-danger" href="{{URL('admin/patient/deactivate/'.$patient->id)}}">De-activate</a>
											@endif
											<a class="btn btn-danger" href="{{URL('admin/patient/delete/'.$patient->id)}}">Delete</a>
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