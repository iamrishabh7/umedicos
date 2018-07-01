@extends('layout.app')
@section('content')
@section('title','Profile')
<style>


.abc
{
  z-index: 9;
   /* position: absolute;
   width: 100%;*/
}

#searchCityResult {
  list-style-type: none;
  padding: 0;
  margin: 0;
  overflow: hidden;
  max-height: 183px;
  overflow-y: scroll;
  width: 103%;


}

#searchCityResult li a {
  border: 1px solid #ddd; 
  background-color: #ffffff; 
  padding: 6.5px 0px 12px 12px;
  text-align: left; 
  font-size: 18px; 
  color: #0095ff !important; 
  display: block;
  position: absolute;
  width: 100%; 
  z-index: 9;
}

#searchCityResult li a:hover:not(.header) {
  background-color: #eee;
}

#searchResult {
  list-style-type: none;
  padding: 0;
  margin: 0;
  overflow: hidden;
  max-height: 183px;
  overflow-y: scroll;
  width: 103%;


}

#searchResult li a {
  border: 1px solid #ddd; 
  background-color: #ffffff; 
  padding: 6.5px 0px 12px 12px;
  text-align: left; 
  font-size: 18px; 
  color: #0095ff !important; 
  display: block; 
}

#searchResult li a:hover:not(.header) {
  background-color: #eee;
}


#searchbanner {
  padding: 45px 0 50px 0;
  background: #43725b url(http://www.snhiswaziland.com/images/doctor.jpg) top right no-repeat;
  background-size: cover;
  min-height:500px;
  height: 100%;
  text-align: center;
}


