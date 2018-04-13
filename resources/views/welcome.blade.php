@extends('layout.app')
@section('content')
@section('title','Profile')
<style>

body{
  margin:0px;
  padding:0px;
}
/*generic class*/
.md-color-white{
  color:#FFF;
}
.md-container{
  width:100%;
  height:100%;
}
.md-navbar{

}
.md-content-body{
  /*background-image: url(home2.jpg);*/
  width: 100%;
  height: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
}
.md-center-content{
  width:85%;
  max-width:800px;
  margin:8% auto;
  text-align: center;
}
.md-search-bar,.md-search-btn,.md-select-div{
  height: 48px;
  float: left;
  position: relative;
}
.md-search-bar{
  max-width:370px;
  width:45%;
}
.md-select-div{
  max-width:300px;
  width:40%;
}
.md-search-btn{
  max-width: 120px;
  width: 15%;
}
.md-search-btn span.glyphicon-search{
  left:10px;
  color:#fff;
  cursor: pointer;
}
.md-center-content input,
.md-center-content select{
  width:100%;
  height:100%;
  border-radius: 0px;
}
.md-search-bar span.glyphicon-map-marker{
  left:5px;
  color:red;
}
.md-auto-detect{
  width: 31px;
  height: 36px;
  position: absolute;
  right: 6px;
  display: inline-block;
  top: 6px;
  background: #e8f3f9;
  cursor: pointer;
}
.md-center-content .md-auto-detect span.glyphicon-screenshot{
  top: 7px;
  left: 4px;
  color: #2196F3;
}
.md-center-content span.glyphicon{
  position: absolute;
  font-size: 22px;
  top: 13px;
}
.md-search-bar input{
  padding-left:30px;
}
.md-search-btn input{
  background: #0e6ebb;
  color: #fff;
  border-color: #0e6ebb;
  padding-left: 25px;
}

.md-search-btn input:focus,.md-search-btn input:hover{
  outline: none !important;
  opacity: .8;
  border-color: #0e6ebb;
}

@media(max-width:767px){
  .md-search-bar,.md-search-btn,.md-select-div{
    width: 100%;
    max-width: 100%;
    margin:10px 0px;
  }
}

</style>

<div class="md-container conatiner">
  <div class="md-content-body">
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
</div>

<div id="map" style="display: none;"></div>


<!-- Login Modal-->
<div class="modal fade login-register-form" role="dialog" id="loginModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span class="glyphicon glyphicon-remove"></span>
        </button>
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#login-form"> Login <span class="glyphicon glyphicon-user"></span></a></li>
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
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span class="glyphicon glyphicon-remove"></span>
        </button>
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#registration-form"> Register <span class="glyphicon glyphicon-pencil"></span></a></li>
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
