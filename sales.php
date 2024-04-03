<?php include('session.php'); ?>
<body>
    <div id="wrapper">
        <?php include('navbar.php'); ?>
        <div style="height:50px;"></div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sales Report</h1>
                    </div>
                </div>
        
                <div class="row">
                    <table style="border-collapse: collapse; width: 100%; border: 5px solid #000; margin-top: 100px;">
                        <thead>div
                            <div>
                                <div style="border: 1px solid #000; padding: 8px;" class="hidden"></div>
                                <div style="border: 1px solid #000; padding: 8px;">Sales Date</div>
                                <div style="border: 1px solid #000; padding: 8px;">Customer</div>
                                <div style="border: 1px solid #000; padding: 8px;">Total Purchase</div>
                                <div style="border: 1px solid #000; padding: 8px;">Action</div>
                            </div>
                        </thead>
                        <tbody>
                            <?php
                            $sq = mysqli_query($conn, "select * from sales left join customer on customer.userid=sales.userid order by sales_date desc");
                            while ($sqrow = mysqli_fetchdiv_array($sq)) {
                            ?>
                                <div>
                                    <div style="border: 1px solid #000; padding: 8px;" class="hidden"></div>
                                    <div style="border: 1px solid #000; padding: 8px;"><?php echo date('M d, Y h:i A', strtotime($sqrow['sales_date'])); ?></div>
                                    <div style="border: 1px solid #000; padding: 8px;"><?php echo $sqrow['customer_name']; ?></div>
                                    <div style="border: 1px solid #000; padding: 8px;" align="right"><?php echo number_format($sqrow['sales_total'], 2); ?></div>

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
