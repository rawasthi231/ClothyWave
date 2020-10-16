<?php

	include "../db.php";
 
	// Check connection
	if($con === false){
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	} else{
		if (isset($_POST['btnAdd'])) {
			// Escape user inputs for security
			$catname= mysqli_real_escape_string($con, $_REQUEST['catName']);	
			// Attempt insert query execution
			$query = "INSERT INTO cat(catname) VALUES ('$catname')";
			if(mysqli_query($con, $query)){
    			echo "New Category added successfully.";
    			echo "<script> location.href='category.php'; </script>";
			} else {
    			echo "ERROR: Unable to execute query. " . mysqli_error($con);
			}
		}	
	}
	

	// Close connection
	mysqli_close($link);
?>