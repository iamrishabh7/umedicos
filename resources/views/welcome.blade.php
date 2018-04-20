@extends('layout.app')
@section('content')
@section('title','Profile')


<div class="conatiner hero-image">
    <div class="md-center-content">
      <h1 class="md-color-white text-center">Your home for health</h1>
      <h4 class="md-color-white text-center" style="display: block; margin-top:50px;">Find and Book</h4>

      <form action="{{URL('search')}}" id="searchDoctorForm">
        {{csrf_field()}}
        <div class="md-search-bar">
          <span class="glyphicon glyphicon-map-marker"></span>
          <input type="text" type="text" id="pac-input" name="address" class="form-control" />
          <div class="md-auto-detect" title="Detect"><span onClick="locate()" class="glyphicon glyphicon-screenshot"></span></div>
        </div>
        <div class="md-select-div">
          <select class="md-select-box form-control" name="specialization" id="specialization">
            <option value="">--Select specialization--</option>
            @foreach($specializations as $specialization)
            <option value="{{$specialization->id}}" >{{$specialization->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="md-search-btn"> <input type="submit" title="Search" name="" class="form-control" value="Search" /> <span class="glyphicon glyphicon-search"></span></div>

      </form>
    </div>
  
</div>

<div id="map" style="display: none;"></div>

<!-- 
<div class="hero-image">
<div class="container">
  <div class="row">
    <div class="col-md-12">
       <div class="hero-text">
    <form action="{{URL('search')}}" id="searchDoctorForm">
        {{csrf_field()}}
        <div class="md-search-bar">
          <span class="glyphicon glyphicon-map-marker"></span>
          <input type="text" type="text" id="pac-input" name="address" class="form-control" />
          <div class="md-auto-detect" title="Detect"><span onClick="locate()" class="glyphicon glyphicon-screenshot"></span></div>
        </div>
        <div class="md-select-div">
          <select class="md-select-box form-control" name="specialization" id="specialization">
            <option value="">--Select specialization--</option>
            @foreach($specializations as $specialization)
            <option value="{{$specialization->id}}" >{{$specialization->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="md-search-btn"> <input type="submit" title="Search" name="" class="form-control" value="Search" /> <span class="glyphicon glyphicon-search"></span></div>

      </form>

       </div>
    </div>
  </div>
</div>
</div> -->



<!-- Login Modal-->
<div class="modal fade login-register-form" role="dialog" id="loginModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span class="glyphicon glyphicon-remove"></span>
        </button>
          <a href="#login-form"> Sign In <span class="glyphicon glyphicon-user"></span></a>
        </ul>
      </div>
      <div class="modal-body">
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
          <button type="submit" class="btn btn-default">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Register Modal-->
<div class="modal fade login-register-form" role="dialog" id="registerModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span class="glyphicon glyphicon-remove"></span>
        </button>
          <a data-toggle="tab" href="#registration-form"> Sign Up <span class="glyphicon glyphicon-pencil"></span></a>
        </ul>
      </div>
      <div class="modal-body">
        <div class="tab-content">
          <div id="registration-form" class="tab-pane fade in active">
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
