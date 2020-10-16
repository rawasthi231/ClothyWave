<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ClothyWave Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>

    <div class="container mt-3">
        <br>
        <a href="index.php" title="ClothyWave Home"><h2 class="text-center" style="color: #ff2233; font-size: 30px; text-decoration: none;">ClothyWave</h2></a>
         
        <br>      
        <div class="col-md-auto">
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
                        <td colspan="2">
                            <input type="submit" value="Login" name="btnLogin" class="btn btn-info btn-block g-recaptcha" data-sitekey="6LdvH9cZAAAAAIQc36jb_H1wgGO2v77g12lXvKld" data-callback='onSubmit' data-action='submit'>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="forgotPassword.php" title="Reset Password" style="float: left;">Forgot Password ?</a>
                        </td>
                    </tr>
                </table>
            </form> 
        </div>
    </div>


    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>