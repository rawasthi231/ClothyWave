<?php

$link = mysqli_connect("localhost", "root", "", "demo");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
$mobile = mysqli_real_escape_string($link, $_REQUEST['mobile']);
$address1 = mysqli_real_escape_string($link, $_REQUEST['address1']);
$address2 = mysqli_real_escape_string($link, $_REQUEST['address2']);
 
// Attempt insert query execution
$sql = "INSERT INTO info(first_name, last_name,email,password,mobile,address1,address2) VALUES ('$first_name', '$last_name', '$email','password','mobile','address1','address2')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    echo "<script> location.href='index.php'; </script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>