      <div class="page-sidebar sidebar">
      	<div class="page-sidebar-inner slimscroll">
      		<div class="sidebar-header">
      			<div class="sidebar-profile">
              <!-- <a href="javascript:void(0);" id="profile-menu-link"> -->
                <a href="javascript:void(0);">
                 <div class="sidebar-profile-image">
                  <img src="{{URL('/images/user_default.png')}}" class="img-circle img-responsive" alt="">
                </div>
                <div class="sidebar-profile-details">
                  <span>{{\Auth::user()->name}}<br><small></small></span>
                </div>
              </a>
            </div>
          </div>

          <ul class="menu accordion-menu">
           <li class="{{setActive('admin/dashboard')}}"><a href="{{URL('/admin/dashboard')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>

           <li class="droplink  {{setActive('admin/doctors')}}"><a href="#" class="waves-effect waves-button"><span class="menu-icon fa fa-user-md"></span><p>Doctors</p><span class="arrow"></span></a>
            <ul class="sub-menu">
              <li><a href="{{URL('/admin/doctors')}}">Doctor Listing</a></li>
            </ul>
          </li>

          <li class="droplink  {{setActive('admin/patients')}}"><a href="#" class="waves-effect waves-button"><span class="menu-icon fa fa-wheelchair"></span><p>Patients</p><span class="arrow"></span></a>
            <ul class="sub-menu">
              <li><a href="{{URL('/admin/patients')}}">Patient Listing</a></li>
            </ul>
          </li>

          <li class=""><a href="{{URL('logout')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Logout</p></a></li> 
        </ul>
      </div><!-- Page Sidebar Inner -->
      </div><!-- Page Sidebar -->