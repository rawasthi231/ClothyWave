
<?php  include "header.php"; ?>

	<div style="background-image: linear-gradient(to right, white, skyblue);"> 
		<div class="container">
			<div class="row" style="padding-top: 100px;">
<?php
	
	if(!empty($_GET["typeId"])) {
		$typeId=intval($_GET['typeId']);
		$getProduct=mysqli_query($con,"SELECT * FROM productdetail where typeid='$typeId'");
 		while($result=mysqli_fetch_assoc($getProduct)){
?>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a  href="description.php?pId=<?php echo $result['pid'];?>">
 						<ul class ="display" style="list-style-type: none; font-weight: bold; display: inline-block; background-color:transparent;">
  							<li>
  								<img src="image/<?php echo $result['productimg'];?>" style='width:225px; height:225px; background-color:transparent;' class="img img-thumbnail img-responsive">
  							</li>
  							<li><?php echo $result['productname'];?></li>
 						</ul>		
 					</a>
 				</div>
<?php 
 		}
	} 
?>
			</div>
		</div>
	</div>
<?php
	include "footer.php";
?>