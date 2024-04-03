<title>Inventory Report</title>
<?php include('session.php'); ?>

<html>
<body style="overflow: hidden; background: #E7E7E7;">
  <style type="text/css">
    #wrapper{
      display: flex;
    }

    #inventory:hover{
        background-color: #ddd;
    }
  </style>

    <div id="wrapper">
        <div>
        <?php include('navbar.php'); ?>
        </div>
               <div style="flex: 1;">
                
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 0 20px;">
                    <div style="flex: 1; font-size: 5vh; font-family: sans-serif;font-weight: bold;">Inventory Report
                    </div>
                </div>

                    <div class="row" style="height: 95vh; overflow: scroll; padding: 4vh; font-size: 2vh;">
                        <div style="border-radius: 10px; border: 0px solid; background-color: white; overflow: hidden;">
                            <table style="border-collapse: collapse; width: 100%;">
                                <div style="display: flex; background-color:#e8847c; color: white;">
                
                                <div style="padding: 8px; flex: 1;"><center>Date</div>
                                <div style="padding: 8px; flex: 1;"><center>User</div>
                                <div style="padding: 8px; flex: 1;"><center>Product Name</div>
                                <div style="padding: 8px; flex: 1;"><center>Quantity</div>
                            </div>
                            <tbody>
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $search = mysqli_real_escape_string($conn, $_POST['search']);
                                $iq = mysqli_query($conn, "SELECT * FROM inventory LEFT JOIN product ON product.productid=inventory.productid WHERE product_name LIKE '%$search%' ORDER BY inventory_date DESC");
                            } else {
                                $iq = mysqli_query($conn, "SELECT * FROM inventory LEFT JOIN product ON product.productid=inventory.productid ORDER BY inventory_date DESC");
                            }

                            while ($iqrow = mysqli_fetch_array($iq)) {
                            ?>
                                <div id="Inventory" style=" display: flex; box-sizing: border-box; margin-bottom: 10px;">
                                   
                                    <div style="padding: 30px 30px; flex: 1;"><center><?php echo date('M d, Y h:i A', strtotime($iqrow['inventory_date'])); ?></div>
                                    <div style="padding: 30px 30px; flex: 1;"><center><?php
                                        $u = mysqli_query($conn, "SELECT * FROM `user` LEFT JOIN customer ON customer.userid=user.userid LEFT JOIN supplier ON supplier.userid=user.userid WHERE user.userid='" . $iqrow['userid'] . "'");
                                        $urow = mysqli_fetch_array($u);

                                        if ($urow && isset($urow['access'])) {
                                            if ($urow['access'] == 1) {
                                                echo "Admin";
                                            } elseif ($urow['access'] == 2) {
                                                echo $urow['customer_name'];
                                            } else {
                                                echo $urow['company_name'];
                                            }
                                        } else {
                                            // Handle the case when $urow is null or 'access' is not set
                                            echo "User not found";
                                        }
                                        ?>
                                    </div>
                                    <div style="padding: 30px 30px; flex: 1;" ><center><?php echo $iqrow['product_name']; ?></div>
                                    <div style="padding: 30px 30px; flex: 1;" ><center><?php echo $iqrow['quantity']; ?></div>
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
