<?php  
include_once('function.php');  

$funObj = new dbFunction();  
if($_POST['login']){  
	$emailid = $_POST['emailid'];  
	$password = $_POST['password'];  
	$user = $funObj->Login($emailid, $password);  
	if ($user) {  
            // Registration Success  
		
		?>
		<script type="text/javascript">
			window.location.assign("home.php")
		</script>
		<?php  
	} else {  
            // Registration Failed  
		echo "<script>alert('Emailid / Password Not Match')</script>";  
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
	

</style>
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<h1>Login</h1>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form name="login" method="post" action=""> 
									<div class="form-group">
										<input id="emailsignup" name="emailid" required="required" type="email" placeholder="Email Id" class="form-control">
									</div>
									<div class="form-group">
										<input id="password" name="password" required="required" type="password" placeholder="Password" class="form-control">
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login" value="Login" tabindex="4" class="form-control btn btn-primary"  >
											</div>
										</div>
									</div>
								</form> 
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										<div class="text-center">
											<a href="signup.php" tabindex="5" class="forgot-password" >Sign Up</a>
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
