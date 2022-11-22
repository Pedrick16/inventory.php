<?php

include_once("../connections/connection.php");
$con = connection();
error_reporting(0);

$product_code = $_GET['PRODUCT-CODE'];

$sql = "SELECT * FROM pos WHERE product_code='$product_code' ";
$product = $con->query($sql) or die ($con->error);
$row = $product-> fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      

        h2{
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
             
        }

    </style>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    <form method="POST" class="text-center pt-5" >
    <h2 >Do you really want to cancel?</h1>
    <br>
    <button class="btn btn-danger" type="submit" name="cancel">Yes</button>
    <a href="index.php" class="btn btn-danger">No</a>

    <input type="hidden" name="ID" value="<?php echo $row['list_id'];?>">
    <input type="hidden" name="qty" value="<?php echo $row['quantity'];?>">
    <input type="hidden" name="avail_stock" value="<?php echo $row['available_stock'];?>">
    <input type="hidden" name="p_code" value="<?php echo $row['product_code'];?>">
    
    </form>
  
    
    <?php
    if(isset($_POST['cancel'])){
        $id = $_POST['ID'];
        $p_code = $_POST['p_code'];
        $qty_classic = $_POST['qty'];
        $avai_stock = $_POST['avail_stock'];

        $return_stock = $avai_stock + $qty_classic;
      
       
       
    
        $sql = "DELETE FROM pos WHERE list_id='$id'";
        $con->query($sql) or die ($con->error);

        $sql = "UPDATE products SET  available_stock='$return_stock' WHERE product_code ='$p_code'";
        $con->query($sql) or die ($con->error);
         echo header("location: index.php");
        echo "<meta http-equiv='refresh' content='0'>";

          
    }

    ?>
        

    
  
        

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>