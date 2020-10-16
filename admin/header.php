<?php
    include "../db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ClothyWave Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/adminStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <br>
    <div id="navbar">
        <a class="active" href="../index.php"><span>ClothyWave</span></a>
        <a href="adminDashboard.php">Dashboard</a>
        <a href="category.php">Add Categories</a>
        <a href="producttype.php">Add Product Types</a>
        <a href="prodeform.php">Add Products</a>
        <a href='javascript:void(0)' style="float: right;"><?php echo $admData['name'];?></a>
    </div>


    
