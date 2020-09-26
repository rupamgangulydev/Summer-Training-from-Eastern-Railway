$(document).ready(function(){	
	$('#show_captcha').load('captcha.php');
	
	$('#login').on('click', function(){
		var username = $('#username').val();
		var password = $('#password').val();
		var captcha = $('#captcha').val();
		
		if(username == "" || password == "" || captcha == ""){
			$('#result').html('<center><label class="text-warning">Please complete the required field!</label></center>');
		}else{
			$.ajax({
				url: 'login.php',
				type: 'POST',
				data: {username: username, password: password, captcha: captcha},
				success: function(data){
					if(data == "captcha"){
						$('#result').html('<center><label class="text-danger">The answer you entered for the CAPTCHA was not correct</label></center>');
						$('#username').val('');
						$('#password').val('');
						$('#captcha').val('')
						$('#show_captcha').load('captcha.php');
					}else if(data == "error"){
						$('#result').html('<center><label class="text-danger">Invalid username or password</label></center>');
						$('#show_captcha').load('captcha.php');
						$('#username').val('');
						$('#password').val('');
						$('#captcha').val('')
					}else if(data == "success"){
						$('#username').val('');
						$('#password').val('');
						$('#captcha').val('');
						window.location = "home.php";
					}
					
				}
			})
		}
	});
});