
<?php
if(!isset($_SESSION)){
    ob_start();
    session_start();
}


include_once("../connections/connection.php");
include_once("../base.php");
$con = connection();

if(isset($_SESSION['UserLogin'])){
    echo "Welcome  ".$_SESSION['UserLogin'];
}else{
    echo header("Location: ../index.php"); 
}








// ORDER BY id DESC
$sql = "SELECT * FROM users_account ORDER BY id DESC";
$users = $con->query($sql) or die ($con->error);
$row = $users-> fetch_assoc();


?>

    <link rel="stylesheet" href="../css/listreseller.css?v=<?php echo time();?>">
    <style>
        #edit{
            text-decoration: none;
            color: black;
        }
    </style>

    <h1 class="text-center">List of Users</h1>
    <br>

    <div class="new">
     <a href="../users/add-users-account.php">Add Account</a>
    </div>
    <!-- <?php
   echo date('m/d/Y h:i:s a', time());
    ?> -->


    <table class="table table-hover">
        <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Access</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Archive</th>
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
            <td><button ><a href="edit-users.php?ID=<?php echo $row['id'];?>"id="edit">Edit</a></button></td>
        
            </form> 

            <form  method="POST">
            <td><button type="submit" name="delete">Archive</button></td>
        
            <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
            <input type="hidden" name="username" value="<?php echo $row['username'];?>" >
            <input type="hidden" name="email" value="<?php echo $row['email'];?>" >
            <input type="hidden" name="password" value="<?php echo $row['password'];?>" >
            <input type="hidden" name="access" value="<?php echo $row['access'];?>" >
            <input type="hidden" name="status" value="<?php echo $row['status'];?>" >

            </form>

        </tr>
        <?php }while($row = $users-> fetch_assoc())?>
        

        </tbody>
    </table>
    
  
    <?php
    if(isset($_POST['delete'])){

       
        
        $id = $_POST['ID'];
        $sql = "DELETE FROM users_account WHERE id='$id'";
        $con->query($sql) or die ($con->error);
       
   
    
        // insert from archive
        $Usern =  $_POST['username'];
        $email = $_POST['email'];
        $passw = $_POST['password'];
        $access = $_POST['access'];
        $stat = $_POST['status'];
    



        // error trapping
        if(empty($Usern) || empty($email) || empty($passw) || empty($access) || empty($stat)){

            //errpr trapping for null 
            echo  "No Records Found!";
        }else{
            $sql = "INSERT INTO `archive`(`username`, `email`, `password`, `access`,`status`) VALUES ('$Usern','$email', '$passw','$access','$stat')";
            $con->query($sql) or die ($con->error);
            echo "<meta http-equiv='refresh' content='0'>";
            
            //refresh for page
           
        }
    
    

    }

    
    
    ?>

    


    






