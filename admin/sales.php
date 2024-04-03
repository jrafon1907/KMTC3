<?php include('session.php'); ?>

<title>Sales Report</title>
<html>
<body style="overflow: hidden; background: #E7E7E7;">
  <style type="text/css">
    #wrapper{
      display: flex;
    }

    #sales:hover{
        background-color: #ddd;
    }
  </style>

    <div id="wrapper">
        <div>
        <?php include('navbar.php'); ?>
        </div>
             <div style="flex: 1;">
                
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 0 20px;">
                    <div style="flex: 1; font-size: 5vh; font-family: sans-serif;font-weight: bold;">Sales Report
                    </div>
                </div>
        
                <div class="row" style="height: 95vh; overflow: scroll; padding: 4vh; font-size: 2vh;">
                    <div style="border-radius: 10px; border: 0px solid; background-color: white; overflow: hidden;">
                     <table style="border-collapse: collapse; width: 100%;">
                        <div style="display: flex; background-color: #e8847c; color: white;">
                                <div style="padding: 8px; flex: 1;"><center>Sales Date</div>
                                <div style="padding: 8px; flex: 1;"><center>Customer</div>
                                <div style="padding: 8px; flex: 1;"><center>Total Purchase</div>
                                <div style="padding: 8px; flex: 1;"><center>Operation</div>    
                            </div>
                        <tbody>
                            <?php
                            $sq = mysqli_query($conn, "select * from sales left join customer on customer.userid=sales.userid order by sales_date desc");
                            while ($sqrow = mysqli_fetch_array($sq)) {
                            ?>
                                <div id="sales" style=" display: flex; box-sizing: border-box;">
                                    <div style="padding: 30px 30px; flex: 1;"><center><?php echo date('M d, Y h:i A', strtotime($sqrow['sales_date'])); ?></div>
                                    <div style="padding: 30px 30px; flex: 1;"><center><?php echo $sqrow['customer_name']; ?></div>
                                    <div style="padding: 30px 30px; flex: 1;"><center><?php echo '₱ ' . number_format($sqrow['sales_total'], 2); ?></div>
                                    <div style="padding: 30px 30px; flex: 1; text-align: center;">
                                            <button onclick="window.location.href='full_details.php?salesid=<?php echo $sqrow['salesid']; ?>'" class="btn btn-primary btn-sm" style="background: #4caf50; border-radius: 5px; color: white; padding: 5px;">
												<span class="glyphicon glyphicon-fullscreen"></span> View Full Details
											</button>

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
    </div>

         

    <script src="custom.js"></script>
</body>

</html>
