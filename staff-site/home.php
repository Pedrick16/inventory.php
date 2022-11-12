
<?php
if(!isset($_SESSION)){
    session_start();
}


include_once("../connections/connection.php");
include_once("../base-staff.php");
$con = connection();

if(isset($_SESSION['UserLogin'])){
    echo "Welcome  ".$_SESSION['UserLogin'];
}else{
       echo"welcome Guest";
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            background-image: url('../image/neapolitan-ice-cream-15779155.jpg');
        }

        h1{
            font-style: oblique;
        }
    </style>
</head>
<body>
    <h1 class="text-center"> Welcome Staff!</h1>
</body>
</html>