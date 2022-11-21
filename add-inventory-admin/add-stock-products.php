<?php
ob_start();

?>

<?php



include_once("../connections/connection.php");
$con = connection();
include_once("../base.php");

$product_code = $_GET['PRODUCT-CODE'];
$sql = "SELECT * FROM products WHERE product_code='$product_code' ";
$product = $con->query($sql) or die ($con->error);
$row = $product-> fetch_assoc();



   









?>







   


    <form  method="POST">
        <h1>Add Stock Products</h1>
        <?php
        echo "Product Code: "." ".$product_code;
        ?>
        <br>
        <label>Add stock</label>
        <input type="text" name="stock"><br>

    
         
        <input type="submit" name="submit" value="Add">
       
        <a href="../inventory-admin/add-stock-products.php">Back</a>
        <br>    
        </form>

        <?php
        if(isset($_POST['submit'])){
    
      
            $stock = $_POST['stock'];

            $E_stock = $row['available_stock'];

            $sum = $stock +  $E_stock;
           
        
        
            if(empty($stock)){
                echo  "all field are required";
            }else{
                $sql = "UPDATE products SET available_stock ='$sum' WHERE product_code ='$product_code'";
                $con->query($sql) or die ($con->error);
                echo header("Location: ../inventory-admin/add-stock-products.php");       
                ob_end_flush();
            }
        }
        
        
        ?>
       


  
    
