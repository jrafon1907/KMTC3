<?php
    include('session.php');
    if(isset($_POST['fcart'])){
        $query=mysqli_query($conn,"select * from `cart` left join product on product.productid=cart.productid where userid='".$_SESSION['id']."'");
        if (mysqli_num_rows($query)<1){
            echo "Your Cart is Empty <br><br>";
        }
        else{
        while($row=mysqli_fetch_array($query)){
            ?>
            
                <div class="row"><!-- Add a row for each item -->
                    <div class="col-lg-1">
                        <img src="../<?php if (empty($row['photo'])){echo "upload/noimage.jpg";}else{echo $row['photo'];} ?>" style="width: 50px; height:50px; position:relative; left:5px;" class="thumbnail">
                    </div>
                    <div class="col-lg-9">
                        <span style="font-size:15px; position:relative; left:50px; top:5px;"><?php echo $row['product_name']; ?></span>
                    <div class="col-lg-2" style="text-align:center; position:relative; top:4px; left:20px;">
                        <span class="pull-right"><strong><?php echo $row['qty']; ?></strong></span>
                        </div>
                    </div>
                </div>
            <?php
        }
        }
    }
?>
