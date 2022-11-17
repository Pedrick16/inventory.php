<?php
if(!isset($_SESSION)){
     ob_start();
    session_start();
}


include_once("../connections/connection.php");
include_once("../base.php");
$con = connection();

$user = $_SESSION["UserLogin"];


// if(isset($_SESSION['UserLogin'])){
//     echo "Wlcome: ".$_SESSION['UserLogin'];
// }else{
//     echo header("Location: ../index.php"); 
// }



$sql = "SELECT * FROM classic ";
$category = $con->query($sql) or die ($con->error);
$row = $category-> fetch_assoc();

?>




<link rel="stylesheet" href="../css/products.css?=<?php echo time();?>">
<style>
    p{
        text-align: right;
        color: red;
    }
</style>
<h1 class="text-center">Classic</h1>
<br>

<table class="table table-hover">
        <thead>
        <tr>
            <th>Product code </th>
            <th>Flavor</th>
            <th>Size</th>
            <th>Price</th>
            <th>Available Stock</th>
            <th>Status</th>
            <th>Quantity</th>
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

            <form  method="POST">
            <td><input type="number" name="quantity"  value="0"></td>
            <td><button type="submit" name="add-to-list">Add To List</button></td>
            <input type="hidden" name="product_code" value="<?php echo $row['product_code'];?>">
            <input type="hidden" name="flavor" value="<?php echo $row['flavor'];?>" >
            <input type="hidden" name="size" value="<?php echo $row['size'];?>">
            <input type="hidden" name="price" value="<?php echo $row['price'];?>">
            <input type="hidden" name="available_stock" value="<?php echo $row['available_stock'];?>">
            <input type="hidden" name="status" value="<?php echo $row['status'];?>">
            <input type="hidden" name="delete" value="1">
            </form>
        </tr>
        <?php }while($row = $category->fetch_assoc())?>
        </tbody>
    </table>


    <?php
       if(isset($_POST['add-to-list'])){
           $qty = $_POST['quantity'];
           $p_code = $_POST['product_code'];
           $flavor = $_POST['flavor'];
           $size= $_POST['size'];
           $price = $_POST['price'];
           $status = $_POST['status'];
           $delete_all = $_POST['delete'];
           
           $avail_stock = $_POST['available_stock'];
           //current stock minus quantity
           $diff = $avail_stock - $qty;

           $total_amount  =  $price * $qty;

        

           if(($qty == "0")){
            echo '<script>alert("No quantities found!")</script>';
           }elseif($status == "N/A"){ 
                //errpr trapping for null 
                 echo '<script>alert("This Product is not Available")</script>';
            }elseif($avail_stock == "0"){ 
                    //errpr trapping for null 
                     echo '<script>alert("No  Available stock")</script>';         
           }else{
            
            

            
            $sql = "INSERT INTO `pos`(`product_code`,`list_user`,`flavor`, `size`,`price`,`available_stock`,`quantity`,`total_amount`,`delete_list`) VALUES ('$p_code','$user','$flavor','$size','$price','$diff','$qty','$total_amount','$delete_all')";
            // $sql = "UPDATE pos SET product_code ='$p_code', flavor='$flavor', size ='$size', price='$price', available_stock='$diff',quantity='$qty',total_amount='$total_amount',delete_list='$delete_all' WHERE list_user ='$user'";
            $con->query($sql) or die ($con->error);
            


                //update
                $sql = "UPDATE classic SET available_stock ='$diff' WHERE product_code ='$p_code'";
                $con->query($sql) or die ($con->error);

               
                echo "<meta http-equiv='refresh' content='0'>";


            }


            





            
            //refresh for page
        }
        
       
    ?>
  

    
