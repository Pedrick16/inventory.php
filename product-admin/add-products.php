<?php 
ob_start();

?> 
<?php

include_once("../connections/connection.php");
include_once("../base.php");

$con = connection();
?>
   <link rel="stylesheet" href="../css/add.css?v=<?php echo time();?>">

<h1>Add Products</h1>

<form  method="POST">

<label>Product Code</label>
<input type="text" name="p_code"  required><br>



<label>Flavors</label>
<input type="text" name="flavor"  required><br>

<label>category</label>
<input type="text" name="category"  required><br>

<label>size</label>
<input type="text" name="size"  required><br>

<br>
<label>Price</label>
<input type="text" name="price"  required>
<br>

<label>Available Stock</label>
<input type="number" name="stock"  required><br>

<label>Status</label>
<select name="status" required>
    <option></option>
    <option value="Available">Available</option>
    <option value="N/A">N/A</option>
</select>
<br>

<input type="submit" name="submit" value="Add">
<a href="all-products.php">Back</a>
<?php
        if(isset($_POST['submit'])){
            $p_code =  $_POST['p_code'];
            $flavor =  $_POST['flavor'];
            $category =  $_POST['category'];
            $size = $_POST['size'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $stat= $_POST['status'];
           
        
            if(empty($p_code) ||empty($flavor) || empty($category) || empty($size) || empty($price) || empty($stock)  || empty($stat)){
                echo  "All fields are required";
            }else{
                $sql = "INSERT INTO `products`( `product_code`,`flavor`,`category`, `size`, `price`,`available_stock`, `status`) VALUES ('$p_code','$flavor','$category','$size','$price','$stock','$stat')";
                $con->query($sql) or die ($con->error);
                header("Location: all-products.php");
                ob_end_flush();
        
            }
        
           
        
        }
        
        
        ?>
</form>
