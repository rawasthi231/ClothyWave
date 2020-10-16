<style >

	.display{
		/*border: 2px solid black;*/
		margin: 20px;
		padding:0px;
		text-align: center;
		text-decoration: underline overline dotted black;
		font-size: 30px;}
</style>
<?php include "header.php"; ?> 
		
	<div style="background-image: url(image/bg1.jpg);">
		<div class= "container-fluid">
			<div class="row" style=" width: 100%; padding-top: 100px;  height: 500px; ">
						

<?php 			
	if(!empty($_GET["catId"])) {
 		$catId=intval($_GET['catId']);
		$getProductType=mysqli_query($con,"SELECT * FROM producttype where catid='$catId'");
 		while($result=mysqli_fetch_assoc($getProductType)){
?>
				<div class="col-md-3 col-sm-12">
 					<ul class ="display" style="list-style-type: none; font-weight: bold;display: inline-block; height: 300px; ">
  						<a href="productdetail.php?typeId=<?php echo $result['typeid'];?>" >
  							<li class="img"><?php echo "<img style='width:225px;height:225px; ' src='image/".$result['typeimage']."' >";?></li>
 							<li class="proout"><?php echo $result['typetitle'];?></li>
 						</a>
 					</ul>		
 				</div>
<?php 
 		}
	}
?>

 			</div>
		</div>
	</div>

<?php include "footer.php"; ?>