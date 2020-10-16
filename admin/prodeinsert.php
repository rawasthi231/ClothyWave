<?php
	include "../db.php";

	// Check connection
	if($con === false){
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	} else {
		if (isset($_POST['btnAddProduct'])) {
			// Escape user inputs for security
			$typeid = (int)mysqli_real_escape_string($con, $_REQUEST['typeId']);
			$productimg = mysqli_real_escape_string($con, $_FILES['productImg']['name']);
			$target_dir = "image/";
			$productname = mysqli_real_escape_string($con, $_REQUEST['productName']);
			$price = (int)mysqli_real_escape_string($con, $_REQUEST['price']);
			$discount = (int)mysqli_real_escape_string($con, $_REQUEST['discount']);
			$productcolor = mysqli_real_escape_string($con, $_REQUEST['productColor']);
			$productsize = mysqli_real_escape_string($con, $_REQUEST['productSize']);
			$description = mysqli_real_escape_string($con, $_REQUEST['description']);
			$qty = (int)mysqli_real_escape_string($con, $_REQUEST['quantity']);

			// Attempt insert query execution
			$insertQuery = "INSERT INTO productdetail(typeid,productimg,productname,price,discount,productcolor,productsize,description,qty) VALUES ($typeid,'$productimg','$productname',$price,$discount,'$productcolor','$productsize','$description',$qty)";
			$row=mysqli_query($con, $insertQuery);
			if($row){
    			echo '
    				<script>
						window.location.href="prodeform.php";
						document.getElementById("result").innerHTML = "Product added successfully." ;
					</script>
    			';
			} else{
    			echo '
    				<script>
						window.location.href="prodeform.php";
						document.getElementById("result").innerHTML = "ERROR: Unable to add new product." ;
					</script>
    			';
			}
		}
	}

?>


