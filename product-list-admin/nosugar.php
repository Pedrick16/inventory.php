<?php

include_once("../connections/connection.php");
include_once("../base.php");
$con = connection();

$sql = "SELECT * FROM no_sugar ";
$category = $con->query($sql) or die ($con->error);
$row = $category-> fetch_assoc();

?>

<link rel="stylesheet" href="../css/products.css?=<?php echo time();?>">
<h1>Classic</h1>

<table>
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
            <td><button ><a href="../edit-products-admin/edit-classic.php?PRODUCT-CODE=<?php echo $row['product_code'];?>" id="edit">Edit</a></button></td>
        </tr>
        <?php }while($row = $category->fetch_assoc())?>
        </tbody>
    </table>