.desktop-banner-container {
  position:relative;

  width: 70%;
  height: 100%;
  background: -webkit-linear-gradient(left, #48cfad 5%, #3bafda 90%);
  background: -moz-linear-gradient(left, #48cfad 5%, #3bafda 90%);
  background: -o-linear-gradient(left, #48cfad 5%, #3bafda 90%);
  background: -ms-linear-gradient(left, #48cfad 5%, #3bafda 90%);
  background: linear-gradient(to right, #48cfad 5%, #3bafda 90%);
  -webkit-transform: skewX(-30deg);
  -moz-transform: skewX(-30deg);
  -o-transform: skewX(-30deg);
  -ms-transform: skewX(-30deg);
  /* transform: skewX(-30deg); */
  margin-left: -110px;
}

.desktop-banner {
  position: relative;
  -webkit-background-size: contain;
  -moz-background-size: contain;
  background-size: contain;
  background-position: 100%;
  height: 100%;
  background: url(http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/doc1.jpg) top right no-repeat;
  background-size: 60% 120%;
  border-top: 4px solid #a5c4f6;
}
}



    .hero-area {
      width: 100%;
      position: relative;
      background: -webkit-linear-gradient(-45deg, #f1f9fb 0%, #f1f9fc 68%, #00bcd2 68%, #00bcd2 100%); 
      background: -webkit-linear-gradient(315deg, #f1f9fb 0%, #f1f9fc 68%, #00bcd2 68%, #00bcd2 100%);
      background: linear-gradient(135deg, #f1f9fb 0%, #f1f9fc 68%, #00bcd2 68%, #00bcd2 100%); 
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#00bcd2', GradientType=1);
    }

    .footer
    {
      bottom: unset;
    }

    .md-color-white {
      font-size:  45px;
      font-family: 'Oswald', sans-serif;
    }
    section{ display: block; font-family: 'Oswald', sans-serif;}
    #blue {height: 100%
      width:100%;
    }
    .box-tex {
      font-size: 50px;
      color: #edf4fb;;
      text-transform: sentance;
      padding: 75px 0px 30px 15px;
      -webkit-transform: skewX(30deg);
      -moz-transform: skewX(30deg);
      -o-transform: skewX(30deg);
      -ms-transform: skewX(30deg);
      margin-left: 227px;

    }

    #why {
      width: 100%;
      background-color: #f1f9fc;
      border-top: 4px solid #a5c4f6;
    }

    #itwork
    {
      width: 100%;
      background-color: #f1f9fc;
      border-top: 4px solid #a5c4f6;  
    }

    #why h2 {font-size: 45px; padding-top: 10px; padding-bottom: 10px;}
    .list-text {font-size: 25px; padding: 12px;  margin-bottom: 30px;}
    .list-text li { padding: 5px;}


    .media-img {
      width:  75px;
      height:  100%;
      float:  left;
      vertical-align:  middle;
    }

    #itwork h2 {
      text-align:  center;
      font-size: 45px;
      line-height:  45px;
      padding-bottom: 45px;
      padding:  10px;
      padding-top: 20px;
      margin-bottom: 35px;
    }

    #itwork .media-heading {

      font-size: 25px;
      padding: 5px 0px 15px 30px;
    }

    #itwork .media {
      margin: 0px 0px 0px 0px;
    }

    @media (max-width:767px)
    {
      .md-color-white
      {
        font-size:30px;
      }
      .md-search-btn span.glyphicon-search {
        top: 159px !important;
        left: 107px;
        display: none;
      }

      .box-tex {font-size: 20px;}

      #itwork .media-heading {
        font-size: 13px;
            padding: 5px 0px 20px 12px;
      }

      .abc
      {
        z-index: 9;
        position: absolute;
        width: 100%;
      }
    }


    .timeline {
      list-style: none;
      padding: 20px 0 20px;
      position: relative;
    }
    .timeline:before {
      top: 0;
      bottom: 0;
      position: absolute;
      content: " ";
      width: 3px;
      background-color: #eeeeee;
      left: 50%;
      margin-left: -1.5px;
    }
    .timeline > li {
      margin-bottom: 20px;
      position: relative;
    }
    .timeline > li:before,
    .timeline > li:after {
      content: " ";
      display: table;
    }
    .timeline > li:after {
      clear: both;
    }
    .timeline > li:before,
    .timeline > li:after {
      content: " ";
      display: table;
    }
    .timeline > li:after {
      clear: both;
    }
    .timeline > li > .timeline-panel {
      width: 50%;
      float: left;
      border: 1px solid #d4d4d4;
      border-radius: 2px;
      padding: 20px;
      position: relative;
      -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
      box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
    }
    .timeline > li.timeline-inverted + li:not(.timeline-inverted),
    .timeline > li:not(.timeline-inverted) + li.timeline-inverted {
      margin-top: -10px;
    }

    .timeline > li:not(.timeline-inverted) {
      padding-right:90px;
    }

    .timeline > li.timeline-inverted {
      padding-left:90px;
    }
    .timeline > li > .timeline-panel:before {
      position: absolute;
      top: 26px;
      right: -15px;
      display: inline-block;
      border-top: 15px solid transparent;
      border-left: 15px solid #ccc;
      border-right: 0 solid #ccc;
      border-bottom: 15px solid transparent;
      content: " ";
    }
    .timeline > li > .timeline-panel:after {
      position: absolute;
      top: 27px;
      right: -14px;
      display: inline-block;
      border-top: 14px solid transparent;
      border-left: 14px solid #fff;
      border-right: 0 solid #fff;
      border-bottom: 14px solid transparent;
      content: " ";
    }
    .timeline > li > .timeline-badge {
      color: #fff;
      width: 50px;
      height: 50px;
      line-height: 50px;
      font-size: 1.4em;
      text-align: center;
      position: absolute;
      top: 16px;
      left: 50%;
      margin-left: -25px;
      background-color: #22a7cc;
      z-index: 100;
      border-top-right-radius: 50%;
      border-top-left-radius: 50%;
      border-bottom-right-radius: 50%;
      border-bottom-left-radius: 50%;
    }
    .timeline > li.timeline-inverted > .timeline-panel {
      float: right;
    }
    .timeline > li.timeline-inverted > .timeline-panel:before {
      border-left-width: 0;
      border-right-width: 15px;
      left: -15px;
      right: auto;
    }
    .timeline > li.timeline-inverted > .timeline-panel:after {
      border-left-width: 0;
      border-right-width: 14px;
      left: -14px;
      right: auto;
    }
    .timeline-badge.primary {
      background-color: #22a7cc !important;
    }
    .timeline-badge.success {
      background-color: #22a7cc !important;
    }
    .timeline-badge.warning {
      background-color: #22a7cc !important;
    }
    .timeline-badge.danger {
      background-color: #22a7cc !important;
    }
    .timeline-badge.info {
      background-color: #22a7cc !important;
    }




    @media(max-width:767px)
    {

      .container-fluid.desktop-banner-container {
        width:  100%;
        
      }

      #searchResult li a {
        padding: 7px 0px 10px 5px;
        font-size: 15px;
        
      }

      #searchResult {

        max-height: 215px;
        width: 102.5%;
        
      }

      #itwork h2 {
        text-align: center;
        font-size: 30px;
        line-height: 30px;
        padding-bottom: 0px;
        padding: 19px;
        padding-top: 10px;
        margin-bottom: 0px;
        
      }
      .media-img {
        width: 28px;
        height: 100%;
        float: left;
        vertical-align: middle;
      }

      .timeline > li > .timeline-badge {
        color: #fff;
        width: 30px;
        height: 40px;
        line-height: 43px;
        font-size: 1em;
        text-align: center;
        position: absolute;
        top: 16px;
        left: 53%;
        margin-left: -25px;
        background-color: #22a7cc;
        z-index: 100;
        border-top-right-radius: 52%;
        border-top-left-radius: 52%;
        border-bottom-right-radius: 52%;
        border-bottom-left-radius: 52%;
      }

      .timeline > li > .timeline-panel {
        width: 57%;
      }

      #why h2 {
        font-size: 30px;
        padding-top: 10px;
        padding-bottom: 10px;
      }

      .list-text li {
        padding: 5px;
      }

      .list-text {
        font-size: 20px;
        padding: 5px;
        margin-bottom: 10px;
      }

      .box-tex {

        padding: 22px 0px 0px 8px;
        
        margin-left: 95px;

      }
    }

    @media(min-width:768px) and (max-width:1024px)
    {
      .box-tex {
        padding: 22px 0px 15px 15px; 
        margin-left: 95px;
        font-size:30px

      }
    }


