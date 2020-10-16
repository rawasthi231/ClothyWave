<?php
	include "../db.php";
	session_start();
	if (isset($_POST['btnLogin'])) {
		$runQuery = mysqli_query($con, "SELECT * FROM admin_info WHERE email = '$_POST[userId]' AND password = '$_POST[password]'");
		if (mysqli_num_rows($runQuery) > 0) {
			$_SESSION['admUserId'] = $_POST['userId'];
			echo "<script> location.href='adminDashboard.php'; </script>";

		} else {
			echo "<script>alert('Please check your login details and try again')
					location.href='index.php';  </script>";
		}
	}

	mysqli_close($con);
?>