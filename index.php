


<?php

error_reporting(0);
if(!isset($_SESSION)){
    session_start();
}

include_once("connections/connection.php");
$con = connection();




if(!isset($_SESSION)){
    session_start();
}






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

    <!-- <style>
      body{
        background-image: url('../image/neapolitan-ice-cream-15779155.jpg');
        z-index: -50;
     
      }
    </style> -->
</head>

<body>
    <form  method="POST">
        <h1>LOGIN SYSTEM</h1>

        <label>Email/Username</label>
        <input type="text" name="email" >

        <label>Password</label>
        <input type="password" name="password" >

    
        <input type="submit" name="login"value="Login">
        <br>
      
        

    
        <?php   
        if(isset($_POST['login'])){
        
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $sql = "SELECT * FROM users_account WHERE username= '$email' || email = '$email'  And password = '$password'";
            $user = $con->query($sql) or die ($con->error);
            $row = mysqli_fetch_array($user);
            // $total = $user->num_rows; 
            
            
            
            
            if($row["access"] == "admin"){
                $_SESSION["UserLogin"]=$row['username'];
                echo header("Location: users/list-users-account.php");
            }elseif($row["access"] == "staff"){
                $_SESSION["UserLogin"]=$row['username'];
                echo header("Location: ../site-resellers/products.php");
            }else{
                echo "Sorry your Username and Password is incorrect";
            }
            
            }
        ?>
    </form>    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>