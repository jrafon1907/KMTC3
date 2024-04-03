<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php 
	$name=$_POST['search']; 
?>
<body style="background: #E7E7E7;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <?php include('navbar.php'); ?>
    <div class="container">
        <?php include('cart_search_field.php'); ?>
        <div style="height: 80px;"></div>
        <div>
            <?php
            $inc = 4;
            $query = mysqli_query($conn, "SELECT * FROM product ORDER BY productid DESC"); // Fetch products in descending order of their IDs
            while ($row = mysqli_fetch_array($query)) {

                $inc = ($inc == 4) ? 1 : $inc + 1;
                if ($inc == 1) echo "<div class='row'>";

            ?>
                <div class="col-lg-3">
                    <div>
                        <img src="../<?php if (empty($row['photo'])) {
                                            echo "upload/noimage.jpg";
                                        } else {
                                            echo $row['photo'];
                                        } ?>" style="width: 230px; height:230px; padding:auto; margin:auto;" class="thumbnail">
                        <div style="height: 10px;"></div>
                        <div style="height:40px; width:230px; margin-left:17px; font-weight:bold;font-size: 18px; color: #f44336"><?php echo $row['product_name']; ?></div>
                        <div style="height: 10px;"></div>
                        <div style="height:40px; width:230px; margin-left:17px;"><?php echo $row['product_des']; ?></div>
                        <div style="height:20px; width:230px; margin-left:17px;"><span style="font-weight:bold;">Unit of measure:</span> <?php echo $row['unit_of_measure']; ?></div>
                        <div style="height:40px; width:230px; margin-left:17px;"><span style="font-weight: bold;">Expiration Date:</span> <?php echo $row['product_exp']; ?></div>



                        <div style="display:none; position:absolute; top:210px; left:10px;" class="well" id="cart<?php echo $row['productid']; ?>">Qty: <input type="text" style="width:40px;" id="qty<?php echo $row['productid']; ?>"> <button type="button" class="btn btn-primary btn-sm concart" value="<?php echo $row['productid']; ?>" style="background-color: #57BF38 ;"><i class="fa fa-plus-circle"></i></button></div>
                        <div style="margin-left:17px; margin-right:17px;">
                            <button type="button" class="btn btn-primary btn-sm addcart" value="<?php echo $row['productid']; ?>" style="background-color: #57BF38;  margin-bottom: 20px"><i class="fa fa-shopping-cart fa-fw"></i> Add to Cart</button> <span class="pull-right"><strong>₱ <?php echo number_format($row['product_price'], 2); ?></strong></span>
                        </div>
                    </div>
                </div>
            <?php
                if ($inc == 4) echo "</div><div style='height: 30px;'></div>";
            }
            if ($inc == 1) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div><div class='col-lg-3'></div></div>";
            if ($inc == 2) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div></div>";
            if ($inc == 3) echo "<div class='col-lg-3'></div></div>";
            ?>
        </div>
    </div>
    <?php include('script.php'); ?>
    <?php include('modal.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="custom.js"></script>
</body>

</html>