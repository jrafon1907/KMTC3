<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Order Details</title>
    <!-- Include CSS stylesheets and any necessary assets here -->
</head>
<body style="overflow: hidden; ">
    <style>
       body {
         font-family: Arial, sans-serif;
		  background-color:  #e8847c;
        }
         .modal-content {
        }
        border-radius: 0; /* Optional: Adjust the border-radius as needed */
    }

    .modal-header {
        background-color: #337ab7; /* Change the background color as needed */
        color: #fff; /* Change the text color as needed */
    }

    .modal-body {
        padding: 20px; /* Optional: Adjust the padding as needed */
    }

    .modal-footer {
        background-color: #f5f5f5; /* Change the background color as needed */
        border-top: 1px solid #ddd; /* Optional: Add a border on top of the footer */
    }

    #receiptTable {
        /* Optional: Add styles for your table */
        width: 100%;
        border-collapse: collapse;
    }

    #receiptTable th, #receiptTable td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    #receiptTable th {
        background-color: #f2f2f2;
    }

    .btn-info {
        background-color: #5bc0de; /* Change the background color of the Print Receipt button */
        color: #fff; /* Change the text color of the Print Receipt button */
    }
    </style>

    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-center" id="myModalLabel" style="color: whitesmoke;"><center>Order Details</h1>
                </div>
                <div class="modal-body">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbase = "pos";

                    // Establish a database connection
                    $conn = new mysqli($servername, $username, $password, $dbase);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Check if 'salesid' is provided in the URL
                    if (isset($_GET['salesid'])) {
                        $salesid = $_GET['salesid'];

                        // Retrieve sales details from the database based on 'salesid'
                        $salesQuery = "SELECT s.*, c.customer_name 
                                       FROM sales s
                                       LEFT JOIN customer c ON s.userid = c.userid
                                       WHERE s.salesid = ?";
                        $stmt = $conn->prepare($salesQuery);
                        $stmt->bind_param("s", $salesid);
                        $stmt->execute();
                        $salesResult = $stmt->get_result();

                        if ($salesResult->num_rows > 0) {
                            $salesData = $salesResult->fetch_assoc();
                        } else {
                            echo "Sales record not found.";
                            exit;
                        }
                    } else {
                        echo "Sales ID not provided in the URL.";
                        exit;
                    }
                    ?>

                      <button onclick="goBack()" style="background: whitesmoke; margin-bottom: 30px; border-radius: 5px;"><i class="fa fa-long-arrow-left" style="font-size:24px"></i></button>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 text-right">
                                <span style="color: whitesmoke; font-weight: bold;">Date: <strong><?php echo isset($salesData['sales_date']) ? date("F d, Y", strtotime($salesData['sales_date'])) : ''; ?></strong></span>
                            </div>
                        </div>
                        <div style="height: 10px;"></div>
                        <div class="row" style="background:#E7E7E7;">
                            <div class="col-lg-12">
                                <table id="receiptTable" width="100%" class="table table-striped table-bordered table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th class="text-center">Purchase Qty</th>
                                            <th>SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        $pd = mysqli_query($conn, "SELECT * FROM sales_detail LEFT JOIN product ON product.productid = sales_detail.productid WHERE salesid = '$salesid'");

                                        while ($pdrow = mysqli_fetch_array($pd)) {
                                        ?>
                                            <tr>
                                                <td><?php echo ucwords($pdrow['product_name']); ?></td>
                                                <td align="right"><?php echo number_format($pdrow['product_price'], 2); ?></td>
                                                <td class="text-center"><?php echo $pdrow['sales_qty']; ?></td>
                                                <td align="right">
                                                    <?php
                                                    $subtotal = $pdrow['product_price'] * $pdrow['sales_qty'];
                                                    echo number_format($subtotal, 2);
                                                    $total += $subtotal;
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                        <tr>
                                            <td colspan="3" align="right"><strong>Total</strong></td>
                                            <td align="right"><strong><?php echo number_format($total, 2); ?></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                   
                </div>
            </div>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
