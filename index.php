

<?php

if(!isset($_SESSION)){
    session_start();
}


include_once("connections/connection.php");
$con = connection();
error_reporting(0);

$id_session = $_SESSION["ID"];









?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="../css/login.css?v=<?php echo time();?>">
    <title>Document</title>

    <style>
      body{
        background-image: url('image/neapolitan-ice-cream-15779155.jpg');

        display: grid;
     /* height: 100vh;    */
        place-items: center;
      }

      label{
        color: black;
        font-weight: bolder;
      }
      h1{
        text-align: center;
        font-weight: bolder;
      }

      p{
       
        color: red;
        text-align: center;
      }
     
      .header{
      
  
        color:white;
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        letter-spacing: 5px;
        text-transform: uppercase;
        font-size: 50px;
        -webkit-text-fill-color: black;
        -webkit-text-stroke-width:2px;
   
        
        
    }

      .greet{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin: 0;
        padding: 0;
        color:whitesmoke;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        letter-spacing: 10px;
        text-transform: uppercase;
        font-size: 100px;
        -webkit-text-fill-color: black;
        -webkit-text-stroke-width:2px;
   
        
        
    }
    </style>
</head>

<body>

<h1 class="greet">Scoops4u</h1>
  
    <form  method="POST">
        <h1 class="header">LOGIN SYSTEM</h1>

        <label><strong>Username</strong></label>
        <input type="text" name="username" placeholder="Enter username or email" >

        <label><strong>Password</strong></label>
        <input type="password" name="password" placeholder="Enter your Password" >
        <button  class="btn btn-dark" type="submit" name="login">Login</button>
        
        <br>
      
    </form>    
    <?php   
        if(isset($_POST['login'])){
        
            $username = $_POST['username'];
            $password = $_POST['password'];
           
            
            $sql = "SELECT * FROM users_account WHERE username = '$username'  And password = '$password'";
            $user = $con->query($sql) or die ($con->error);
            $row = mysqli_fetch_array($user);
 

            function activy_log(){  
                
                $con = connection();
                $act = "logged-in";
                $username = $_POST['username'];
                $sql = "INSERT INTO `act_log`(`user_email`, `activity`) VALUES ('$username','$act')";
                $con->query($sql) or die ($con->error);
            }
            
            
            
            if($row["access"] == "admin" And $row["status"] == "active"){
                // pos_user();
                activy_log();
                $_SESSION["UserLogin"] =$row['username'];
                $_SESSION["ID"] =$row['id'];
              
                echo header("Location: users/list-users-account.php");
                
            //  echo header("Location: otp/otp-base-admin.php");   
             
             
            }elseif($row["access"] == "staff" And $row["status"] == "active"){
          
                activy_log($id_session);
                $_SESSION["UserLogin"] =$row['username'];
                
                echo header("Location: staff-site/home.php");
                // echo header("Location: otp/otp-base.php");
            }elseif($row["status"] == "inactive"){
                echo "<p>This account does not Active</p>";
            }else{
                echo "<p>Sorry your Username and Password is incorrect</p>";
            }
            
            }
        ?>
       

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>