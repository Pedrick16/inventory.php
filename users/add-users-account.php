<?php


include_once("../connections/connection.php");
include_once("../connections/connection-otp.php");



$con = connection();
$conn = connection_otp();

$sql = "SELECT * FROM users_account ";
$students = $con->query($sql) or die ($con->error);
$row = $students-> fetch_assoc();

?>

<link rel="stylesheet" href="../css/add.css?v=<?php echo time();?>">

<form  method="POST">
  
    <h1>Registration for Account</h1>
        

        <label>Username</label>
        <input type="text" name="username" >
        <br>

        <label>Email</label>
        <input type="text" name="email" >
        <br>

        <label>Password</label>
        <input type="password" name="password">
        <br>

        <label>Confirm Password</label>
        <input type="password" name="confirm" id="password">
        <br>

        <label>Usertype</label>
        <select name="usertype" id="gender">
            <option></option>
            <option value="admin">admin</option>
            <option value="staff">staff</option>
        </select>
        <br>
        <label>Status</label>
         <select name="status" id="">
            <option></option>
            <option value="active">active</option>
            <option value="inactive">inactive</option>
         </select>
         <br>

        <input type="submit" name="submit" value="Create">
       
        
    </form>
    

    <a href="list-users-account.php">Back</a>
    <br>
        <?php
     
        if(isset($_POST['submit'])){
      
            $usern =  $_POST['username'];
            $email =  $_POST['email'];
            $passw = $_POST['password'];
            $cpassw = $_POST['confirm'];
            $userty = $_POST['usertype'];
            $stat = $_POST['status'];
 
           

            if(empty($usern) || empty($email) || empty($passw)  || empty($userty)){
                echo  "All fields are required";
            }elseif($row['username'] == $usern OR $row['email'] == $email ){
                echo  "Username or Email already exist";    
            }elseif($passw != $cpassw){
                echo  "Password did not match";
            }else{
                $sql = "INSERT INTO `users_account`( `username`, `email`, `password`, `access`,`status`) VALUES ('$usern', '$email', '$passw', '$userty', '$stat')";
                $con->query($sql) or die ($con->error);

                $sql = "INSERT INTO `user`(`email`) VALUES ('$email')";
                $conn->query($sql) or die ($con->error);
                echo header("Location: ../users/list-users-account.php");
             
        
            }
        
        }
        
        
        ?>
        
    
           
        

    
