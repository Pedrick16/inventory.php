<?php
include_once("../connections/connection.php");
include_once("../base.php");
$con = connection();

$sql = "SELECT * FROM users_account";
$users = $con->query($sql) or die($con->error);
$row = $users->fetch_assoc();
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
    <br>
    <table class="table table-hover text-center">
        
        <h1 class="text-center">List of Users</h1>
        <br>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Access</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php do{ ?>
            <tr>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['access']?></td>
                <td><?php echo $row['status']?></td>
            </tr>
            <?php }while($row = $users-> fetch_assoc())?>
        </tbody>
    </table>
</body>
</html>

