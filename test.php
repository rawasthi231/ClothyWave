<?php
include "db.php";
session_start();
//error_reporting(0);
if (isset($_SESSION['userEmail'])) {
  $userEmail = $_SESSION['userEmail'];
  $runQuery = mysqli_query($con, "select * from info where email = '$userEmail'");
  $userData = mysqli_fetch_array($runQuery);
}
$currentURL = substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>ClothyWave</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
        

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000;">
      	<a class="navbar-brand" href="javascript:void(0)" style="background-image: linear-gradient(to right, rgba(255,0,0,0), rgba(255,0,0,3));">
            <font style="font-style:normal; font-size: 33px;color:pink;font-family: serif;font-weight:bold; "> ClothyWave </font>  			
      	</a>
      	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        	<span class="navbar-toggler-icon"></span>
      	</button>
  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
      			<li class="nav-item active">
        			<a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="#"><i class="fa fa-user"></i> About</a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="#" tabindex="-1" aria-disabled="true"><i class="fa fa-phone"></i> Contact</a>
      			</li>
    		</ul>
    		<ul class="nav justify-content-end">
  	<?php 
            if (isset($_SESSION['userEmail'])){
                $runQuery = mysqli_query($con, "SELECT * FROM cart WHERE userid IN (SELECT id FROM info WHERE email = '$userEmail')");
                $cartitems = mysqli_num_rows($runQuery);
    ?>
  				<li class="nav-item">
    				<a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart text-warning" style="font-size: 20px;"><sup class="text-dark"  style="font-size: 20px; background-color: #fff; border-radius: 10px;"> <?php echo $cartitems; ?>&nbsp;</sup></i></a>
  				</li>
  	<?php 	} else{ ?>
  				<li class="nav-item">
    				<a class="nav-link text-warning" href="cart.php"><i class="fa fa-shopping-cart text-warning" style="font-size: 20px;"><sup class="text-dark"  style="font-size: 20px; background-color: #fff; border-radius: 10px;"> <?php  if (isset($_SESSION['cartitems'])){ echo $_SESSION['cartitems'];} else { echo "0"; }?></sup></i></a>
  				</li>
  	<?php 	} 	?> 
  				<li class="nav-item dropdown">
      	<?php   if (isset($_SESSION['userEmail'])) { ?>
        			<a class="nav-link dropdown-toggle text-danger" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          				<?php echo $userData['first_name']." ".$userData['last_name'] ?>
        			</a>
        			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          				<a class="dropdown-item text-primary" href="myorders.php"><i class="fa fa-tasks"></i> My Orders</a>
          				<div class="dropdown-divider"></div>
          				<a class="dropdown-item text-danger" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
        			</div>
        <?php   } else { ?>
        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          			Account	
        			</a>
        			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          				<a class="dropdown-item text-success" href="login.php"><i class="fa fa-sign-in"></i> Login</a>
          				<div class="dropdown-divider"></div>
          				<a class="dropdown-item text-success" href="register.php"><i class="fa fa-user-plus"></i> Register</a>
        			</div>
        <?php   } ?>
      			</li>
			</ul>
    		<form class="form-inline my-2 my-lg-0">
      			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    		</form>
  		</div>
	</nav>



























  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>