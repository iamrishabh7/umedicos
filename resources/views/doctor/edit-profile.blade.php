@extends('layout.app')
@section('content')
@section('title','Edit Profile')

<div class="container bootstrap snippets">
	<div class="row" style="margin-top: 50px;">
		<div class="col-xs-12 col-sm-8  col-sm-offset-2">
			<form class="form-horizontal" action="" method="post" id="doctorEditForm" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">User info</h4>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10">
								<input type="text" value="{{$user->name}}" placeholder="Name" name="name" class="form-control" id="name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" value="{{$user->email}}" readonly="readonly" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Spacialization</label>
							<div class="col-sm-10">
								<select name="spacialization[]" id="spacialization" class="form-control multi_select2" multiple="multiple">
									@foreach($specializations as $specialization)
									<option value="{{$specialization->id}}" {{in_array($specialization->id,$doc_specialization) ? "selected":""}}>{{$specialization->name}}</option>
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
							<label class="col-sm-2 control-label">Address 1 Operational Days</label>
							<div class="col-sm-10">
								<?php $operational_days1 = explode(',',$user->doctor->operational_days1); 
								?>
								<select name="operational_days1[]" id="operational_days1" class="form-control multi_select2" multiple="multiple">
									<option value="Monday" {{in_array('Monday',$operational_days1) ? "selected":""}}>Monday</option>
									<option value="Tuesday" {{in_array('Tuesday',$operational_days1) ? "selected":""}}>Tuesday</option>
									<option value="Wednesday" {{in_array('Wednesday',$operational_days1) ? "selected":""}}>Wednesday</option>
									<option value="Thusrday" {{in_array('Thusrday',$operational_days1) ? "selected":""}}>Thusrday</option>
									<option value="Friday" {{in_array('Friday',$operational_days1) ? "selected":""}}>Friday</option>
									<option value="Saturday" {{in_array('Saturday',$operational_days1) ? "selected":""}}>Saturday</option>
									<option value="Sunday" {{in_array('Sunday',$operational_days1) ? "selected":""}}>Sunday</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Address 2 </label>
							<div class="col-sm-10">
								<input type="text" id="pac-input2" name="address2" class="form-control" value="{{$user->doctor->address2}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Address 2 Operational Days</label>
							<div class="col-sm-10">
								<?php $operational_days2 = explode(',',$user->doctor->operational_days2); 
								?>
								<select name="operational_days2[]" id="operational_days2" class="form-control multi_select2" multiple="multiple">
									<option value="Monday" {{in_array('Monday',$operational_days2) ? "selected":""}}>Monday</option>
									<option value="Tuesday" {{in_array('Tuesday',$operational_days2) ? "selected":""}}>Tuesday</option>
									<option value="Wednesday" {{in_array('Wednesday',$operational_days2) ? "selected":""}}>Wednesday</option>
									<option value="Thusrday" {{in_array('Thusrday',$operational_days2) ? "selected":""}}>Thusrday</option>
									<option value="Friday" {{in_array('Friday',$operational_days2) ? "selected":""}}>Friday</option>
									<option value="Saturday" {{in_array('Saturday',$operational_days2) ? "selected":""}}>Saturday</option>
									<option value="Sunday" {{in_array('Sunday',$operational_days2) ? "selected":""}}>Sunday</option>
								</select>
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