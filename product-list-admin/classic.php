<?php
if(!isset($_SESSION)){
    ob_start();
    session_start();
}


include_once("../connections/connection.php");
include_once("../base.php");
$con = connection();

if(isset($_SESSION['UserLogin'])){
    echo "";
}else{
    echo header("Location: ../index.php"); 
}



$sql = "SELECT * FROM classic ";
$category = $con->query($sql) or die ($con->error);
$row = $category-> fetch_assoc();
?>

<!-- <link rel="stylesheet" href="../css/style.css?=<?php echo time();?>"> -->
<br>
<h1 class="text-center ">Classic</h1>
<br>
<a  href="../add-products-admin/add-classic.php">Add Product</a>


<table class="table table-hover text-center">
        <thead>
        <tr>
            <th>Product code </th>
            <th>Flavor</th>
            <th>Size</th>
            <th>Price</th>
            <th>Available Stock</th>
            <th>Status</th>
            <th></th>
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
            <td><button  class="btn btn-light" ><a href="../edit-products-admin/edit-classic.php?PRODUCT-CODE=<?php echo $row['product_code'];?>" id="edit">Edit</a></button></td>
        </tr>
        <?php }while($row = $category->fetch_assoc())?>
        </tbody>
    </table>
