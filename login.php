<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Record Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <div class="container mt-3">
        <div class="row">
            <a href="index.php" title="ClothyWave Home"><h2 class="text-center" style="color: #ff2233; font-size: 30px; text-decoration: none;">ClothyWave</h2></a>
            <h4 class="text-warning">Login to your <b>ClothyWave</b> account</h4>    
            <hr>   
            <div class="col-md-auto" style="width: 500px; align-content: center;">
                <form action="fetch.php" method="post"> 
                    <label for="emailAddress">Email Address:</label>
                    <input type="text" name="email" id="emailAddress" class="form-control">
    
                    <label for="password">Password:</label>
                    <input type="text" name="password" id="emlAddress" class="form-control">
                
                    <br>
            <?php   if (isset($_GET['callingURL'])) {
                        $callingURL = $_GET['callingURL'];
            ?>
                    <input type="hidden" name="callingURL" value="<?php echo $callingURL; ?>">
            <?php   } ?>
                    <input type="submit" value="Login" name="click" class="btn btn-info">
                    
                    <br> <br>
                    
                    <div class="text-pad">
                        <a href="#" title="Reset Password">Forgot Password ?</a> &nbsp; &nbsp;
                        <a href="register.php" title="Create new account">Don't have an account? Create One.</a>
                    </div>
                </form> 
            </div>
        </div>
    </div>

    
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>