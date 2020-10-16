<?php
  include "header.php";
?>

		<div class="container-fluid">
 	 		<div class="row" style=" background-image: url(image/bg1.jpg); ">    
    			<div class="col-md-2 col-sm-12" style="height: auto;">
      				<ul class="leftattribute " style="list-style-type: none; padding: 0px; margin-top: 30px; font-weight: bold; text-align: center;background-image: url(image/fbg.jpg)" >
        				<li style="font-weight: bold; font-size: 20px; padding: 10px;" ><b>CATEGORIES</b></li>
      				<?php 
      							$getCategories=mysqli_query($con,"select * from cat");
            					while($result=mysqli_fetch_assoc($getCategories)) {
      				?>
              						<li class="slideproduct">
                  						<a href="trial.php?catId=<?php echo $result['catid'];?>" class="btn text-primary"><?php echo strtoupper($result['catname']);?></a>
              						</li>
      				<?php 	} 	?>
      				</ul>
    			</div>
    			<div class="col-md-5 col-sm-12" style="height: 500px; margin-top: 30px;">
					<div class="slider">
  						<img class="mySlides" src="img/logo.jpg" style="width:100%;height: 500px;">
  						<img class="mySlides" src="image/s1.jpg" style="width:100% ; height: 500px;">
  						<img class="mySlides" src="image/sh1.jpg" style="width:100% ; height: 500px;">
  						<img class="mySlides" src="image/p1.jpg" style="width:100%;height: 500px;">
  						<img class="mySlides" src="img/logoo.jpg" style="width:100%;height: 500px;">
  						<img class="mySlides" src="image/p1.jpg" style="width:100%;height: 500px;">
  						<img class="mySlides" src="image/kid.jpg" style="width:100%;height: 500px;">
  						<img class="mySlides" src="img/logoo.jpg" style="width:100%;height: 500px;">
  						<a class="left carousel-control" href="#myCarousel" data-slide="prev"  >
                    		<span class="glyphicon glyphicon-chevron-left"></span>
                    		<span class="sr-only">Previous</span>
                		</a>
                		<a class="right carousel-control" href="#myCarousel" data-slide="next" >
                    		<span class="glyphicon glyphicon-chevron-right"></span>
                    		<span class="sr-only">Next</span>
                		</a>
					</div>
              	</div>
				<div class="col-md-5 col-sm-12" style="height: auto;">
      				<ul class="leftattribute " style="list-style-type: none; margin-top: 30px;" >
       	 				<li><button><img style="height: 160px; width: 100%;" src="img/offers.jpg"></button></li>
         				<li><button><img style="height: 160px; width: 100%;" src="img/sale.jpg"></button></li>
         				<li><button><img style="height: 180px; width: 100%;" src="img/fresh.jpg"></button></li>
					</ul>
				</div>
			</div>
		</div>

	<script>
		var myIndex = 0;
		carousel();
		function carousel() {
  			var i;
  			var x = document.getElementsByClassName("mySlides");
  			for (i = 0; i < x.length; i++) {
    			x[i].style.display = "none";  
  			}
  			myIndex++;
  			if (myIndex > x.length) {myIndex = 1}    
  			x[myIndex-1].style.display = "block";  
  			setTimeout(carousel, 2000); // Change image every 2 seconds
		}
	</script>



<?php

	include "footer.php";
?>

    
    