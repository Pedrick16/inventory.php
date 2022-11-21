<?php
ob_start();
?>

<?php
include_once("../connections/connection.php");
$con = connection();
include_once("../base.php");
error_reporting(0);


$sql = "SELECT * FROM archive ORDER BY id DESC";
$archive = $con->query($sql) or die ($con->error);
$row = $archive-> fetch_assoc();



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/archive.css?=<?php echo time();?>">
    <title>Document</title>
</head>
<body>
    <br>
    <h1  class="text-center">List of Archive Users</h1>
    <br>

<table class="table table-hover text-center">
        <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Access</th>
            <th>Status</th>
            <th></th>
     
         
      

        </tr>
        </thead>
        <tbody>
        <?php do{ ?>
        <tr>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['password'];?></td>
            <td><?php echo $row['access'];?></td>
            <td><?php echo $row['status'];?></td>
            <form  method="POST">
            <td><button class="btn btn-dark" type="submit" name="delete">Retrieve</button></td>
        
            <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
            <input type="hidden" name="username" value="<?php echo $row['username'];?>" >
            <input type="hidden" name="email" value="<?php echo $row['email'];?>" >
            <input type="hidden" name="password" value="<?php echo $row['password'];?>" >
            <input type="hidden" name="access" value="<?php echo $row['access'];?>" >
            <input type="hidden" name="status" value="<?php echo $row['status'];?>" >

            </form>

     
       
        </tr>
        <?php }while($row = $archive-> fetch_assoc())?>
        

        </tbody>
    </table>
    <?php
    if(isset($_POST['delete'])){
        $id = $_POST['ID'];
        $sql = "DELETE FROM archive WHERE id='$id'";
        $con->query($sql) or die ($con->error);
    
        //insert from archive
    
        $usern =  $_POST['username'];
        $email = $_POST['email'];
        $passw = $_POST['password'];
        $access = $_POST['access'];
        $stat = $_POST['status'];
    


        //error trapping
        if(empty($usern) || empty($email) || empty($passw) || empty($access) || empty($stat)){
            echo  "No Records Found!";
        }else{
            $sql = "INSERT INTO `users_account`( `username`, `email`, `password`, `access`, `status`) VALUES ('$usern','$email','$passw','$access','$stat')";
            $con->query($sql) or die ($con->error);
            echo header("Location: ../users/list-users-account.php");
            ob_end_flush();
           
            
           
        }
    
    

    }

    
    
    ?>
    
    
</body>
</html>