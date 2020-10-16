<?php
    include "header.php";
?>

    <div class="container">
        <br>
        <h4 class="text-warning text-center">Add New Product</h4>   
        <br>    
        <div class="row">
            <div class="col-md-auto">
                <form action="prodeinsert.php" method="post" enctype='multipart/form-data'>
                    <table class="table table-bordered" style="width: 500px;" align="center">
                        <tr>
                            <td><label for="firstName">Product Title</label></td>
                            <td><input type="text" name="productName" class="form-control"></td>    
                        </tr>
                        <tr>
                            <td><label for="emailAddress">Product Image</label></td>
                            <td><input type="file" name="productImg" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="emailAddress">Product Type</label></td>
                            <td>
                                <select name="typeId" class="form-control">
                                    <option value="Null">Select product type</option>
                                    <?php getProductTypes(); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="emailAddress">Product Price</label></td>
                            <td><input type="text" name="price" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="emailAddress">Discount</label></td>
                            <td><input type="text" name="discount" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="emailAddress">Product Color</label></td>
                            <td><input type="text" name="productColor" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="emailAddress">Product Size</label></td>
                            <td><input type="text" name="productSize" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="emailAddress">Product Description</label></td>
                            <td><input type="text" name="description" class="form-control" ></td>
                        </tr>
                        <tr>
                            <td><label for="emailAddress">Total Quantity</label></td>
                            <td><input type="text" name="quantity"class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Add Product" name="btnAddProduct" class="btn btn-primary">
                            </td>
                        </tr>
                    </table>               
                </form>
            </div>
        </div>
        <p id="result"></p>
    </div>



<?php
    
    function getProductTypes(){  
        $getProductType = mysqli_query($GLOBALS['con'], "select typeid, typetitle from producttype");
        while ($typeData = mysqli_fetch_assoc($getProductType)) {
            echo "<option value='".$typeData['typeid']."'>".$typeData['typetitle']."</option>";
        }
    }

    include "footer.php";
?>
