<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Purchase Full Details</title>
    <!-- Include CSS stylesheets and any necessary assets here -->
</head>
<body style="overflow: hidden; ">
    <style>
       body {
         font-family: Arial, sans-serif;
		  background-color: #f4f4f4;
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
                <div class="modal-header text-center">
    <img src="../upload/logo.png" alt="Your Logo" style="max-width: 80px; max-height: 80px; display: block; margin: 0 auto;">
    <h2 class="modal-title" id="myModalLabel"><center>KMTC Receipt</h2> 
        <p style="text-align: center; font-weight: bold;">250 Sumulong Hwy, Antipolo, 1870 Rizal, Philippines</p>
        <p style="text-align: center; font-weight: bold;">Tel / Phone #  +639326225275 / 09948019153</p>
        <p style="text-align: center; font-weight: bold;">Bir Accr # 116-000390189-000346</p>
        <p style="text-align: center; font-weight: bold;">Seller : Merril Ann Anclote</p>


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

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <span>Customer: <strong><?php echo isset($salesData['customer_name']) ? ucwords($salesData['customer_name']) : ''; ?></strong></span>
                            </div>
                            <div class="col-lg-3">
    <span>Date: <strong><?php echo isset($salesData['sales_date']) ? date("l, F d, Y", strtotime($salesData['sales_date'])) : ''; ?></strong></span>
</div>
                            <div class="col-lg-3">
                            <span>Time: <strong><?php echo isset($salesData['sales_date']) ? date("h:i:s A", strtotime($salesData['sales_date'])) : ''; ?></strong></span>
                        </div>

                        </div>
                        <div style="height: 10px;"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table id="receiptTable" width="100%" class="table table-striped table-bordered table-hover">
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

                    <div class="modal-footer" id="modalFooter">
                        <button type="button" onclick="window.location.href='sales.php';" style="background: #d9534f; color: white; border-radius: 5px;">Cancel</button>
                        <button type="button" onclick="printReceipt();" class="btn btn-info wow fadeInDown" style="background: #4caf50; border-radius: 5px;"><i class="glyphicon glyphicon-print"></i> Print Receipt</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include your JavaScript code here -->
   <script>
    function printReceipt() {
        // Hide the buttons before printing
        document.getElementById('modalFooter').style.display = 'none';

        // Get the modal content to print
        var modalContent = document.getElementById('detailModal');

        // Create a new window to print
        var printWindow = window.open('', '_blank');

        // Write the modal content to the new window
        printWindow.document.write('<html><head><title>Purchase full detail</title>');
        printWindow.document.write('<style>body {font-family: "Arial", sans-serif;} table {width: 100%; border-collapse: collapse;} th, td {border: 3px solid black; padding: 8px; text-align: left;} th {background-color: #f2f2f2;}</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<div class="container-fluid">' + modalContent.innerHTML + '</div>');
        printWindow.document.write('</body></html>');

        // Close the new window after printing
        printWindow.document.close();
        printWindow.print();
        printWindow.close();

        // Show the buttons after printing
        document.getElementById('modalFooter').style.display = 'block';
    }
</script>

</body>
</html>
