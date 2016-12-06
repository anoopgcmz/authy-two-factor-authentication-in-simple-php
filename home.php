 <?php   
 include_once('function.php');  
 include_once ('vendor/autoload.php');
 include_once('vendor/authy/php/lib/Authy/AuthyApi.php');  
//Session Validation
 if(!($_SESSION)){  
    header("Location:index.php");  
}  

//Passing Value to the sauth server
if(isset($_POST['update'])){  

                $prod = true; //set as false for testing purpose/// Change to false if usig dummi api key
                $apiKey = '';//production apiKey from Authi dashbord or Get dummy api key from authi RESTAPI CURL tutorial page
                if ($prod == true) {
                    $apiUrl = 'https://api.authy.com' ;
                } 
                else{

                    $apiUrl = 'http://sandbox-api.authy.com' ;
                } 

                $api = new Authy\AuthyApi($apiKey, $apiUrl);

                $userEmail = $_SESSION['email']; //useremail
                $userPhone = $_POST['authy-cellphone']; //cellphone Number
                $userCountryCode = $_POST['country-code']; //countrycode
                $user = $api->registerUser($userEmail, $userPhone, $userCountryCode);

                if ($user->ok()) {
                    $autusrID= $user->id();
                    $_SESSION['autusrID'] = $autusrID;
                    //echo 'Authy ID for user "'.$userEmail.'": '.$autusrID."\n";
                    // Now send SMS, force sending a message even if the user has the Authy mobile app installed
                    $sms = $api->requestSms('$autusrID', array("force" => "true"));  
                    header("Location:register.php"); 

                } 
                else {
                    foreach ($user->errors() as $field => $error){
                        echo 'Error on '.$field.': '.$error;
                    }
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
                <link href="//cdnjs.cloudflare.com/ajax/libs/authy-form-helpers/2.3/form.authy.min.css" media="screen" rel="stylesheet" type="text/css">
                <script src="//cdnjs.cloudflare.com/ajax/libs/authy-form-helpers/2.3/form.authy.min.js" type="text/javascript"></script> 
                <script src="//code.jquery.com/jquery-1.10.2.min.js"></script> 
                <style type="text/css">

                    .countries-input{
                        display: block;
                        width: 100%;
                        height: 34px;
                        padding: 6px 12px;
                        font-size: 14px;
                        line-height: 1.42857143;
                        color: #555;
                        background-color: #fff;
                        background-image: none;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                        -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
                        -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                    }

                </style>

            </head>
            <body>  
               <!-- Navbar -->
       <nav class="navbar navbar-inverse"> <div class="container-fluid"> <div class="navbar-header"> <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a href="#" class="navbar-brand"> JadoPado Test  </a> </div> <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9"> <ul class="nav navbar-nav navbar-right"><li class="active"><a href="#"><?=$_SESSION['username']?></a></li><li><a href="#">Home</a></li><li><a href="logout.php">Logout</a></li></ul> </div> </div> </nav>



               <div class="container">

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-login">
                            <div class="panel-heading">
                                &nbsp;
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                     <h4>Please Enter your Phone Number</h4> 
                                     <div name ="login" class="login-form form-group">

                                         <!-- Cellphone Number Form -->

                                         <form method="POST" action="">
                                            <label for="authy-cellphone">Email Id : </label> &nbsp
                                            <b>  <?=$_SESSION['email']?> </b><br>
                                            <label for="authy-countries">Country</label><br>
                                            <select id="authy-countries" name="country-code" class="form-control" name="country-code" ></select><br>
                                            <label for="authy-cellphone">cellphone number</label>
                                            <input id="authy-cellphone" type="number" required="" value="" name="authy-cellphone" class="form-control" placeholder="cellphone number" /><br>
                                            <input type="submit" name="update" value="update" class="btn btn-lg btn-primary" /> 
                                        </form>

                                        <!-- End Cellphone Number Form Form -->

                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="src/flags.authy.css">   
        <link rel="stylesheet" href="src/form.authy.css">
        <script src="src/form.authy.js"></script>

    </body>
    </html>
