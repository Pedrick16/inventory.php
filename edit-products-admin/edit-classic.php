<?php
ob_start();

?>

<?php



include_once("../connections/connection.php");
$con = connection();
include_once("../base.php");

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
    <h1>EDIT CLASSIC</h1>

        <label>Price</label>
        <input type="text" name="price"  value="<?php echo $row['price'];?>"><br>

        <label>Available Stock</label>
        <input type="text" name="available-stock"  value="<?php echo $row['available_stock'];?>"><br>


        <label>Status</label>
        <select name="status" >
    
            <option value="Available" <?php echo ($row['status'] == "Available")? 'selected' : '';?>>Available</option>
            <option value="N/A" <?php echo ($row['status'] == "N/A")? 'selected' : '';?>>N/A</option>
        </select><br>

       

       
        
     
         
        <input type="submit" name="submit" value="Update">
        
       

        <a href="../product-list-admin/classic.php">Back</a>
        <br>    

        <?php
        if(isset($_POST['submit'])){
    
            $E_price = $row['price'];
            $E_status = $row['status'];
            $E_avail_stock = $row['available_stock'];
            $available_stock =  $_POST['available-stock'];
            $price =  $_POST['price'];
            $status = $_POST['status'];
           
        
        
            if($price == $E_price And $status == $E_status And $available_stock == $E_avail_stock){
                echo  "No changes found!";
            }else{
                $sql = "UPDATE classic SET price ='$price', available_stock=' $available_stock', status='$status' WHERE product_code ='$product_code'";
                $con->query($sql) or die ($con->error);
                echo header("Location: ../product-list-admin/classic.php");     
                ob_end_flush();
            }
        }
        
        
        
        ?>
       


    </form>
    
</body>
</html>