<!-- Add Product Modal -->
<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Product</h4></center>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="container-fluid">
                    <!-- Form for adding a new product -->
                    <form role="form" method="POST" action="addproduct.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                            <div style="height:15px;"></div>

                            <!-- Product Name Input -->
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Product Name:</span>
                                <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                            </div>

                            <!-- Category Selection Dropdown -->
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Category: </span>
                                <select style="width:400px;" class="form-control" name="category">
                                    <?php
                                    $cat=mysqli_query($conn,"select * from category");
                                    while($catrow=mysqli_fetch_array($cat)){
                                    ?>
                                        <option value="<?php echo $catrow['categoryid']; ?>"><?php echo $catrow['category_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Price Input -->
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Price:</span>
                                <input type="text" style="width:400px;" class="form-control" name="price" required>
                            </div>

                            <!-- Quantity Input -->
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Quantity:</span>
                                <input type="text" style="width:400px;" class="form-control" name="qty">
                            </div>

                            <!-- Photo Upload Input -->
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Photo:</span>
                                <input type="file" style="width:400px;" class="form-control" name="image">
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Footer with Cancel and Save Buttons -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->


<!-- Add Supplier -->
    <div class="modal fade" id="addsupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Add New Supplier</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="addsupplier.php" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Company:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Address:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="address">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Contact Info:</span>
                            <input type="text" style="width:400px;" class="form-control" name="contact">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Fullname:</span>
                            <input type="text" style="width:400px;" class="form-control" name="fullname" required>
                        </div>
						
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
					</form>
                </div>
			</div>
		</div>
    </div>
<!-- /.modal -->