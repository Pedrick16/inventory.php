<?php
if(!isset($_SESSION)){
    ob_start();
    session_start();
}


include_once("../connections/connection.php");
include_once("../base-staff.php");
$con = connection();
error_reporting(0);


if(isset($_SESSION['UserLogin'])){
    echo "";
}else{
    echo header("Location: ../index.php"); 
}


if(isset($_POST['search'])){

    

    $search = $_POST['search'];
    $sql = "SELECT * FROM products WHERE category='$search' || flavor='$search'  || status='$search' ";
    $category = $con->query($sql) or die ($con->error);
    $row = $category-> fetch_assoc();



}else{
    $sql = "SELECT * FROM products ";
    $category = $con->query($sql) or die ($con->error);
    $row = $category-> fetch_assoc();

}






?>

<style>
        #edit{
            text-decoration: none;
            color: white;
        }
</style>


<a href="add-products.php">Add Product</a>

<form method="POST" class="text-end px-4">
    
    <input type="text" name="search" placeholder="Search Products">
    <button class="btn btn-dark" type="submit">Search</button>
</form>      



    


<table class="table table-hover text-center">
        <thead>
        <tr>
            <th>Product code </th>
            <th>Flavor</th>
            <th>Category</th>
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
            <td><?php echo $row['category'];?></td>
            <td><?php echo $row['size'];?></td>
            <td><?php echo $row['price'];?></td>
            <td><?php echo $row['available_stock'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><button class="btn btn btn-dark" id="edit"><a href="edit-products.php?PRODUCT-CODE=<?php echo $row['product_code'];?>" id="edit">Edit</a></button></td>
        </tr>
        <?php }while($row = $category->fetch_assoc())?>
        </tbody>
    </table>
</form> 



    
 
