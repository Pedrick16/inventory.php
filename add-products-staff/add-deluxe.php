<?php 
ob_start();

?> 

<?php

include_once("../connections/connection.php");
include_once("../base-staff.php");
$con = connection();
?>
   <link rel="stylesheet" href="../css/add.css?v=<?php echo time();?>">

<h1>Add Products</h1>
<br>

<form action="" method="post">


<label>Flavors</label>
<input type="text" name="flavor" id="lastname" required><br>

<label>size</label>
<select name="size" id="gender" required><br>
    <option></option>
    <option value="Cups 110 ml">Cups 110 ml</option>
    <option value="Pint 473 ml">Pint 473 ml</option>
    <option value="Half Gallon 1.9 L">Half Gallon 1.9 L</option>
    <option value="1 Gallon 3.8 L">1 Gallon 3.8 L</option>
</select>
<br>
<label>Price</label>
<input type="text" name="price" id="lastname" required>
<br>

<label>Available Stock</label>
<input type="number" name="stock" id="lastname" required><br>


<label>Category</label>
<select name="category" id="gender" required><br>
    <option></option>
    <option value="Male">Classic</option>
    <option value="Female">Special</option>
    <option value="Female">Deluxe</option>
    <option value="Female">Low Fat No Sugar</option>
</select>
<br>
<label>Status</label>
<select name="status"  required><br>
    <option></option>
    <option value="Male">Available</option>
    <option value="Female">N/A</option>
</select>
<br>

<input type="submit" name="submit" value="Add">
<a href="../product-list-admin/deluxe.php">Back</a>
<?php
        if(isset($_POST['submit'])){
    
            $flavor =  $_POST['flavor'];
            $size = $_POST['size'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $status= $_POST['status'];
           
        
            if(empty($flavor) || empty($size) || empty($price) || empty($stock)  || empty($status)){
                echo  "All fields are required";
            }else{
                $sql = "INSERT INTO `deluxe`( `flavor`, `size`, `price`,
                `available_stock`, `status`) VALUES ('$flavor','$size','$price','$stock','$status')";
                $con->query($sql) or die ($con->error);
    
                echo header("Location: ../staff-site/deluxe.php");
                ob_end_flush();
        
            }
        
           
        
        }
        
        
        ?>
</form>
