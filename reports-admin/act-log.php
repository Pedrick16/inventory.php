<?php

include_once("../connections/connection.php");
include_once("../base.php");
$con = connection();
error_reporting(0);








// ORDER BY id DESC
$sql = "SELECT * FROM act_log ORDER BY id DESC";
$users = $con->query($sql) or die ($con->error);
$row = $users-> fetch_assoc();


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
    <table class="table">
        <thead>

            <tr>

                <th>Username-Email</th>
                <th>Activity</th>
                <th>Date and time Logged-in</th>
                <th>Activity</th>
                <th>Date and time Logged-out</th>
            </tr>
        </thead>
        <tbody>
        <?php do{ ?>
            <tr>

                <td><?php echo $row['user_email'];?></td>
                <td><?php echo $row['activity'];?></td>
                <td><?php echo $row['logged-in'];?></td>
            </tr>
            <?php }while($row = $users-> fetch_assoc())?>
        </tbody>
    </table>
</body>
</html>