<?php
	include "header.php";
	if(isset($_GET["success"]))
	{
 		echo '
 			<div class="alert alert-success alert-dismissible">
    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			Item Added into Cart
 			</div>
 		';
	}
?>


	<div class="container-fluid" style="background-image: url(image/bg1.jpg);padding-top: 100px;">
		<div class="row">

<?php
	
	if(!empty($_GET["pId"])) {
		$pId=intval($_GET['pId']);
		$getProduct=mysqli_query($con,"SELECT * FROM productdetail where pid='$pId'");
		while($result=mysqli_fetch_array($getProduct)){
?>

		<div class="col-md-3 col-sm-12" style="display: inline-block;">
			<ul class="display" style="list-style-type: none; font-size: 20px; color: blue;padding: 10px;">
  				<li style="display: inline-block;"><?php echo "<img style='width:300px;height:300px; ' src='image/".$result['productimg']."' class='img img-thumbnail img-responsive'>";?></li>
  			</ul>
		</div>
		<div class="col-md-9 col-sm-12">
  			<form action="cart.php?pid=<?php echo $result['pid'];?>" method="POST">
  				<ul style="list-style-type: none; font-size: 20px; color: #00284d; padding: 10px;">
  					<li class="proout"><?php echo $result['productname'];?></li>
 					<li class="proout"><?php echo $result['price'];?> /-</li>
 					<li class="proout"><?php echo $result['discount'];?> /-  Off</li>
 					<li class="proout"><?php echo $result['productcolor'];?> in color</li>
 					<li class="proout">Size : <?php echo $result['productsize'];?></li>
 					<li class="proout">Description : <?php echo $result['description'];?></li> <br>
 					<li class="proout">
						<input type="text" name="qty" value="1" style="border-radius: 10px; margin-left: -10px; padding-left: 10px;">
						<input type="submit" name="add" class="btn btn-success" value="Add to cart">
					</li>
 					<input type="hidden" name="hiddenname" value="<?php echo $result['productname'];?>">
 					<input type="hidden" name="hiddenprice" value="<?php echo $result['price'];?>">
 					<input type="hidden" name="callingURL" value="<?php echo $currentURL;?>">
  				</ul>
  			</form>		
  		</div>
<?php 	
 		}
	} 
?>
		</div>
	</div>

<?php
	include "footer.php";
?>

