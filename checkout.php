<?php
	include 'header.php';
  	if (isset($_SESSION['userEmail'])) {
    	$userEmail = $_SESSION['userEmail'];
    	$runQuery = mysqli_query($con, "select * from info where email = '$userEmail'");
    	$userData = mysqli_fetch_array($runQuery);
 
		if (isset($_POST['btnCheckout'])) {
			$txnAmount = (int)$_POST['txnAmount'];
			$pid = (int)$_POST['pid'];
			$qty = (int)$_POST['quantity'];
		
?>

    <div class="container mt-5">
    	<h4 class="text-info text-center mb-5">Order Summery</h4>
    	<form method="post" action="./pgRedirect.php">
			<input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST01">
			<input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
			<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
			<table class="table table-bordered" style="width: 600px;" align="center">
				<tbody>
				<tr>
					<td>Order ID</td>
					<td><input type="text" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "CWCON" . rand(10000,99999999)?>" readonly class="form-control">
					</td>
				</tr>
				<tr>
					<td>Product Name</td>
					<td><input type="text" id="PRODUCT_NAME" tabindex="1" maxlength="20" size="20"
						name="PRODUCT_NAME" autocomplete="off"
						value="<?php echo $pid; ?>" readonly class="form-control">
					</td>
				</tr>
				<tr>
					<td>Quantity</td>
					<td><input type="text" id="QUANTITY" tabindex="1" maxlength="20" size="20"
						name="QUANTITY" autocomplete="off"
						value="<?php echo $qty; ?>" readonly class="form-control">
					</td>
				</tr>
				<tr>
					<td>Transaction Amount</td>
					<td><input title="TXN_AMOUNT" tabindex="10"	type="text" name="TXN_AMOUNT" value="<?php echo $txnAmount; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td colspan="3"><input value="CheckOut" type="submit" onclick="" class="btn btn-block btn-success float-right"></td>
				</tr>
			</tbody>
		</table>
	</form>
</div>


<?php
	} else {
		echo "
			<div class='container' style='margin-top:100px; margin-left:400px;'>
				<div class='col-md-6 mt-5'>
					<h5 class='text-danger text-center text-uppercase'>You can not access this page from here. Go to 
					<a href='index.php'>ClothyWave Home</a>	</h5>
				</div> 
			</div>
		";	
	}
}

	include 'footer.php';
?>

