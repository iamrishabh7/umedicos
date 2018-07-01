@extends('layout.app')
@section('content')
@section('title','Edit Profile')
<style type="text/css">
.footer
{
	position: relative;
}
a { color: #333 !important; }
.form-padding100 { padding-top: 50px; padding-bottom:50px;}
</style>
<section class="pro-marg">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-10  col-sm-offset-1">
				<div class="form-padding100">
					<form class="form-horizontal" action="" method="post" id="doctorEditForm" enctype="multipart/form-data">
						{{csrf_field()}}
						<input type="hidden" name="is_profile_completed" id="is_profile_completed" value="{{$user->is_profile_completed}}">
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
									<label class="col-sm-3">City</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" value="{{$user->doctor->city}}" placeholder="City" name="city" id="city">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3">Pincode</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" value="{{$user->doctor->pincode}}" placeholder="Pincode" name="pincode" id="pincode">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3">Qualification</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" value="{{$user->doctor->qualification}}" placeholder="Qualification" name="qualification" id="qualification">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3">Spacialization</label>
									<div class="col-sm-9">
										<input type="hidden" value="{{count($doc_specialization)}}" id="specialization_hidden">
										<select name="spacialization[]" id="spacialization" class="form-control multi_select2" multiple="multiple">
											@foreach($specializations as $specialization)
											<option value="{{$specialization->id}}" {{in_array($specialization->id,$doc_specialization) ? "selected":""}}>{{strtoupper($specialization->name)}}</option>
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
									<label class="col-sm-3">Consultation Fee</label>
									<div class="col-sm-9">
										<input type="text" name="consultation_fee" value="{{$user->doctor->consultation_fee}}" id="consultation_fee"  class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3">Registration Number</label>
									<div class="col-sm-9">
										<input type="text" name="registration_number" value="{{$doctor_clinic->registration_number}}" class="form-control">
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
									@if(count($operational_days1) > 0)
									<?php $i = 0; ?>
									@foreach($operational_days1 as $operational_day1)
									@if($i == 0)
									<span id="row_1_{{$operational_day1->id}}">
										<label class="col-sm-3">Address 1 Operational Days</label>
										@else
										<span id="row_1_{{$operational_day1->id}}">
											<label class="col-sm-3"></label>
											@endif
											<div class="col-sm-3">
												<select name="operational_days1[]" id="operational_days1" class="form-control"  required="">
													<option value="">--Select Day--</option>
													<option value="Monday" {{$operational_day1->day == "Monday" ? "selected":""}}>Monday</option>
													<option value="Tuesday" {{$operational_day1->day == "Tuesday" ? "selected":""}}>Tuesday</option>
													<option value="Wednesday" {{$operational_day1->day == "Wednesday" ? "selected":""}}>Wednesday</option>
													<option value="Thusrday" {{$operational_day1->day == "Thusrday" ? "selected":""}}>Thusrday</option>
													<option value="Friday" {{$operational_day1->day == "Friday" ? "selected":""}}>Friday</option>
													<option value="Saturday" {{$operational_day1->day == "Saturday" ? "selected":""}}>Saturday</option>
													<option value="Sunday" {{$operational_day1->day == "Sunday" ? "selected":""}}>Sunday</option>
												</select>
											</div>
											<div class="col-sm-2">
												<input type="time" name="address1_timing_from[]" value="{{$operational_day1->from_time}}" class="form-control" placeholder="time From"  required="">
											</div>	
											<div class="col-sm-2">
												<input type="time" name="address1_timing_to[]" value="{{$operational_day1->to_time}}" class="form-control" placeholder="time to"  required="">
											</div>
											@if($i == 0)
											<div class="col-sm-2">
												<a href="javascript:void(0)" onclick="addDay(1)" class="addDay"><i class="fa fa-plus "></i></a>
											</div>
											@else
											<div class="col-sm-2">
												<a href="javascript:void(0)" onclick="removeDay(1,{{$operational_day1->id}})" class="addDay"><i class="fa fa-trash "></i></a>
											</div>
											@endif
										</span>
										<?php $i++; ?>
										@endforeach
										@else
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

										@endif
									</div>


									<div class="form-group">
										<label class="col-sm-3">Address 2 </label>
										<div class="col-sm-9">
											<input type="text" id="pac-input2" name="address2" class="form-control" value="{{$user->doctor->address2}}">
										</div>
									</div>
									<div class="form-group" id="days2">
										@if(count($operational_days2) > 0)
										<?php $i = 0; ?>
										@foreach($operational_days2 as $operational_day2)
										@if($i == 0)
										<span id="row_2_{{$operational_day2->id}}">
											<label class="col-sm-3">Address 2 Operational Days</label>
											@else
											<span id="row_2_{{$operational_day2->id}}">
												<label class="col-sm-3"></label>
												@endif
												<div class="col-sm-3">
													<select name="operational_days2[]" id="operational_days2" class="form-control"  >
														<option value="">--Select Day--</option>
														<option value="Monday" {{$operational_day2->day == "Monday" ? "selected":""}}>Monday</option>
														<option value="Tuesday" {{$operational_day2->day == "Tuesday" ? "selected":""}}>Tuesday</option>
														<option value="Wednesday" {{$operational_day2->day == "Wednesday" ? "selected":""}}>Wednesday</option>
														<option value="Thusrday" {{$operational_day2->day == "Thusrday" ? "selected":""}}>Thusrday</option>
														<option value="Friday" {{$operational_day2->day == "Friday" ? "selected":""}}>Friday</option>
														<option value="Saturday" {{$operational_day2->day == "Saturday" ? "selected":""}}>Saturday</option>
														<option value="Sunday" {{$operational_day2->day == "Sunday" ? "selected":""}}>Sunday</option>
													</select>
												</div>
												<div class="col-sm-2">
													<input type="time" name="address2_timing_from[]" value="{{$operational_day2->from_time}}" class="form-control" placeholder="time From"  >
												</div>	
												<div class="col-sm-2">
													<input type="time" name="address2_timing_to[]" value="{{$operational_day2->to_time}}" class="form-control" placeholder="time to"  >
												</div>
												@if($i == 0)
												<div class="col-sm-2">
													<a href="javascript:void(0)" onclick="addDay(2)" class="addDay"><i class="fa fa-plus "></i></a>
												</div>
												@else
												<div class="col-sm-2">
													<a href="javascript:void(0)" onclick="removeDay(2,{{$operational_day2->id}})" class="addDay"><i class="fa fa-trash "></i></a>
												</div>
												@endif
											</span>
											<?php $i++; ?>
											@endforeach
											@else
											<label class="col-sm-3">Address 2 Operational Days</label>
											<div class="col-sm-3">
												<select name="operational_days2[]" id="operational_days2" class="form-control" >
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
												<input type="time" name="address2_timing_from[]" class="form-control" placeholder="time From" >
											</div>	
											<div class="col-sm-2">
												<input type="time" name="address2_timing_to[]" class="form-control" placeholder="time to" >
											</div>
											<div class="col-sm-2">
												<a href="javascript:void(0)" onclick="addDay(2)" class="addDay"><i class="fa fa-plus fa-2x"></i></a>
											</div>

											@endif
										</div>
										<div class="form-group">
											<label class="col-sm-3">Clinic Photos</label>
											<div class="col-sm-9">
												<input type="file" id="clinic_images" name="clinic_images[]" class="form-control" multiple="multiple">
												<input type="hidden" value="{{count($clinic_images)}}" id="clinic_images_hidden">
												@if(count($clinic_images) > 0)
												@foreach($clinic_images as $clinic_image)
												<img src="{{$clinic_image->image}}" alt="" height="50" width="100" id="image_{{$clinic_image->id}}">
												<a href="javascript:void(0)" onclick="removeClinicImage('{{URL("/")}}',{{$clinic_image->id}})"><i class="fa fa-trash "></i></a>
												@endforeach
												@endif
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<button type="submit" class="btn btn-primary btn1001">Submit</button>
								</div>
							</form>
						</div>

						<div id="map" style="display: none;"></div>
					</div>
				</div>
			</div>
		</section>
		@endsection