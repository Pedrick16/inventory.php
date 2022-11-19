
<?php
if(!isset($_SESSION)){
    ob_start();
   session_start();
}

include_once("../connections/connection.php");
include_once("../base-staff.php");
$con = connection();
$user = $_SESSION["UserLogin"];
error_reporting(0);

$sql = "SELECT * FROM pos WHERE list_user='$user'";
$cart = $con->query($sql) or die ($con->error);
$row = $cart-> fetch_assoc();
?>


  <h1 class="text-center pt-2">POS System</h1>
   <a href="../pos-category-staff/classic.php">Classic</a>
   <a href="../pos-category-staff/special.php">Special</a>
   <a href="../pos-category-staff/deluxe.php">Deluxe</a>
   <a href="../pos-category-staff/nosugar.php">No Sugar</a>
   <form method="POST">
   <button type="submit"  name="delete-all" >Clear All</button>
   </form>  
   
     

    <table class="table table-hover " >
        
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Description</th>
                <th>Size</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Cancel</th>
            </tr>
        </thead>
        <tbody>
        <?php
                $total = 0;
                
            ?>
      
        <?php do{ ?>
            <?php
                $total = $total + $row['total_amount'];
            ?>
           
            <tr>
                <td><?php echo $row['product_code'];?></td>
                <td><?php echo $row['flavor'];?></td>
                <td><?php echo $row['size'];?></td>
                <td><?php echo $row['price'];?></td>
                <td><?php echo $row['quantity'];?></td>
                <td><?php echo $row['total_amount'];?></td>
                <form method="POST">
                <td><button type="submit" name="cancel">cancel</button></td>
                <input type="hidden" name="ID" value="<?php echo $row['list_id'];?>">
                <input type="hidden" name="qty" value="<?php echo $row['quantity'];?>">
                <input type="hidden" name="avail_stock" value="<?php echo $row['available_stock'];?>">
                <input type="hidden" name="p_code" value="<?php echo $row['product_code'];?>">
                </form>
            </tr>
            
        <?php }while($row = $cart-> fetch_assoc())?>    
        
        </tbody>
    </table>
    <?php
    if(isset($_POST['delete-all'])){
        $d_list = "1";
        $sql = "DELETE FROM pos WHERE delete_list='$d_list'";
        $con->query($sql) or die ($con->error);
        echo "<meta http-equiv='refresh' content='0'>";

     


    }
    
    ?>

    <?php
    if(isset($_POST['cancel'])){
        $id = $_POST['ID'];
        $p_code = $_POST['p_code'];
        $qty_classic = $_POST['qty'];
        $avai_stock = $_POST['avail_stock'];

        $return_stock = $avai_stock + $qty_classic;
    


        $sql = "DELETE FROM pos WHERE list_id='$id'";
        $con->query($sql) or die ($con->error);

        $sql = "UPDATE classic SET  available_stock='$return_stock' WHERE product_code ='$p_code'";
        $con->query($sql) or die ($con->error);
        echo "<meta http-equiv='refresh' content='0'>";


    }

    ?>

    <form method="POST">
        <label>Total Amount</label>
        <input type="text" name="total_amount" value="<?php echo $total; ?>" disabled >
         

        <label>Payment</label>
        <input type="number" name="cash"  placeholder="0.00">

        <button type="submit" name="compute">Compute</button>
        <br>
    

     
    </form>
    
    <?php
    if(isset($_POST['compute'])){
      $t_amount = $total;
      $cash = $_POST['cash'];
      $change = $cash - $t_amount;
    
   
 
      if($cash < $t_amount){
        echo "Your Payment is not valid";
      }else{
        echo "total change: ".$change;
      }
    
    }
    ?>
    


   

