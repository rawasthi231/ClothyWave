<?php
	include '../db.php';
	// Check connection
	if($con === false){
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	} else {
		if (isset($_POST['btnAddType'])) {
			// Escape user inputs for security
			$catid = (int)mysqli_real_escape_string($con, $_REQUEST['catId']);
			$typeimage = mysqli_real_escape_string($con, $_FILES['typeImage']['name']);
  			$target_dir = "image/";
  			$target_file = $target_dir . basename($_FILES["typeImage"]["name"]);

  			// Select file type
  			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  			// Valid file extensions
  			$extensions_arr = array("jpg","jpeg","png","gif");
			$typetitle = mysqli_real_escape_string($con, $_REQUEST['typeTitle']);


			// Attempt insert query execution
			$addTypeQuery = "INSERT INTO producttype(catid,typeimage,typetitle) VALUES ($catid,'$typeimage','$typetitle')";
			$run=mysqli_query($con, $addTypeQuery);
			if($run){
				echo "done";
    			echo '
    				<script>
						window.location.href="producttype.php";
						document.getElementById("result").innerHTML = "Product type added successfully." ;
					</script>
    			';
			} else{
				echo "not done ";
    			echo '
    				<script>
						window.location.href="producttype.php";
						document.getElementById("result").innerHTML = "ERROR: Unable to add new product type." ;
					</script>
    			';
			}
		}
	}
?>
