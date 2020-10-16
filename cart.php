<?php
include 'header.php';
if (isset($_SESSION['userEmail'])) {
  $userEmail = $_SESSION['userEmail'];
  $runQuery = mysqli_query($con, "select * from info where email = '$userEmail'");
  $userData = mysqli_fetch_array($runQuery);
}
$currentURL = substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1);
      $message = '';
      $total = 0;
      $detailid = 0;
    // It will execute only when Add to cart button is clicked in description page   
      if(isset($_POST["add"])){          
        $GLOBALS['detailid']  = $_GET['detailid']; 
        $callingURL = $_POST['callingURL'];
          // if user is logged in then it will store cart info into cart table in db
        if (isset($_SESSION['userEmail'])) {
          $userEmail = $_SESSION['userEmail'];
          $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT id FROM info WHERE email = '$userEmail'"));
          $userid = $user['id'];
          $pid  = (int)$_GET['pid'];
          $quantity = (int)$_POST['qty'];
          $getCartItem = mysqli_query($con, "SELECT pid FROM cart WHERE userid = $userid");
          $itemAlreadyExist = false;
          while($cartItem = mysqli_fetch_assoc($getCartItem)){
            if ($cartItem['pid'] == $GLOBALS['pid']) {
              $itemAlreadyExist = true;
            }
          }
          // if the requested product for cart is already in cart table for same user then it'll increase the quantity else insert product in cart table
          if ($itemAlreadyExist) {
            mysqli_query($con, "UPDATE cart SET quantity = quantity + $quantity WHERE pid = $pid AND userid = $userid");  
          } else {
            mysqli_query($con, "INSERT INTO cart(userid, pid, quantity) VALUES($userid, $pid, $quantity)"); 
          }     
        } else {  // this is when user is not logged in 
          if(isset($_COOKIE["shopping_cart"])){    // it checks that wheather the cookie is previously created or not
            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
            $cart_data = json_decode($cookie_data, true);
          } else {
            $cart_data = array();
          }
          $item_id_list = array_column($cart_data, 'item_id');   // checking the requested product id in the cookie

          if(in_array($_GET["pid"], $item_id_list)){
            foreach($cart_data as $keys => $values){
              if($cart_data[$keys]["item_id"] == $_GET["pid"]){   // if the same product is available in cart cookie then it'll increase the quantity
                $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["qty"];
              }
            }
          } else {   // getting product details from description page
            $item_array = array(
              'item_id'   => $_GET["pid"],
              'item_name'   => $_POST["hiddenname"],
              'item_price'  => $_POST["hiddenprice"],
              'item_quantity'  => $_POST["qty"]
            );
            $cart_data[] = $item_array;
          }
          $item_data = json_encode($cart_data);
          setcookie('shopping_cart', $item_data, time() + (86400 * 30));  // setting cookie variable for 1 month duration
        } 
        header('location:'.$callingURL.'&success=1'); // going back to the same url from where cart request was sent
      }

      if(isset($_GET["action"])){ // user actiona 
        if($_GET["action"] == "delete"){  // when remove button clicked for any specific item from cart
          if (isset($_SESSION['userEmail'])) {  // checking is user logged in or not 
            $pid = $_GET['pid'];
            $userEmail = $_SESSION['userEmail']; // if user logged in and want to remove item from cart, it'll delete from cart table
            mysqli_query($con, "DELETE FROM cart WHERE pid = $pid and userid IN (select id from info where email = '$userEmail')");
          } else{
            $cookie_data = stripslashes($_COOKIE['shopping_cart']); // if user is not logged in item will be removed from cookie data
            $cart_data = json_decode($cookie_data, true);
            foreach($cart_data as $keys => $values){
              if($cart_data[$keys]['item_id'] == $_GET["pid"]){
                unset($cart_data[$keys]);
                $item_data = json_encode($cart_data);
                setcookie("shopping_cart", $item_data, time() + (86400 * 30));
                header("location:cart.php?remove=1");
              } 
            }
          }  
        }
        if($_GET["action"] == "clear"){ // when clear cart button is clicked
          if (isset($_SESSION['userEmail'])) {
            $userEmail = $_SESSION['userEmail']; // clear all items for currently logged in user from cart table
            mysqli_query($con, "DELETE FROM cart WHERE userid IN (SELECT id FROM info WHERE email = '$userEmail')");
          } else{
            setcookie("shopping_cart", "", time() - 3600); // unset the cookie variable
            $_SESSION['cartitems'] = 0;
          }
          header("location:cart.php?clearall=1");
        }
      }

      if(isset($_GET["remove"])){
        $message = '
        <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Item removed from Cart
        </div>
        ';
      }
      if(isset($_GET["clearall"])){
        $message = '
        <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Your Shopping Cart has been clear...
        </div>
        ';
      }
    ?>

      <!-- <div style="clear:both"></div><br /> -->
      <div class="container">
        <h4 class="text-info text-center mt-3">Your cart items</h4>
        <div class="table-responsive">
          <?php echo $message; ?>
          <div align="right">
            <a href="cart.php?action=clear" class="btn btn-danger"><b>Clear Cart</b></a>
          </div> 
          <br>
          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th width="30%">Item Name</th>
                <th width="30%">Quantity</th>
                <th width="20%">Price</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
              </tr>
            </thead>
            <?php

            if (isset($_SESSION['userEmail'])) {
              $userEmail = $_SESSION['userEmail'];
              $runQuery = mysqli_query($con, "select * from cart where userid IN (select id from info where email = '$userEmail')");
              if (mysqli_num_rows($runQuery) > 0) {
                while($cartitems = mysqli_fetch_assoc($runQuery)){
                  getCartItemDetails($cartitems['pid'], $cartitems['quantity'], $con);
                }  
              } else {
                echo "
                <tr style='text-align:center;'>
                <td>Your Cart is empty...</td>
                </tr>
                ";
              }

            } else {
              if(isset($_COOKIE["shopping_cart"])){
                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);
                $_SESSION['cartitems'] = count($cart_data);
                foreach($cart_data as $keys => $values){
                  ?>
                  <tbody>
                    <tr>
                      <td width="30%"><a href="description.php?pId=<?php echo $values["item_id"]; ?>"> <?php echo $values["item_name"]; ?></a></td>
                      <td width="30%">
                        <button name="btnMinus" class="btn-danger" style="position: relative; margin-right: -20px;"><i class="fa fa-minus"></i></button>
                        <input type="text" name="quantity" value="<?php echo $values["item_quantity"]; ?>" style="position: absolute; margin-left: 20px; width: 40px; padding-left: 10px;" readonly>
                        <button name="btnPlus" class="btn-success" style="position: relative; margin-left: 64px;"><i class="fa fa-plus"></i></button>
                      </td>
                      <td width="20%"><?php echo $values["item_price"]; ?> INR</td>
                      <td width="15%"><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> INR</td>
                      <td width="5%"><a href="cart.php?action=delete&pid=<?php echo $values["item_id"]; ?>" class="btn btn-danger">Remove</a></td>
                    </tr>
                  </tbody>
                  <?php
                  $total = $total + ($values["item_quantity"] * $values["item_price"]);
                }
                ?>

          <!-- <tr>
            <td colspan="3" align="right">Total</td>
            <td align="right"><?php echo number_format($total, 2); ?> INR</td>
          </tr> -->
          <?php
        }
        else {
          echo '
          <tr>
          <td colspan="5" align="center">No Item in Cart</td>
          </tr>
          ';
        }
      }

      function getCartItemDetails($pid, $qty, $con){
        $pid = (int)$pid;
        $run = mysqli_query($con, "select * from productdetail where pid = $pid");
        if (mysqli_num_rows($run) < 1) {
          echo "No item in your cart...";
        } else {
          $item = mysqli_fetch_assoc($run);
          ?>
          <tr>
            <td width="30%"><a href="description.php?pId=<?php echo $pid;?>"><?php echo $item["productname"]; ?></a></td>
            <td width="30%">
              <button id="decQuantity" class="btn-danger" style="position: relative; margin-right: -20px;"><i class="fa fa-minus"></i></button>
              <input type="text" name="quantity" id="itemQuantity" value="<?php echo $qty; ?>" style="position: absolute; margin-left: 20px; width: 40px; padding-left: 10px;">
              <button id="incQuantity" class="btn-success" style="position: relative; margin-left: 64px;"><i class="fa fa-plus"></i></button>
              <input type="hidden" id="productId" value="<?php echo $pid;?>">
            </td>
            <td width="20%"><span id="itemPrice"><?php echo $item["price"]; ?></span> INR</td>
            <td width="15%"><span id="totalPrice"><?php echo $qty * $item["price"];?></span> INR</td>
            <td width="5%"><a href="cart.php?action=delete&pid=<?php echo $pid; ?>" class="btn btn-danger"><span>Remove</span></a></td>
          </tr>
          <?php
          $GLOBALS['total']  = $GLOBALS['total']  + ($qty * $item["price"]);
        } 
      }
      ?>
      <tr>
        <td colspan="3" align="right">Sub Total</td>
        <td align="right"><?php echo number_format($GLOBALS['total'], 2); ?> INR</td>
      </tr>
    </table>

  </div>
</div>


<?php  if (isset($_SESSION['userEmail'])) { ?>

  <div class="container">
    <form method="POST" action="./order.php">
      <input type="hidden" name="txnAmount" value="<?php echo $GLOBALS['total']; ?>">
      <input type="hidden" name="pid" value="<?php echo $cartitems['pid']; ?>">
      <input type="hidden" name="quantity" value="<?php echo $cartitems['quantity']; ?>">
      <button name="btnCheckout" class="btn btn-success">Buy Now</button>	
    </form>
  </div>

<?php  } ?>

  <script>
      $(document).ready(function(){
        // alert($("#totalPrice").text());
          var quantity = $("#itemQuantity").val();
          var pid = $("#productId").val();
        $("#incQuantity").click(function(){
          alert('This functionality is not available right now');
        });
        $("#decQuantity").click(function(){
            alert('This functionality is not available right now');
        });
      });
  </script>

<?php
  include 'footer.php'
?>