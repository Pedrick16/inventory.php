<?php

include_once("../connections/connection.php");
include_once("../base-staff.php");
$con = connection();

$sql = "SELECT * FROM products ";
$category = $con->query($sql) or die ($con->error);
$row = $category-> fetch_assoc();
?>
<style>
        #add{
            text-decoration: none;
            color: white;
        }
</style>



<table class="table table-hover text-center">
        <thead>
        <tr>
            <th>Product code </th>
            <th>Flavor</th>
            <th>Category</th>
            <th>Size</th>
            <th>price</th>
            <th>Available Stock</th>
            <th>Status</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php do{ ?>
        <tr>
            <td><?php echo $row['product_code'];?></td>
            <td><?php echo $row['flavor'];?></td>
            <td><?php echo $row['category'];?></td>
            <td><?php echo $row['size'];?></td>
            <td><?php echo $row['price'];?></td>
            <td><?php echo $row['available_stock'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><button class="btn btn-dark"><a href="../add-inventory-admin/add-stock-products.php?PRODUCT-CODE=<?php echo $row['product_code'];?>" id="add">Add Stock</a></button></td>
            <
        </tr>
        <?php }while($row = $category->fetch_assoc())?>
        </tbody>
    </table>
