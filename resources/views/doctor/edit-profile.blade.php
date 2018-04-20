@extends('layout.app')
@section('content')
@section('title','Edit Profile')
<style type="text/css">
body
{
	position: relative;
}
a { color: #333 !important; }
</style>

<div class="container">
	<div class="row" style="margin-top: 50px; margin-bottom: 50px;">
		<div class="col-xs-12 col-sm-10  col-sm-offset-1">
			<form class="form-horizontal" action="" method="post" id="doctorEditForm" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">User info</h4>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-sm-3">Name</label>
							<div class="col-sm-9">
								<input type="text" value="{{$user->name}}" placeholder="Name" name="name" class="form-control" id="name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3">Email</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" value="{{$user->email}}" readonly="readonly" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3">Spacialization</label>
							<div class="col-sm-9">
								<input type="hidden" value="{{count($doc_specialization)}}" id="specialization_hidden">
								<select name="spacialization[]" id="spacialization" class="form-control multi_select2" multiple="multiple">
									@foreach($specializations as $specialization)
									<option value="{{$specialization->id}}" {{in_array($specialization->id,$doc_specialization) ? "selected":""}}>{{$specialization->name}}</option>
									@endforeach
								</select>	
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3">Profile image</label>
							<div class="col-sm-9">
								<input type="file" name="profile_pic" id="profile_pic">
								@if($user->doctor->profile_pic != "")
								<img src="{{$user->doctor->profile_pic}}" alt="" height="100" width="100">
								@endif
								<input type="hidden"  id="profile_pic_hidden" value="{{$user->doctor->profile_pic}}">
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
							<label class="col-sm-3">Clinic Name</label>
							<div class="col-sm-9">
								<input type="tel" name="clinic_name" value="{{$user->doctor->clinic_name}}" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3">Primary number</label>
							<div class="col-sm-9">
								<input type="tel" name="primary_contact" value="{{$user->doctor->primary_contact}}" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3">Secondary number</label>
							<div class="col-sm-9">
								<input type="tel" name="secondary_contact" value="{{$user->doctor->secondary_contact}}" class="form-control">
							</div>	
						</div>
						<div class="form-group">
							<label class="col-sm-3">Address 1 </label>
							<div class="col-sm-9">
								<input type="text" id="pac-input" name="address1" class="form-control" value="{{$user->doctor->address1}}">
							</div>
						</div>	
						<div class="form-group" id="days1">
							<label class="col-sm-3">Address 1 Operational Days</label>
							<div class="col-sm-3">
								<select name="operational_days1[]" id="operational_days1" class="form-control"  required="">
									<option value="">--Select Day--</option>
									<option value="Monday">Monday</option>
									<option value="Tuesday">Tuesday</option>
									<option value="Wednesday">Wednesday</option>
									<option value="Thusrday">Thusrday</option>
									<option value="Friday">Friday</option>
									<option value="Saturday">Saturday</option>
									<option value="Sunday">Sunday</option>
								</select>
							</div>
							<div class="col-sm-2">
								<input type="time" name="address1_timing_from[]" class="form-control" placeholder="time From"  required="">
							</div>	
							<div class="col-sm-2">
								<input type="time" name="address1_timing_to[]" class="form-control" placeholder="time to"  required="">
							</div>
							<div class="col-sm-2">
								<a href="javascript:void(0)" onclick="addDay(1)" class="addDay"><i class="fa fa-plus fa-2x"></i></a>
							</div>
							<!-- @if(count($operational_days1) > 1)
							@foreach($operational_days1 as $operational_day1)
							{{$operational_day1->day}}
							{{$operational_day1->from_time}}
							{{$operational_day1->to_time}}
							@endforeach
							@endif -->
						</div>


						<div class="form-group">
							<label class="col-sm-3">Address 2 </label>
							<div class="col-sm-9">
								<input type="text" id="pac-input2" name="address2" class="form-control" value="{{$user->doctor->address2}}">
							</div>
						</div>
						<div class="form-group" id="days2">
							<label class="col-sm-3">Address 2 Operational Days</label>
							<div class="col-sm-3">
								<select name="operational_days2[]" id="operational_days2" class="form-control">
									<option value="">--Select Day--</option>
									<option value="Monday">Monday</option>
									<option value="Tuesday">Tuesday</option>
									<option value="Wednesday">Wednesday</option>
									<option value="Thusrday">Thusrday</option>
									<option value="Friday">Friday</option>
									<option value="Saturday">Saturday</option>
									<option value="Sunday">Sunday</option>
								</select>
							</div>
							<div class="col-sm-2">
								<input type="time" name="address2_timing_from[]" value="" class="form-control" placeholder="time From" >
							</div>	
							<div class="col-sm-2">
								<input type="time" name="address2_timing_to[]"  value="" class="form-control" placeholder="time to" >
							</div>
							<div class="col-sm-2">
								<a href="javascript:void(0)" onclick="addDay(2)" class="addDay"><i class="fa fa-plus fa-2x"></i></a>
							</div>
<!-- 
							@if(count($operational_days2) > 1)
							@foreach($operational_days2 as $operational_day2)
							{{$operational_day2->day}}
							{{$operational_day2->from_time}}
							{{$operational_day2->to_time}}
							@endforeach
							@endif -->
						</div>
						<div class="form-group">
							<label class="col-sm-3">Clinic Photos</label>
							<div class="col-sm-9">
								<input type="file" id="clinic_images" name="clinic_images[]" class="form-control" multiple="multiple">
								<input type="hidden" value="{{count($clinic_images)}}" id="clinic_images_hidden">
								@if(count($clinic_images) > 0)
								@foreach($clinic_images as $clinic_image)
								<img src="{{$clinic_image->image}}" alt="" height="50" width="100">
								@endforeach
								@endif
							</div>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>

			<div id="map" style="display: none;"></div>
		</div>
	</div>
</div>
@endsection