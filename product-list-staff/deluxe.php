<?php

include_once("../connections/connection.php");
include_once("../base-staff.php");
$con = connection();

$sql = "SELECT * FROM classic ";
$category = $con->query($sql) or die ($con->error);
$row = $category-> fetch_assoc();

?>

<link rel="stylesheet" href="../css/products.css?=<?php echo time();?>">
<h1>Deluxe</h1>
<br>
<a href="../add-products-staff/add-deluxe.php">Add Product</a>
<table class="table table-hover">
        <thead>
    
        <tr>
            <th>Product code </th>
            <th>Flavor</th>
            <th>Size</th>
            <th>Price</th>
            <th>Available Stock</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php do{ ?>
        <tr>
            <td><?php echo $row['product_code'];?></td>
            <td><?php echo $row['flavor'];?></td>
            <td><?php echo $row['size'];?></td>
            <td><?php echo $row['price'];?></td>
            <td><?php echo $row['available_stock'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><button ><a href="../edit-products-staff/edit-deluxe.php?PRODUCT-CODE=<?php echo $row['product_code'];?>" id="edit">Edit</a></button></td>
            
        <?php }while($row = $category->fetch_assoc())?>
        </tbody>
    </table>
