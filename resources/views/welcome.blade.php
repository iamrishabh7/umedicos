@extends('layout.app')
@section('content')
@section('title','Profile')


<div class="search">
  <i onClick="locate()"> </i>
  <div class="s-bar">
    <form action="{{URL('search')}}" id="searchDoctorForm">
      {{csrf_field()}}
      <input type="text" id="pac-input" name="address">
      <input type="submit"  value="Search"/>
    </form>
  </div>
  <div id="map" style="display: none;"></div>
</div>


<!-- Login / Register Modal-->
<div class="modal fade login-register-form" role="dialog" id="loginModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span class="glyphicon glyphicon-remove"></span>
        </button>
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#login-form"> Login <span class="glyphicon glyphicon-user"></span></a></li>
          <li><a data-toggle="tab" href="#registration-form"> Register <span class="glyphicon glyphicon-pencil"></span></a></li>
        </ul>
      </div>
      <div class="modal-body">
        <div class="tab-content">
          <div id="login-form" class="tab-pane fade in active">
            <form action="{{URL('/login')}}"  id="loginForm">
              {{csrf_field()}}
              <div class="form-group">
                <label for="login_email">Email:</label>
                <input type="email" class="form-control" id="login_email" placeholder="Enter email" name="login_email">
              </div>
              <div class="form-group">
                <label for="login_password">Password:</label>
                <input type="password" class="form-control" id="login_password" placeholder="Enter password" name="login_password">
              </div>
             <!--  <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
              </div> -->
              <button type="submit" class="btn btn-default">Login</button>
            </form>
          </div>
          <div id="registration-form" class="tab-pane fade">
            <form action="{{URL('/register')}}"  id="registerForm">
              {{csrf_field()}}
              <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" class="form-control" id="reg_name" placeholder="Enter your name" name="name">
              </div>
              <div class="form-group">
                <label for="mobile">Mobile Number:</label>
                <input type="text" class="form-control" id="reg_mobile" placeholder="Enter Mobile Number" name="reg_mobile">
              </div>
              <div class="form-group">
                <label for="reg_email">Email:</label>
                <input type="email" class="form-control" id="reg_email" placeholder="Enter new email" name="reg_email">
              </div>
              <div class="form-group">
                <label for="reg_password">Password:</label>
                <input type="password" class="form-control" id="reg_password" placeholder="New password" name="reg_password">
              </div>

              <div class="form-group">
                <label for="reg_password">Who are you :</label>
                <input type="radio" id="reg_role" value="1" name="reg_role" checked="checked"> Doctor
                <input type="radio" id="reg_role" value="2" name="reg_role"> Patient
              </div>
              <button type="submit" class="btn btn-default">Register</button>
            </form>
          </div>

        </div>
      </div>
<!-- <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div> -->
</div>
</div>
</div>



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
