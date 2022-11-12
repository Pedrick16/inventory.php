<?php
ob_start();

?>

<?php



include_once("../connections/connection.php");
$con = connection();
include_once("../base-staff.php");

$product_code = $_GET['PRODUCT-CODE'];
$sql = "SELECT * FROM classic WHERE product_code='$product_code' ";
$product = $con->query($sql) or die ($con->error);
$row = $product-> fetch_assoc();



   









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
    <h1>Add Stock CLASSIC</h1>
        <?php
        echo "Product Code: "." ".$product_code;
        ?>
        <br>
        <label>Add stock</label>
        <input type="text" name="stock"><br>

    

       

       
        
     
         
        <input type="submit" name="submit" value="Add">
       
        <a href="../inventory-staff/classic.php">Back</a>
        <br>    

        <?php
        if(isset($_POST['submit'])){
    
      
            $stock = $_POST['stock'];

            $E_stock = $row['available_stock'];

            $sum = $stock +  $E_stock;
           
        
        
            if(empty($stock)){
                echo  "all field are required";
            }else{
                $sql = "UPDATE classic SET available_stock ='$sum' WHERE product_code ='$product_code'";
                $con->query($sql) or die ($con->error);
                echo header("Location: ../inventory-staff/classic.php");       
                ob_end_flush();
            }
        }
        
        
        ?>
       


    </form>
    
</body>
</html>