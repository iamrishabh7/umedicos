@extends('layout.app')
@section('content')
@section('title','Edit Profile')

<style type="text/css">
	@media (max-width: 1024px)
	{
		body {position: relative;}
	}
</style>
<div class="container">
<div class="row">
	<div class="col-md-6 col-md-offset-3 edit-profile">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Edit Profile</h3>
			</div>
			<div class="panel-body form-bg">
				@if (session('success'))
				<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					{{ session('success') }}
				</div>
				@endif
				<form action="{{URL('/patient/profile/update')}}" method="post" class="form-horizontal" id="commentForm" role="form">
					{{csrf_field()}}
					<input type="hidden" name="id" value="{{$user->id}}">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
							@if ($errors->has('name'))
							<span class="label label-danger">{{ $errors->first('name') }}</span>
							@endif
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="email" id="email" readonly="readonly"  value="{{$user->email}}">
						</div>
					</div>  
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Mobile</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="mobile" id="mobile" readonly="readonly"  value="{{$user->patient->primary_contact}}">
						</div>
					</div>  

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">                    
							<button class="btn btn-primary btn-circle text-uppercase" type="submit" id="submit">Save</button>
						</div>
					</div>            
				</form>
			</div>
		</div>
	</div>
</div>
</div>
@endsection