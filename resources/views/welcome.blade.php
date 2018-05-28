@extends('layout.app')
@section('content')
@section('title','Profile')
<style>

body
{
	background-image: url(http://www.snhiswaziland.com/images/doctor.jpg) !important;
 background-position: center; background-repeat: no-repeat !important;
 
}

#searchResult {
  list-style-type: none;
  padding: 0;
  margin: 0;
  /*overflow: hidden;*/
  overflow: scroll;
  max-height: 200px;

}

#searchResult li a {
  border: 1px solid #ddd; 
  margin-top: -1px; 
  background-color: #ffffff; 
  padding: 12px; 
  text-align: left; 
  font-size: 18px; 
  color: #0095ff !important; 
  display: block; 
}

#searchResult li a:hover:not(.header) {
  background-color: #eee;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<div class="conatiner hero-image">
  <div class="md-center-content">
    <h1 class="md-color-white text-center">Your home for health</h1>
    <h4 class="md-color-white text-center">Find and Book</h4>

    <form action="{{URL('search')}}" id="searchDoctorForm">
      {{csrf_field()}}
      <div class="md-search-bar">
        <span class="glyphicon glyphicon-map-marker"></span>
        <input type="text" type="text" id="pac-input" name="address" class="form-control" />
        <div class="md-auto-detect" title="Detect"><span onClick="locate()" class="glyphicon glyphicon-screenshot"></span></div>
      </div>
      <div class="md-select-div">
        <input type="hidden" id="type_id">
        <input type="text" onfocus="showList()" onkeyup="search()" id="searchInput" placeholder="Enter a query" autocomplete="off">
        <ul id="searchResult" style="display: none;">
         @foreach($specializations as $specialization)
         <li onClick="getValue('specialization','{{ucfirst($specialization->name)}}',{{$specialization->id}})"><a href="#"><img src="{{URL('/images/searchicon.png')}}" alt="" >{{ucfirst($specialization->name)}}</a>
         </li>
         @endforeach
         @foreach($doctors as $doctor)
         <li onClick="getValue('doctor','{{ucfirst($doctor->name)}}',{{$doctor->id}})"><a href="{{URL('/doctorID/'.$doctor->id)}}"><img src="{{URL($doctor->doctor->profile_pic)}}" alt="" height="30" width="30" >{{ucfirst($doctor->name)}}</a>
         </li>
         @endforeach
       </div>
       <div class="md-search-btn"> <input type="submit" title="Search" name="" class="form-control" value="Search" /> <span class="glyphicon glyphicon-search"></span></div>

     </form>
   </div>

 </div>

 <div id="map" style="display: none;"></div>




 <script>

  function locate(){
    if ("geolocation" in navigator){
      navigator.geolocation.getCurrentPosition(function(position){ 
        var currentLatitude = position.coords.latitude;
        var currentLongitude = position.coords.longitude;
        var geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(currentLatitude, currentLongitude);
        geocoder.geocode({'latLng': latlng}, function(results, status) {
          if(status == google.maps.GeocoderStatus.OK) {
            document.getElementById('pac-input').value = results[0]['formatted_address'];
          };
        });
      });
    }
  }



</script>

@endsection
