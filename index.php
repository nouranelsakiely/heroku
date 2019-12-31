<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="https://gentle-dawn-44927.herokuapp.com/img/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="https://gentle-dawn-44927.herokuapp.com//vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://github.com/nouranelsakiely/heroku/tree/master/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://github.com/nouranelsakiely/heroku/tree/master/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="https://github.com/nouranelsakiely/heroku/tree/master/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="https://github.com/nouranelsakiely/heroku/tree/master/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="https://github.com/nouranelsakiely/heroku/tree/master/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="https://github.com/nouranelsakiely/heroku/tree/master/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="https://github.com/nouranelsakiely/heroku/tree/master/css/util.css">
	<link rel="stylesheet" type="text/css" href="https://github.com/nouranelsakiely/heroku/tree/master/css/main2.css">
	<style type="text/css">
		#form_msg{
            text-align: center;
            padding-top: 10px;
            color: red;
            margin-left: 20px;
        }
	</style>
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="form-state">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
					
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="user_name" id="user_name">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="submit">
							Login
						</button>
						<div id="form_msg"></div>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('img/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	


	<script src="https://github.com/nouranelsakiely/heroku/tree/master/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="https://github.com/nouranelsakiely/heroku/tree/master/vendor/animsition/js/animsition.min.js"></script>
	<script src="https://github.com/nouranelsakiely/heroku/tree/master/vendor/bootstrap/js/popper.js"></script>
	<script src="https://github.com/nouranelsakiely/heroku/tree/master/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="https://github.com/nouranelsakiely/heroku/tree/master/vendor/select2/select2.min.js"></script>
	<script src="https://github.com/nouranelsakiely/heroku/tree/master/vendor/daterangepicker/moment.min.js"></script>
	<script src="https://github.com/nouranelsakiely/heroku/tree/master/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="https://github.com/nouranelsakiely/heroku/tree/master/vendor/countdowntime/countdowntime.js"></script>
	<script src="https://github.com/nouranelsakiely/heroku/tree/master/js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
	    $(document).on('click', '#submit', function(e) {
		    e.preventDefault();
			

	            var user_name = $("#user_name").val();
	            var password = $("#password").val();
	            
	            if(user_name ==''){
	                $('#form_msg').html('Please insert username');   
	            }
	            else if(password == ''){
	                $('#form_msg').html('Please insert password');
	                // e.preventDefault();     
	            }
	            else if (password != "" && user_name != ""){
	                var formdata = $("#form-state").serialize();
	                $.ajax({
	                    url: 'https://gentle-dawn-44927.herokuapp.com/Actions/signin.php',
	                    type: "post",
	                    cache : false,
	                    data: formdata,
	                    success: function (data){
	                        console.log(data);
	                        if(data == 1){
	                            window.location = "https://gentle-dawn-44927.herokuapp.com/Views/addproduct.php";
	                        }
	                        else{
	                            $('#form_msg').html('invalid username or password');
	                        }
	                    }, 
	                    error: function(data){
	                        alert('failed');
	                    }
	                });
	            }

	    });
	</script>
</body>
</html>
