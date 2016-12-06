<?php  
error_reporting(0);
require_once 'dbConnect.php';  
session_start();  
class dbFunction {  
    
    function __construct() {  
      
            // connecting to database  
        $db = new dbConnect();;  
        
    }  
        // destructor  
    function __destruct() {  
      
    }  
        //User Registration
    public function UserRegister($username, $emailid, $password){    
        $password = password_hash ( $password , PASSWORD_BCRYPT, $options = ['cost' => 12,]  );   
        $qr = mysql_query("INSERT INTO users(username, emailid, password) values('".$username."','".$emailid."','".$password."')") or die(mysql_error());   
        return $qr;  
        
    }  
        #user Login
    public function Login($emailid, $password){   
     $val = "SELECT * FROM users WHERE emailid = '".$emailid."' ";
     $res = mysql_query($val);  
     $user_data = mysql_fetch_array($res); 
     $password_hash= $user_data['password'];

               if(password_verify($password, $password_hash)) //password securehash check
               {
                //print_r($user_data); 
                $no_rows = mysql_num_rows($res);  
                
                if ($no_rows == 1)   
                {  
                 
                    $_SESSION['login'] = true;  
                    $_SESSION['uid'] = $user_data['id'];  
                    $_SESSION['username'] = $user_data['username'];  
                    $_SESSION['email'] = $user_data['emailid'];  
                    $_SESSION['user_stat'] = $user_data['acnt_status']; 
                    return TRUE;  
                }  
                else  
                {  
                    return FALSE;  
                }  
            }
            else 
            {  
                return FALSE;  
            }   
            
        }  

        //Email Id Check
        public function isUserExist($emailid){  
            $qr = mysql_query("SELECT id FROM users WHERE emailid = '".$emailid."'");  
            $row = mysql_num_rows($qr);  
            if($row > 0){  
                return true;  
            } else {  
                return false;  
            }  
        }  
        
        
    }  
    ?>  
