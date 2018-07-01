function alphaOnly(evt) {
	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
		((evt.which) ? evt.which : 0));
	if (charCode > 31 && (charCode < 65 || charCode > 90) &&
		(charCode < 97 || charCode > 122)) {
		swal('Oops','Please input alphabet characters only','error');
	return false;
}
return true;
};
function isNumber(evt) {
	evt = (evt) ? evt : window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		return false;
	}
	return true;
}

function showCityList(){
	$('#searchCityResult').show();
}
function showList(baseurl){
	if($('#city').val() == ""){
		$('#searchResult').show();
	}else{
		$('#searchResult').show().html('');
		var url  = baseurl+'/'+'get-result-by-location/'+$('#city').val();
		$.ajax({
			url: url,
			type: 'GET',
			success: function (data) {
				var spacializations = '';
				var doctors = '';
				$('#searchCityResult').empty();
				$.each(data.spacializations, function(index,spacialization) {
					spacializations+=
					`<li onClick="getValue('specialization','`+spacialization.name.charAt(0).toUpperCase() + spacialization.name.substr(1)+`',`+spacialization.id+`)">
					<a href="javascript:void(0)""><img src="`+baseurl+`/images/searchicon.png" alt="" >`+spacialization.name.charAt(0).toUpperCase() + spacialization.name.substr(1)+`</a></li>`;
				});

				$.each(data.doctors, function(index,doctor) {
					doctors+=
					`<li onClick="getValue('doctor','`+doctor.name.charAt(0).toUpperCase() + doctor.name.substr(1)+`',`+doctor.id+`)">
					<a href="`+baseurl+`/doctorID/`+doctor.id+`"><img src="`+doctor.profile_pic+`" alt="" height="30" width="30" >
					`+doctor.name.charAt(0).toUpperCase() + doctor.name.substr(1)+`</a>
					</li>`;
				});
				spacializations+=doctors;
				$('#searchResult').show();
				$('#searchResult').html(spacializations);
				
			}
		});
	}
}
function search(){
	var input, filter, ul, li, a, i;
	input = document.getElementById('searchInput');
	filter = input.value.toUpperCase();
	ul = document.getElementById("searchResult");
	li = ul.getElementsByTagName('li');
	for (i = 0; i < li.length; i++) {
		a = li[i].getElementsByTagName("a")[0];
		if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
			li[i].style.display = "";
		} else {
			li[i].style.display = "none";
		}
	}
}
function searchCity(baseurl,keyword){
	if(keyword == ""){
		$('#searchCityResult').hide();
	}else{

		var url  = baseurl+'/'+'get-cities/'+keyword;
		$.ajax({
			url: url,
			type: 'GET',
			success: function (data) {
				var cities = '';
				$('#searchCityResult').empty();
				if(data.flag){
					$.each(data.cities, function(index,city) {
						cities+=`<li onClick="getCity('`+city+`')">
						<a href="javascript:void(0)"><img src="`+baseurl+`/images/searchicon.png" alt="" >`
						+city.charAt(0).toUpperCase() + city.substr(1)+`</a>`
					});
					$('#searchCityResult').show();
					$('#searchCityResult').html(cities);
				}else{
				}
			}
		});
	}
}

