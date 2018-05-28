@extends('admin.layouts.app')
@section('content')
@section('title','Profile')
<style>
.form-group {
	margin-right: 13px !important;
}
.per-bor {
	border-bottom: 2px solid;
}

.per-bor label {
	font-size: 20px;
	padding: 4px 0px 10px 0px;
}

#profile-page label {
	font-size: 16px;
	font-weight: 800;
}

#profile-page p {
	font-size:  15px;
}
</style>
<div class="page-inner">
	<div class="profile-cover">
		<div class="row">
			<div class="col-md-3 profile-image">
				<div class="profile-image-container">
					<img src="{{is_null($user->doctor->profile_pic) ? '/images/user-default.png':$user->doctor->profile_pic}}" alt="">
					
				</div>

			</div>

		</div>
	</div>
	<div id="main-wrapper">
		<div class="row">

		</div>

	</div>
	<!-- <div class="page-footer">
		<p class="no-s">{{date('Y')}} &copy; Coding Brains Software Solution Pvt Ltd.</p>
	</div> -->
</div><!-- Page Inner -->
@section('script')
@endsection
@endsection