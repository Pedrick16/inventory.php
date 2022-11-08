<?php



include_once("../connections/connection.php");
$con = connection();
include_once("../base.php");

$id = $_GET['ID'];
$sql = "SELECT * FROM student_list WHERE id='$id' ";
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

        <label>First Name</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $row['first_name'];?>"><br>

        <label>Last Name</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo $row['last_name'];?>"><br>

        <label>Gender</label>
        <select name="gender" id="gender">
            <option value="Male" <?php echo ($row['gender'] == "Male")? 'selected' : '';?>>Male</option>
            <option value="Female" <?php echo ($row['gender'] == "Female")? 'selected' : '';?>>Female</option>
        </select><br>
    

        <label>Contact No</label>
        <input type="text" name="contactnumber" id="contactnumber"value="<?php echo $row['contact_no'];?>"><br>

        <label>Address</label>
        <input type="text" name="address" id="address" value="<?php echo $row['address'];?>"><br>
        

        
        <label>Email</label>
        <input type="text" name="email" id="address" value="<?php echo $row['email_address'];?>"><br>
        

        
        
        

        <input type="submit" name="submit" value="Update">
       
        <a href="listresellers.php">Back</a>
        <br>

        <?php
        if(isset($_POST['submit'])){
    
            $fname =  $_POST['firstname'];
            $lname = $_POST['lastname'];
            $gen = $_POST['gender'];
            $cnum = $_POST['contactnumber'];
            $ads = $_POST['address'];
            $email = $_POST['email'];
        
        
            if(empty($fname) || empty($lname) || empty($gen) || empty($cnum) || empty($ads) ||  empty($email)  ){
                echo  "All fields are required";
            }else{
                $sql = "UPDATE student_list SET first_name ='$fname',last_name='$lname', gender='$gen', contact_no='$cnum', address='$ads', email_address='$email' WHERE id ='$id'";
                $con->query($sql) or die ($con->error);
           
                echo header("Location: ../resellers/listresellers.php");       
        
            }
        }
        
        
        
        ?>
       


    </form>
    
</body>
</html>