function getCity(city){
	$('#city').val(city);
	$('#searchCityResult').hide();
}
function removeClinicImage(baseurl,image_id){
	var url  = baseurl+'/'+'doctor/remove-clinic-image/'+image_id;
	$.ajax({
		url: url,
		type: 'GET',
		success: function (data) {
			console.log(data);
			if(data.flag){
				swal('Success',data.message,'success');
				$("#image_"+image_id).remove();
			}else{
				$('#registerModal').modal('toggle');
				swal('Oops',data.message,'error');  
			}
		}
	});
}
function getValue(type,value,id){
	console.log(type);
	$("#searchResult" ).hide()
	$('#type_id').attr('name',type);
	$('#type_id').val(id);
	$('#searchInput').val(value);
}
function addDay(day){
	var html = `
	<label class="col-sm-3"></label>
	<div class="col-sm-3">
	<select name="operational_days`+day+`[]" id="operational_days`+day+`" class="form-control">
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
	<input type="time" name="address`+day+`_timing_from[]" class="form-control" placeholder="time From">
	</div>	
	<div class="col-sm-2">
	<input type="time" name="address`+day+`_timing_to[]" class="form-control" placeholder="time to">
	</div>
	<div class="col-sm-2">
	</div>
	`;
	$('#days'+day).append(html);
}
function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(String(email).toLowerCase());
}
function removeDay(day,id){
	$('#row_'+day+'_'+id).remove();
}
$(document).ready(function() {
	// $( "#searchInput" ).blur(function() {
	// 	$( "#searchResult" ).hide()
	// });
	$('#searchDoctorForm').submit(function(event) {
		if($('#pac_input').val() == ""){
			swal('Warning','Please Enter Address','error');
			return false; 
		}else{
			return true;
		}
	});

	$('#sendOtpForm').submit(function(event) {
		event.preventDefault();
		if($('#mobile_number').val() == ""){
			swal('Warning','Please Enter Mobile Number','error');
			return false; 
		}else{
			$.ajaxSetup({
				headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
			});
			var url  = $('#sendOtpForm').attr('action');
			$.ajax({
				url: url,
				type: 'POST',
				data: $('#sendOtpForm').serialize(),
				success: function (data) {
					console.log(data);
					if(data.flag){
						$('#sendOtpForm').hide();
						$('#otpSentDiv').show();
						$('#verifyOtpForm').show();
					}else{
						swal('Oops',data.message,'error');  
					}
				}
			});
		}
	});

	$('#verifyOtpForm').submit(function(event) {
		event.preventDefault();
		if($('#otp').val() == ""){
			swal('Warning','Please Enter Mobile Number','error');
			return false; 
		}else{
			$.ajaxSetup({
				headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
			});
			var url  = $('#verifyOtpForm').attr('action');
			$.ajax({
				url: url,
				type: 'POST',
				data: $('#verifyOtpForm').serialize(),
				success: function (data) {
					console.log(data);
					if(data.flag){
						$('#verifyMobileModal').modal('toggle');
						$('#alertDiv').remove();
						swal('Success',data.message,'success'); 
						setInterval(function(){ window.location.reload(); }, 2000);
					}else{
						swal('Oops',data.message,'error');  
					}
				}
			});
		}
	});

	$('#loginForm').submit(function(event) {
		event.preventDefault();
		if($('#login_email').val() == ""){
			swal('Warning','Please Enter Email','error');
			return false; 
		}else if($('#login_password').val() == ""){
			swal('Warning','Please Enter Password','error');
			return false; 
		}else{
			$.ajaxSetup({
				headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
			});
			var url  = $('#loginForm').attr('action');
			$.ajax({
				url: url,
				type: 'POST',
				data: $('#loginForm').serialize(),
				success: function (data) {
					console.log(data);
					if(data.flag){
						window.location.href = data.next_url;
					}else{
						$('.loginModal').modal('toggle');
						swal('Oops',data.message,'error');  
					}
				}
			});
		}	
	});
	$('#registerForm').submit(function(event) {
		event.preventDefault();
		var mobile_number = $('#reg_mobile').val();
		var email = $('#reg_email').val();
		var flag = 0;
		if(email != ""){
			if(!validateEmail(email)){
				flag = 1;
			}
		}
		if($('#reg_name').val() == ""){
			swal('Warning','Please Enter Name','error');
			return false; 
		}else if($('#reg_mobile').val() == ""){
			swal('Warning','Please Enter Mobile Number','error');
			return false; 
		}else if(mobile_number =! "" && mobile_number.length != 10){
			swal('Error',"Mobile Number must be of 10 Number",'error');
		}else if($('#reg_email').val() == ""){
			swal('Warning','Please Enter Email','error');
			return false; 
		}else if(flag == "1"){
			swal('Warning','Please Enter a Valid Email','error');
			return false; 
		}else if($('#reg_password').val() == ""){
			swal('Warning','Please Enter Password','error');
			return false; 
		}else if($('#reg_role').val() == ""){
			swal('Warning','Please Select User type','error');
			return false; 
		}else{
			$.ajaxSetup({
				headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
			});
			var url  = $('#registerForm').attr('action');
			$.ajax({
				url: url,
				type: 'POST',
				data: $('#registerForm').serialize(),
				success: function (data) {
					console.log(data);
					if(data.flag){
						$('#registerModal').modal('toggle');
						swal('Success',data.message,'success');
					}else{
						swal('Oops',data.message,'error');  
					}
				}
			});
		}
	});
	$('#doctorEditForm').submit(function(event) {
		var is_profile_completed = $('#is_profile_completed').val();
		if(is_profile_completed == 0){
			if($('#name').val() == ""){
				swal('Warning','Please Enter Name','error');
				return false; 
			}
			else if($('#city').val() == ""){
				swal('Warning','Please Enter City','error');
				return false; 
			}else if($('#pincode').val() == ""){
				swal('Warning','Please Enter Pincode','error');
				return false; 
			}else if($('#qualification').val() == ""){
				swal('Warning','Please Enter Qualification','error');
				return false; 
			}
			else if($('#spacialization').val() == null){
				swal('Warning','Please Select Specialization','error');
				return false; 
			}else if($('#profile_pic').val() == ""){
				swal('Warning','Please Upload Profile Image','error');
				return false; 
			}else if($('#primary_contact').val() == ""){
				swal('Warning','Please Enter Primary Contact Number','error');
				return false; 
			}else if($('#pac-input').val() == ""){
				swal('Warning','Please Enter Address1','error');
				return false; 
			}else if($('#operational_days1').val() == null){
				swal('Warning','Please Select operational days for Address 1','error');
				return false; 
			}else if($('#clinic_images').val() == ""){
				swal('Warning','Please Select Clinic images','error');
				return false; 
			}else if($('#pac-input2').val() != ""){
				if($('#operational_days2').val() == null){
					swal('Warning','Please Select operational days for Address 2','error');
					return false; 
				}
			}else{
				return true;
			}
		}else{
			if($('#name').val() == ""){
				swal('Warning','Please Enter Name','error');
				return false; 
			}else if($('#city').val() == ""){
				swal('Warning','Please Enter City','error');
				return false; 
			}else if($('#pincode').val() == ""){
				swal('Warning','Please Enter Pincode','error');
				return false; 
			}else if($('#qualification').val() == ""){
				swal('Warning','Please Enter Qualification','error');
				return false; 
			}else if($('#spacialization').val() == null){
				swal('Warning','Please Select Specialization','error');
				return false; 
			}else if($('#primary_contact').val() == ""){
				swal('Warning','Please Enter Primary Contact Number','error');
				return false; 
			}else if($('#pac-input').val() == ""){
				swal('Warning','Please Enter Address1','error');
				return false; 
			}else if($('#operational_days1').val() == null){
				swal('Warning','Please Select operational days for Address 1','error');
				return false; 
			}else if($('#pac-input2').val() != ""){
				if($('#operational_days2').val() == null){
					swal('Warning','Please Select operational days for Address 2','error');
					return false; 
				}
			}else{
				return true;
			}
		}
		
	});

	$('#redeemCodeForm').submit(function(event) {
		event.preventDefault();
		if($('#code').val() == ""){
			swal('Warning','Please Enter Code','error');
			return false; 
		}else{
			$.ajaxSetup({
				headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
			});
			var url  = $('#redeemCodeForm').attr('action');
			$.ajax({
				url: url,
				type: 'POST',
				data: $('#redeemCodeForm').serialize(),
				success: function (data) {
					console.log(data);
					if(data.flag){
						swal('Success',data.message,'success'); 
						setInterval(function(){ window.location.reload(); }, 2000);
					}else{
						swal('Oops',data.message,'error');  
					}
				}
			});
		}
	});
});