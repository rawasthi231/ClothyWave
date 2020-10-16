<?php include "header.php"; ?>

    <div class="container mt-3">
        <br>
        <h4 class="text-warning text-center">Add New Category</h4> 
        <br>      
        <div class="col-md-auto">
            <form action="catinsert.php" method="post"> 
                <table class="table table-bordered" style="width: 500px;" align="center">
                    <tr>
                        <td><label for="category">Category Name</label></td>
                        <td><input type="text" name="catName" id="category" class="form-control"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Add New Category" name="btnAdd" class="btn btn-info btn-block"></td>
                    </tr>
                </table>
            </form> 
        </div>
    </div>

<?php include "footer.php"; ?>