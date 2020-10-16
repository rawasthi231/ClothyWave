<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ClothyWave Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <div class="container mt-3">
        <br>
        <a href="index.php" title="ClothyWave cat"><h2 class="text-center" style="color: #ff2233; font-size: 30px; text-decoration: none;">ClothyWave</h2></a>
        <br>     
        <div class="row">
             <div class="col-md-4">
    			<div class="list-group" id="list-tab" role="tablist">
      				<a class="list-group-item list-group-item-action active" id="list-cat-list" data-toggle="list" href="#list-cat" role="tab" aria-controls="addCategory">Add Categories</a>
      				<a class="list-group-item list-group-item-action" id="list-prod-list" data-toggle="list" href="#list-prod" role="tab" aria-controls="addProducts">Add Products</a>
      				<a class="list-group-item list-group-item-action" id="list-prodType-list" data-toggle="list" href="#list-prodType" role="tab" aria-controls="addProductTypes">Add Product Types</a>
      				<a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
    			</div>
  			</div>
        </div> 
    </div>



    <div class="container">
		<div class="row">
  			<div class="col-md-8">
    			<div class="tab-content" id="nav-tabContent">
      				<div class="tab-pane fade show active" id="list-cat" role="tabpanel" aria-labelledby="list-cat-list">
      					<form action="adminfetch.php" method="post"> 
                <table class="table table-bordered" style="width: 500px;" align="center">
                    <thead class="table-dark">
                    	<tr>
                    		<th colspan="2"><h4 class="text-warning text-center"><b>ClothyWave</b> Admin</h4></th>	
                    	</tr>
                    </thead>
                    <tr>
                        <td><label for="emailAddress">Admin UserId</label></td>
                        <td><input type="text" name="userId" id="emailAddress" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input type="text" name="password" id="password" class="form-control"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Login" name="btnLogin" class="btn btn-info btn-block"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="forgotPassword.php" title="Reset Password" style="float: left;">Forgot Password ?</a>
                        </td>
                    </tr>
                </table>
            </form>
      				</div>
      			<div class="tab-pane fade" id="list-prod" role="tabpanel" aria-labelledby="list-prod-list">...</div>
      			<div class="tab-pane fade" id="list-prodType" role="tabpanel" aria-labelledby="list-prodType-list">...</div>
      			<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
    		</div>
  		</div>
	</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>




