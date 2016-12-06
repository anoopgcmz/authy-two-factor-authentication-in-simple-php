<?php   
include_once('function.php');  


if(!($_SESSION)){  
  header("Location:index.php");  
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
  <script src="https://www.authy.com/form.authy.min.js" type="text/javascript"></script>  
  <script src="//code.jquery.com/jquery-1.10.2.min.js"></script> 


</head>
<body> 

<!--Navbar --> 
 <nav class="navbar navbar-inverse"> <div class="container-fluid"> <div class="navbar-header"> <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a href="#" class="navbar-brand"> JadoPado Test  </a> </div> <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9"> <ul class="nav navbar-nav navbar-right"><li class="active"><a href="#"><?=$_SESSION['username']?></a></li><li><a href="#">Home</a></li><li><a href="logout.php">Logout</a></li></ul> </div> </div> </nav>


 
 <div class="container">

  <div class="row">
   <h1>Registration Sucesfull</h1>
   <h3>Congratulations your Account is Veriffied  </h3>
 </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="src/flags.authy.css">
<link rel="stylesheet" href="src/form.authy.css">
<script src="src/form.authy.js"></script>

</body>
</html>
