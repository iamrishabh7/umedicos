@extends('layout.app')
@section('content')
@section('title','Edit Profile')

<div class="container bootstrap snippets">
	<div class="row" style="margin-top: 50px;">
		<div class="col-xs-12 col-sm-6  col-sm-offset-3">
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">User info</h4>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10">
								<input type="text" value="{{$user->name}}" placeholder="Name" name="name" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" value="{{$user->email}}" readonly="readonly">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Spacialization</label>
							<div class="col-sm-10">
								<select name="spacialization[]" id="spacialization" class="form-control multi_select2" multiple="multiple">
									@foreach($specializations as $specialization)
									<option value="{{$specialization->id}}">{{$specialization->name}}</option>
									<option value="2">csdc</option>
									@endforeach
								</select>	
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Profile image</label>
							<div class="col-sm-10">
								<input type="file" name="profile_pic" id="profile_pic">
							</div>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">Clinic info</h4>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Primary number</label>
							<div class="col-sm-10">
								<input type="tel" name="primary_contact" value="{{$user->doctor->primary_contact}}" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Secondary number</label>
							<div class="col-sm-10">
								<input type="tel" name="secondary_contact" value="{{$user->doctor->secondary_contact}}" class="form-control">
							</div>	
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Address 1 </label>
							<div class="col-sm-10">
								<input type="text" id="pac-input" name="address1" class="form-control" value="{{$user->doctor->address1}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Clinic Photos</label>
							<div class="col-sm-10">
								<input type="file" id="clinic_images" name="clinic_images[]" class="form-control" multiple="multiple">
							</div>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>

			<div id="map" style="display: none;"></div>
		</div>
	</div>
	@endsection