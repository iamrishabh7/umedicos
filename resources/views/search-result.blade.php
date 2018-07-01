@extends('layout.app')
@section('content')
@section('title','Profile')
<style>
body {position: relative;}

.profile-list img {
	width: 145px;
	height: 145px;
	object-fit: cover;
}

@media(min-width: 320px) and (max-width:768px)
{
	.navbar-inverse .navbar-collapse{

		z-index:1;
		position: relative;
	}
}


.dee {padding-bottom:100px; padding-top: 50px; min-height: 767px;}

.btn-primary11 {
	color: #fff;
	background-color: #f5f5f5;
	border-color: #09aaf3;
	margin: 60px 5px;
	text-align: center;
	vertical-align: middle;
	font-size: 15px;
	color: #09aaf4 !important;
	float: right;
	border-radius: 25px;
}
span.book_avlbl {text-transform:  capitalize;}
.book_title {text-transform:capitalize;}
</style>

<div class="container dee">
	<div class="row">
		@if(count($doctors) > 0)
		@foreach($doctors as $doctor)
		<div class="col-md-10 profile-list">
			<div class="col-md-2 book_img pull-left">
				<a href="#">
					<img src="{{$doctor->profile_pic}}"  class="img-responsive"/></a>
				</div>

				<div class="col-md-6 book_content pull-left">
					<h3 class="book_title">
						<a href="#">{{$doctor->user->name}}</a>
					</h3>
					<p><span class="book_avlbl">Qualification : {{$doctor->qualification}}</span></p>
					<p><span class="book_avlbl">Spacializations : 
						@foreach($doctor->spacialization as $doctor_specialization)
						<span >
							{{getSpecializationById($doctor_specialization->specialization_id)->name}}
						</span>
						@endforeach
					</span></p>
				</div>

				<div class="col-md-3 pull-right view-proffile">
					<p>
						<a href="https://www.google.com/maps/dir/?api=1&origin=my location&destination=={{urlencode($doctor->address1)}}" target="_blank" class="btn btn-primary11" style="color: white;">View on Map</a>
						<a href="{{URL('/doctorID/'.$doctor->doctor_id)}}" class="btn btn-primary11" style="color: white;">View profile</a>
					</p>

				</div>
				<!-- </div> -->
			</div>

			@endforeach
			@else
			<div class="col-md-12">
				<div class="no-result">
					<h1></h1>
					<p>No Doctors Found</p>
					<a href="{{URL('/')}}">Go to Home</a>
				</div>
			</div>
			@endif
		</div>
	</div>

	<div class="modal fade" id="mapModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">

					<iframe src="" frameborder="0" id="mapIframe"></iframe>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	@section('script')
	<script>
		function showMap(url) {
			$('#mapIframe').attr('src','https://www.google.com/maps/dir/?api=1&origin=my location&destination='+url);
			$('#mapModal').modal('toggle');
		}
	</script>
	@endsection
	@endsection