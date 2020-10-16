<?php include "header.php"; ?>


    <div class="container">
        <br>
        <h4 class="text-warning text-center">Add New Product Type</h4>   
        <br>    
        <div class="row">
            <div class="col-md-auto">
                <form action="producttypeinsert.php" method="post" enctype='multipart/form-data'>
                    <table class="table table-bordered" style="width: 500px;" align="center">
                        <tr>
                            <td><label>Product Category</label></td>
                            <td>
                                <select name="catId" class="form-control">
                                    <option value="Null">Select product category</option>
                                    <?php getProductCat(); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Product Type Image</label></td>
                            <td><input type="file" name="typeImage" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label>Product Type</label></td>
                            <td><input type="text" name="typeTitle" class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Add Product Type" name="btnAddType" class="btn btn-primary">
                            </td>
                        </tr>
                    </table>               
                </form>
            </div>
        </div>
        <p id="result"></p>
    </div>



<?php
    
    function getProductCat(){  
        $getProductCat = mysqli_query($GLOBALS['con'], "select catid, catname from cat");
        while ($catData = mysqli_fetch_assoc($getProductCat)) {
            echo "<option value='".$catData['catid']."'>".$catData['catname']."</option>";
        }
    }

    include "footer.php";    
?>
