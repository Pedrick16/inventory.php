<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("../connections/connection.php");
    $con = connection();
$user = $_SESSION["UserLogin"];

function act_logout($user){
    $con = connection();
                $act = "logged-out";
                $sql = "INSERT INTO `act_logged_out`( `user_email`, `activity`) VALUES ('$user','$act')";
                $con->query($sql) or die ($con->error);
} 
?>


<?php
act_logout($user);
session_start();
unset($_SESSION['UserLogin']);
echo header("Location: ../index.php");
?>