	@extends('layout.app')
	@section('content')
	@section('title','Profile')
	<style>
	.profile 
	{
		min-height: 355px;
		display: inline-block;
	}
	.divider 
	{
		border-top:1px solid rgba(0,0,0,0.1);
	}
	.emphasis 
	{
		border-top: 4px solid transparent;
	}
	.emphasis:hover 
	{
		border-top: 4px solid #1abc9c;
	}
	.emphasis h2
	{
		margin-bottom:0;
	}
	
	.dropdown-menu 
	{
		background-color: #34495e;    
		box-shadow: none;
		-webkit-box-shadow: none;
		width: 250px;
		margin-left: -125px;
		left: 50%;
	}
	.dropdown-menu .divider 
	{
		background:none;    
	}
	.dropdown-menu>li>a
	{
		color:#f5f5f5;
	}
	.dropup .dropdown-menu 
	{
		margin-bottom:10px;
	}
	.dropup .dropdown-menu:before 
	{
		content: "";
		border-top: 10px solid #34495e;
		border-right: 10px solid transparent;
		border-left: 10px solid transparent;
		position: absolute;
		bottom: -10px;
		left: 50%;
		margin-left: -10px;
		z-index: 10;
	}
</style>

<div class="row">
	<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
		<div class="well profile">
			@if($user->is_mobile_verified == 0)
			<div id="alertDiv">
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong><a data-toggle="modal" href='#verifyMobileModal'>Verify Mobile number</a></strong> To get you your free coupon Codes.
				</div>
			</div>
			@endif
			<div class="col-sm-12">
				<div class="col-xs-12 col-sm-8">
					<h2>{{$user->name}}</h2>
					<p><strong>Mobile: </strong> {{$user->patient->primary_contact}} </p>
					<p><strong>Email: </strong> {{$user->email}}</p>
					<p><strong>Coupon Codes: </strong>
						<ul class="list-group">
							@foreach($user->redeem_codes as $redeem_code)
							<li class="list-group-item">{{$redeem_code->code}} <span class="pull-right label label-{{ $redeem_code->is_used == "1" ? "warning":"success" }}">{{ $redeem_code->is_used == "1" ? "Used":"Free" }}</span></li>
							@endforeach
						</ul>
					</p>
				</div>             
				<div class="col-xs-12 col-sm-4 text-center">
					<figure>
						<img src="{{URL('/images/user_default.png')}}" alt="" class="img-circle img-responsive">
					</figure>
				</div>
			</div>            
			<div class="col-xs-12 divider text-center">
				<div class="col-xs-12 col-sm-6 emphasis">
					<a href="{{URL('/')}}" class="btn btn-success btn-block"><span class="fa fa-search"></span>Seach Doctor</a>
				</div>
				<div class="col-xs-12 col-sm-6 emphasis">
					<a class="btn btn-info btn-block" href="{{URL('patient/profile/edit')}}"><span class="fa fa-user"></span> Edit Profile </a>
				</div>
				
			</div>
		</div>             


		<div class="modal fade" id="verifyMobileModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Mobile Number Verification</h4>
					</div>
					<div class="modal-body">
						<div id="otpSentDiv" style="display: none;">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>OTP has been Sent to Your Mobile Number</strong>
							</div>
						</div>
						<form action="{{URL('/send-otp')}}" method="POST" class="form-inline" role="form" id="sendOtpForm">
							{{csrf_field()}}
							<div class="form-group">
								<label class="sr-only" for="">label</label>
								<input type="text" value="{{$user->patient->primary_contact}}" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number">
							</div>
							<button type="submit" class="btn btn-primary">Send OTP</button>
						</form>

						<form action="{{URL('/verify-otp')}}" method="POST" class="form-inline" role="form" id="verifyOtpForm" style="display: none;"> 
							{{csrf_field()}}
							<div class="form-group">
								<label class="sr-only" for="">OTP</label>
								<input type="text" class="form-control" id="otp" name="otp" placeholder="OTP">
							</div>
							<button type="submit" class="btn btn-primary">Verify</button>
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>    

		@endsection
