<?php

	include "db.php";
	session_start();

	if (isset($_POST['click'])) {
		$userEmail = $_POST['email'];
		$userPassword = $_POST['password'];
		$sql = "SELECT * FROM info where email = '$userEmail' AND password = '$userPassword'";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) {
			if (isset($_COOKIE['shopping_cart'])) {
				$user = mysqli_fetch_array($result);
  				$cookie_data = stripslashes($_COOKIE['shopping_cart']);
    			$cart_data = json_decode($cookie_data, true);
    			foreach($cart_data as $keys => $value){
    				$userid = (int)$user['id'];
    				$pid = (int)$value['item_id'];
    				$qty = (int)$value['item_quantity'];
    				$getCartItem = mysqli_query($con, "SELECT pid FROM cart WHERE userid = $userid");
        			$itemAlreadyExist = false;
        			while($cartItem = mysqli_fetch_assoc($getCartItem)){
          				if ($cartItem['pid'] == $pid) {
            				$itemAlreadyExist = true;
         		 		}
        			}
        			if ($itemAlreadyExist) {
          				mysqli_query($con, "UPDATE cart SET quantity = quantity + $qty WHERE pid = $pid AND userid = $userid");  
        			} else {
          				mysqli_query($con, "INSERT INTO cart(userid, pid, quantity) VALUES($userid, $pid, $qty)"); 
        			}  
    			}
    			setcookie("shopping_cart", "", time() - 3600);
          		$_SESSION['cartitems'] = 0;
			}
  			$_SESSION['userEmail'] = $userEmail;
        if (isset($_POST['callingURL'])) {
          $callingURL = $_POST['callingURL'];
          echo "<script>window.location.href='".$callingURL."'</script>";
        } else {
          echo "<script>window.location.href='index.php'</script>";
        }
  		}
		else {
  			echo "<script>alert('Please enter correct Email and Password')
  			window.location.href='login.php'</script>";	
		}		
	}
	mysqli_close($con);
?>