<?php
ob_start();

?>

<?php
include_once("../connections/connection.php");
$con = connection();
include_once("../base-staff.php");
error_reporting(0);




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <h1>Change Password</h1>
        <br>
        <label>Email</label>
        <input type="email" name="email" required>
        <br>
        <label>Old Pssword</label>
        <input type="password" name="oldp" required>
        <br>
        <label for="">New Password</label>
        <input type="password" name="newp" required>
        <br>
        <label for="">Confirm Password</label>
        <input type="password" name="cpassword" required>

        <input type="submit" name="submit" value="Submit">



    </form>
<?php
    if(isset($_POST['submit'])){
    


    $email=  $_POST['email'];
    $old_p =  $_POST['oldp'];
    $new_p = $_POST['newp'];
    $cpaswword = $_POST['cpassword'];

    $sql = "SELECT * FROM users_account WHERE email = '$email' And password = '$old_p'";
    $users = $con->query($sql) or die ($con->error);
    $row = mysqli_fetch_array($users);
   
    if($row['email'] != $email And $row['password'] != $old_p){
        echo  "Your email or old password not exist";
    }elseif($new_p  != $cpaswword){
        echo  "Password did not match";
    }elseif($old_p == $new_p){
        echo  "Please Type new Password";
    }else{
        $sql = "UPDATE users_account SET password ='$new_p' WHERE email='$email'"  ;
        $con->query($sql) or die ($con->error);
        echo header("Location: ../staff-site/home.php");     
        ob_end_flush();
    }

}





?>
    
</body>
</html>