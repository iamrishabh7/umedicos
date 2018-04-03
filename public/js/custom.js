$(document).ready(function() {
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
		if($('#reg_name').val() == ""){
			swal('Warning','Please Enter Name','error');
			return false; 
		}else if($('#reg_mobile').val() == ""){
			swal('Warning','Please Enter Mobile Number','error');
			return false; 
		}else if($('#reg_email').val() == ""){
			swal('Warning','Please Enter Email','error');
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
						$('.loginModal').modal('toggle');
						window.location.href = data.next_url; 
					}else{
						$('.loginModal').modal('toggle');
						swal('Oops',data.message,'error');  
					}
				}
			});
		}
	});
});