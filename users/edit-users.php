<?php
ob_start();


?>
<?php





include_once("../connections/connection.php");
$con = connection();
include_once("../base.php");

$id = $_GET['ID'];
$sql = "SELECT * FROM users_account WHERE id='$id' ";
$students = $con->query($sql) or die ($con->error);
$row = $students-> fetch_assoc();



   









?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add.css?v=<?php echo time();?>">
    <title>Document</title>
</head>
<body>

   


    <form action="" method="post">
    <h1>EDIT INFORMATION</h1>

        <label>Username</label>
        <input type="text" name="username" id="firstname" value="<?php echo $row['username'];?>"><br>

        <label>Email</label>
        <input type="text" name="email" id="lastname" value="<?php echo $row['email'];?>"><br>

        <label>Password</label>
        <input type="password" name="password" id="lastname" value="<?php echo $row['password'];?>"><br>

        <label>Access</label>
        <select name="access" id="">
            <option value="admin" <?php echo ($row['access'] == "admin")? 'selected' : '';?>>admin</option>
            <option value="staff" <?php echo ($row['access'] == "staff")? 'selected' : '';?>>staff</option>
        </select>
        <br>

        <label>Status</label>
        <select name="status" id="">
            <option value="active"  <?php echo ($row['status'] == "active")? 'selected' : '';?>>active</option>
            <option value="inactive"  <?php echo ($row['status'] == "inactive")? 'selected' : '';?>>inactive</option>
        </select>
        <br>
       
      
      
    
      
    
        <input type="submit" name="submit" value="Update">
       
        <a href="list-users-account.php">Back</a>
        <br>

        <?php
        if(isset($_POST['submit'])){
    
            $usern =  $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $access = $_POST['access'];
            $stat = $_POST['status'];
          
        
                 //  error trapping
            if(empty($usern) || empty($email) || empty($password) || empty($access) || empty($stat)  ){
                echo  "All fields are required";
            }else{
                //update to database
                $sql = "UPDATE users_account SET username ='$usern',email='$email', password='$password', access='$access', status='$stat' WHERE id ='$id'";
                $con->query($sql) or die ($con->error);
                echo header("Location: list-users-account.php");     
                ob_end_flush();  
        
            }
        }
        
        
        
        ?>
       


    </form>
    
</body>
</html>