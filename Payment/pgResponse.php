<?php

	include '../db.php';
  	session_start();
  	error_reporting(0);
  		header("Pragma: no-cache");
		header("Cache-Control: no-cache");
		header("Expires: 0");

		// following files need to be included
		require_once("./lib/config_paytm.php");
		require_once("./lib/encdec_paytm.php");

		$paytmChecksum = "";
		$paramList = array();
		$isValidChecksum = "FALSE";

		$paramList = $_POST;
		$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

		//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
		$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/adminStyle.css">
</head>
<body>

	<div id="navbar">
        <a class="active" href="../index.php"><span>ClothyWave</span></a>
       <!--  <a href="adminDashboard.php">Dashboard</a>
        <a href="category.php">Add Categories</a>
        <a href="producttype.php">Add Product Types</a>
        <a href="prodeform.php">Add Products</a> -->
    </div>

    <div class="container">
    	<div class="row">
    		<div class="col-md-12">		
    			<hr>

<?php
		$result = '<table class="table table-striped">';
		if($isValidChecksum == "TRUE") {
			if ($_POST["STATUS"] == "TXN_SUCCESS") {
				echo '<h3 class="text-success text-center">Your transaction is successfull...</h3>';	
			}
			else {
				echo '<h3 class="text-warning text-center">Your transaction is failed...</h3>';
			}

			if (isset($_POST) && count($_POST)>0 ) { 
				$result.= '
					<tr>
						<td>Transaction Amount</td>
						<td>'.$_POST["TXNAMOUNT"].'</td>
					</tr>
					<tr>
						<td>ORDER ID</td>
						<td>'.$_POST["ORDERID"].'</td>
					</tr>
					<tr>
						<td>Transaction ID</td>
						<td>'.$_POST["TXNID"].'</td>
					</tr>
					<tr>
						<td>Transaction Date</td>
						<td>'.$_POST["TXNDATE"].'</td>
					</tr>
				';
				$result.= '</table>';
				echo $result;
			}
		}
		else {
			echo "<b>Checksum mismatched.</b>";
		}

?>
    		</div>
    	</div>
	</div>
	

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>



	
