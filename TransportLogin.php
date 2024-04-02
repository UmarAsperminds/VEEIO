<!DOCTYPE html>
<html lang="en">
<head>
	<title>Company Name</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>	
	<link rel="stylesheet" type="text/css" href="assets/styles/Login/util.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/Login/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(assets/images/TransportLogin.jpeg);"></div>
				<form class="login100-form validate-form" novalidate onsubmit="return false;">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="EmployeeID" placeholder="Enter Username" id="EmployeeID">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="Password" name="pass" placeholder="Enter Password" id="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" onclick="$('#ckb1').css('background-color','red')">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="Login">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript" src="./assets/scripts/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$('#Login').on('click', function(){
	var BranchID = 0;
	var array = ["T1150", "T1150", "T2250", "T2250"];
	if($('#EmployeeID').val() == array[0] && $('#Password').val() == array[1])
		BranchID = 1;
	else if($('#EmployeeID').val() == array[2] && $('#Password').val() == array[3])
		BranchID = 2;
	else
		alert("Username Or Password is Incorrect!");
	if(BranchID != 0){
		$.ajax({ url:"Backend/Security/LoginProcedure.php?LogInSecurity", success: function(){ 
			location.href='Header.php?AuthBy=Transport&BranchID='+BranchID+'&UserID='+$('#EmployeeID').val();
		} });
	}
});
</script>