.mrg {
    margin-top: 80px;
    left: -100px;
    margin-bottom: 40px;
}


@media (min-width:320px) and (max-width:767px)
{
    .mrg {
    margin-top: 0px;
    left: 0px;
    margin-bottom: 0px;
}

#itwork .media>.pull-right {
    padding-left: 0px;
}
}

@media (min-width:768px) and (max-width:980px)
{
    .mrg {
    margin-top: 0px;
    left: 0px;
    margin-bottom: 0px;
}



#itwork .media-heading {
    font-size: 25px;
    padding: 5px 30px 30px 30px;
    letter-spacing: -1px;
}
}
#itwork .media>.pull-right {
    padding-left: 0px;
}

.tag-line
{
  font-size: 40px;
  line-height: 65px;
}

@media (max-width: 767px)
{
  .tag-line
{
  font-size: 30px;
  line-height: 20px;
}
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<div id="searchbanner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1  class="md-color-white">Inspiring better health</h1>
        <h4 class="md-color-white tag-line">Search and Visit</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="md-center-content"> 
          <form action="{{URL('search')}}" id="searchDoctorForm">
            {{csrf_field()}}
            <div class="md-search-bar">
              <span class="glyphicon glyphicon-map-marker"></span>
              <input type="text" type="text" onfocus="showCityList()" onkeyup="searchCity('{{URL("/")}}',this.value)" id="city"  name="address" class="form-control" placeholder="Enter Location" autocomplete="off" />
              <ul id="searchCityResult" style="display: none;">
                                @foreach($cities as $city)
                                @if($city != "")
                                <li onclick="getCity('{{$city}}')">
                                    <a href="javascript:void(0)"><img src="{{URL('/images/searchicon.png')}}" alt="">{{$city}}</a>
                                </li>
                                @endif
                                @endforeach
                            </ul>

                        </div>
                        <div class="md-select-div">
                           <input type="hidden" id="type_id">
                           <input type="text" onfocus="showList('{{URL("/")}}')" onkeyup="search()" id="searchInput" placeholder="Enter a query" autocomplete="off">
                           <ul id="searchResult" style="display: none;">
                            @foreach($specializations as $specialization)
                            <li onClick="getValue('specialization','{{ucfirst($specialization->name)}}',{{$specialization->id}})"><a href="javascript:void(0)"><img src="{{URL('/images/searchicon.png')}}" alt="" >{{ucfirst($specialization->name)}}</a>
                            </li>
                            @endforeach
                            @foreach($doctors as $doctor)
                            <li onClick="getValue('doctor','{{ucfirst($doctor->name)}}',{{$doctor->id}})"><a href="{{URL('/doctorID/'.$doctor->id)}}"><img src="{{URL($doctor->doctor->profile_pic)}}" alt="" height="30" width="30" >{{ucfirst($doctor->name)}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="md-search-btn">
                       <input type="submit" title="Search" name="" class="form-control" value="Search" /> <span class="glyphicon glyphicon-search"></span></div>

                   </form>
               </div>
           </div>
       </div>
   </div>
</div>

<section id="blue" class="desktop-banner">
  <div class="container-fluid desktop-banner-container">
   <div class="row">

    <div class="col-md-12">
     <div class="box-tex">
      <p>Find the best doctors around you, <br/>and get instant discount. </p>
      <p><a data-toggle="modal" href="#registerModal" class="btn btn-primary btn-lg">Register for free</a></p>
  </div>
</div>
      <!-- <div class="col-md-4">
      <img src="{{URL('/images/doc1.jpg')}}">
    </div> -->
  </div>
</div>

</section>

<section id="why">
  <div class="container">
    <div class="row ">
      <div class="col-md-12">
        <h2>Why UDOC?</h2>
        <div class="list-text">
          <ul>
            <li><span>&#10004;</span> Simple and easy to use</li>
            <li><span>&#10004;</span>  Zero registration fees</li>
            <li> <span>&#10004;</span> Cut down your time searching for best doctors</li>
            <li><span>&#10004;</span> Verified doctors</li>
            <li><span>&#10004;</span>  25% instant discount on consulting fees guaranteed</li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</div>

</section>



<section id="itwork">
  <div class="container">
    <div class="row ">
      <div class="col-md-12">
        <h2>How It Works</h2>
      </div>
      <!-- <div class="col-md-12">
        <ul class="timeline">
          <li>
            <div class="timeline-badge"><i>1</i></div>
            <div class="timeline-panel">

              <div class="media">
                <div class="media-img">
                  <a href="#">
                    <img class="media-object" src="{{URL('/images/doc5.png')}}" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <p class="media-heading">A simple and free registration save time and find your right doctor.</p>
                </div>
              </div>

            </div>
          </li>
          <li class="timeline-inverted">
            <div class="timeline-badge"><i>2</i></div>
            <div class="timeline-panel">
              <div class="media">
                <div class="media-img">
                  <a href="#">
                    <img class="media-object" src="{{URL('/images/doc3.png')}}" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <p class="media-heading">Verify you phone number and get discount coupons on your registered number.</p>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="timeline-badge danger"><i>3</i></div>
            <div class="timeline-panel">

              <div class="media">
                <div class="media-img">
                  <a href="#">
                    <img class="media-object" src="{{URL('/images/doc4.png')}}" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <p class="media-heading">Find the best among your registered doctors suitable to your need.</p>
                </div>
              </div>
            </div>
          </li>
          <li class="timeline-inverted">
            <div class="timeline-badge danger"><i>4</i></div>
            <div class="timeline-panel">

              <div class="media">
                <div class="media-img">
                  <a href="#">
                    <img class="media-object img-circle" src="{{URL('/images/doc6.jpg')}}" ">
                  </a>
                </div>
                <div class="media-body">
                  <p class="media-heading">Visit doctor and get discount on the consultation fees after doctor redeem coupon on his portal.</p>
                </div>
              </div>
            </div>
          </li>

        </ul>
      </div> -->
       <div class="col-md-6">
      <div class="media">
  <div class="media-img">
    <a href="#">
      <img class="media-object" src="{{URL('/images/doc5.png')}}" alt="...">
    </a>
  </div>
  <div class="media-body">
    <p class="media-heading">A simple and free registration, save time and find your right doctor.</p>
  </div>
</div>
      </div>
      <div class="col-md-6 mrg">
    <div class="media">
  <div class="media-img pull-right">
    <a href="#">
      <img class="media-object" src="{{URL('/images/doc3.png')}}" alt="...">
    </a>
  </div>
  <div class="media-body">
<p class="media-heading">Verify you phone number and get discount coupons on your registered number.</p>
  </div>
</div>
      </div>

      <div class="col-md-6">
      <div class="media">
  <div class="media-img">
    <a href="#">
      <img class="media-object" src="{{URL('/images/doc4.png')}}" alt="...">
    </a>
  </div>
  <div class="media-body">
    <p class="media-heading">Find the best among our registered doctors suitable to your need.</p>
  </div>
</div>
      </div>
      <div class="col-md-6 mrg">
    <div class="media">
  <div class="media-img pull-right">
    <a href="#">
      <img class="media-object img-circle" src="{{URL('/images/doc6.jpg')}}" ">
    </a>
  </div>
  <div class="media-body">
<p class="media-heading">Visit doctor and get discount on the consultation fees after doctor redeem coupon on his portal.</p>
  </div>
</div>
</div> 
</div>
</div>

</section>

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


  $(document).on('click', function(event) {
    if (!$(event.target).closest('#searchInput').length) {
            $('#searchResult').hide();
        }
        if (!$(event.target).closest('#city').length) {
            $('#searchCityResult').hide();
        }


    });

</script>

@endsection
