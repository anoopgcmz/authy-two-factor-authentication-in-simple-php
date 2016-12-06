<?php   
include_once('function.php');  

        // remove all session variables  
session_unset();   

        // destroy the session   
session_destroy();  

if(!($_SESSION)){  
      // Redirecting To login Pge
  header("Location:index.php");  
}  
?>  