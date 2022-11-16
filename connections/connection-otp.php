<?php

function connection_otp(){
     $host= "localhost";
     $username= "root";
     $password= "123456";
     $database= "otp_login";

     $con = new mysqli($host, $username, $password,$database);
     if($con -> connect_error){
        echo $con -> connect_error;
      }else{
        return $con;
      }
}

?>