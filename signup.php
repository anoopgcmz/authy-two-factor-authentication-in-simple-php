
<?php  
include_once('function.php');  

$funObj = new dbFunction();  
     //Registering User
if($_POST['register']){  
	$username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);  //username
	$emailid = filter_var($_POST['emailid'],FILTER_SANITIZE_EMAIL);  //emailId
	$password = $_POST['password'];  //password
	$confirmPassword = $_POST['confirm_password'];   //confirm password                    
	if($password == $confirmPassword){  
		$email = $funObj->isUserExist($emailid);  
		if(!$email){  
			$register = $funObj->UserRegister($username, $emailid, $password);  
			if($register){  
				echo "<script>alert('Registration Successful')</script>";  
				?>
				<script type="text/javascript">
					window.location.assign("index.php")
				</script>
				<?php 
			}else{  
				echo "<script>alert('Registration Not Successful')</script>";  
			}  
		} else {  
			echo "<script>alert('Email Already Exist')</script>";  
		}  
	} else {  
		echo "<script>alert('Password Not Match')</script>";  

	}  
}  
?> 






<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex">

	<title>JadoPado Test - Anoop G</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<h1>Sign Up</h1>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="register-form" action="#" method="post" role="form" ">
									<div class="form-group">
										<input type="text" id="usernamesignup" name="username" required="required" tabindex="1" class="form-control" placeholder="Username" value="<?php echo $username?>">
									</div>
									<div class="form-group">
										<input type="email" id="emailsignup" name="emailid" required="required" tabindex="1" class="form-control" placeholder="Email Address" value="<?php echo $emailid?>">
									</div>
									<div class="form-group">
										<input type="password" id="passwordsignup" name="password" required="required" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" id="passwordsignup_confirm" name="confirm_password" required="required" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register" value="Sign up" tabindex="4" class="form-control btn btn-primary" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										<div class="text-center">
											<a href="index.php" tabindex="5" class="forgot-password" >Login</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
