<?php 
include('session.php');
include('conn.php');  

if (isset($_GET['cat']) && !empty($_GET['cat'])) {
    $category_id = $_GET['cat'];
    
    // Fetch category name to display
    $category_query = mysqli_query($conn, "SELECT category_name FROM category WHERE categoryid = $category_id");
    $category_name = mysqli_fetch_assoc($category_query)['category_name'];

    // Fetch products based on the selected category
    $pq = mysqli_query($conn, "SELECT * FROM product WHERE categoryid = $category_id ORDER BY created_at DESC");
} else {
    // If no category ID is provided, fetch all products
    $pq = mysqli_query($conn, "SELECT * FROM product ORDER BY created_at DESC");
}
?>

<title>Products</title>
<html>
<head>
    <style type="text/css">
        * {
            text-decoration: none;
        }
        #wrapper {
            display: flex;
        }
        .dropdown {
            cursor:pointer;
            position: relative;
            display: inline-block;
            margin-left: 50px;
            margin-top: 20px;
            margin-bottom: 20px;
            width: 130px;
            color: #351224 ;
        }
        .dropdown-content {
            list-style: none; /* Add this line to remove the list-style */
            padding: 0; /* Add this line to remove any default padding */
            margin: 0; /* Add this line to remove any default margin */
            display: none;
            opacity: 0.9;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 170px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background: #e8847c;
        }
        .dropdown:hover .dropdown-content {
            display: block;   
        }
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>
</head>
<body style="overflow: hidden; background: #E7E7E7;">
    <div id="wrapper">
        <!-- Sidebar -->
        <div>
            <?php include('navbar.php'); ?>
            <div style="height:50px;"></div>
        </div>

        <!-- Main Content -->
        <div style="flex: 1;">
            <!-- Page Title -->
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 0 20px;">
                <div style="flex: 1; font-size: 5vh; font-family: sans-serif;font-weight: bold;">Products</div>
                <span class="pull-right"></span>
            </div>

            <!-- Add Product Button and Search Form -->
            <div style="flex: 1; text-align: right; padding-right: 5vh;">
                <a href="addproduct.php" class="button-small" style="background: #351224; display: inline-block; text-decoration: none; color: white; border-radius: 10px; text-align: center;">
                    <h6 style="font-weight: bolder; margin: 15px;">Add Product</h6>
                </a>
                <div style="height: 1.5vh;"></div>
            </div>

            <li class="dropdown">
                <i class="fa-solid fa-list" style="font-size: 30px"></i>
                <a class="dropdown-toggle" data-toggle="dropdown" href="product.php"></a>
                <ul class="dropdown-content" style="display: flex 1;">
                    <li><a href="product.php"> All Category</a></li>
                    <?php
                    $caq = mysqli_query($conn, "select * from category");
                    while ($catrow = mysqli_fetch_array($caq)) {
                    ?>
                    <li class="divider"></li>
                    <li><a href="product.php?cat=<?php echo $catrow['categoryid']; ?>"><?php echo $catrow['category_name']; ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </li>   

            <!-- Product Table -->
            <div class="row" style="height: 80vh; overflow: scroll; padding: 4vh; font-size: 2vh; ">
                <div style="border-radius: 10px; border: 0px solid; background-color: white; overflow: hidden;">
                    <table style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <div style="display: flex; background-color: #e8847c; color: white; padding: 8px;">
                                <div style="flex: 1;"><center>Product Name</div>
                                <div style="flex: 1;"><center>Product Description</div>
                                <div style="flex: 1;"><center>Expiration Date</div>
                                <div style="flex: 1;"><center>Unit of Measure</div>    
                                <div style="flex: 1;"><center>Price</div>
                                <div style="flex: 1;"><center>Quantity</div>
                                <div style="flex: 1;"><center>Photo</div>
                                <div style="flex: 1;"><center>Operation</div>
                            </div>
                        </thead>
                        <tbody>
                            <?php
                            while ($pqrow = mysqli_fetch_array($pq)) {
                                $pid = $pqrow['productid'];
                                $quantity = $pqrow['product_qty'];
                                $quantity_warning = '';
                                if ($quantity <= 20) {
                                    $quantity_warning = '<span style="color: red;">(Low stock!)</span>';
                                }
                            ?>
                            <div style="display: flex; box-sizing: border-box;  margin-bottom: 15px; ">
                                <div style="padding: 20px 30px; flex: 1;"><center><?php echo $pqrow['product_name']; ?></div>
                                <div style="padding: 20px 30px; flex: 1;"><center><?php echo $pqrow['product_des']; ?></div>
                                <div style="padding: 20px 30px; flex: 1;"><center><?php echo $pqrow['product_exp']; ?></div>
                                <div style="padding: 20px 30px; flex: 1;"><center><?php echo $pqrow['unit_of_measure']; ?></div>
                                <div style="padding: 20px 30px; flex: 1;"><center><?php echo '₱ ' . $pqrow['product_price']; ?></div>
                                <div style="padding: 20px 30px; flex: 1;"><center><?php echo $pqrow['product_qty'] . ' ' . $quantity_warning; ?></div>
                                <div style="padding: 20px 30px; flex: 1;"><center><img src="../<?php if (empty($pqrow['photo'])) { echo "upload/noimage.jpg"; } else { echo $pqrow['photo']; } ?>" height="85px" width="85px;"></div>

                                <div style="padding: 30px 30px; flex: 1;"><center>
                  
                              <div style="display: flex 1;">
                              <form role="form" method="post" action="edit_product.php<?php echo '?id=' . $pid; ?>">
                                  <a href="edit_product.php?product_id=<?php echo $pid ?>" style="background-color: #5cb85c; color: #fff; border: none; padding: 5px 10px; margin: 3px; border-radius: 5px"><i class="fas fa-edit"></i> Edit</a>
                              </form>                                       

                                <form role="form" method="post" action="deleteproduct.php<?php echo '?id=' . $pid; ?>">
                                    <button type="submit" class="btn btn-danger" style="background-color: #d9534f; color: #fff; border: none; padding: 5px 10px; margin: 3px; border-radius: 5px;"> Delete</button>
                                </form>
                              </div>

                            </div>
                            </div>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="custom.js"></script>
</body>
</html>
