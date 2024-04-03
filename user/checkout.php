<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body style="background: #E7E7E7;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <div class="container">
        <div style="height:100px;"></div>
        <div class="row">
            <div class="col-lg-12">
                <a href="index.php" class="btn btn-primary" style="position:relative; left:3px; background: #d9534f;"><span class="glyphicon glyphicon-arrow-left"></span> Cancel</a>
            </div>
        </div>
        <div style="height:10px; "></div>
        <div id="checkout_area"></div>
        <div class="row">
            <span class="pull-right" style="margin-right:15px; font-size: 15px;">
                <strong><i class='fas fa-donate'></i>  Payment Option:</strong>
                <select id="payment_method" name="payment_method">
                    <option>Choose payment method</option>
                    <option value="cash_on_delivery">Cash on Delivery</option>
                    <option value="gcash">Gcash</option>
                </select>
            </span>
        </div>
        <div style="height:20px;"></div>
        <div class="row">
            <button type="button" id="check" class="btn btn-primary pull-right" style="margin-right:15px;">
                 Place Order
            </button>
        </div>
    </div>

    <!-- Include necessary JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <?php include('script.php'); ?>
    <script src="custom.js"></script>
    <script>
        $(document).ready(function(){
            showCheckout();

             $('#check').click(function(){
                var paymentMethod = $('#payment_method').val();
                $.ajax({
                    type: 'POST',
                    url: 'save_payment_method.php',
                    data: { payment_method: paymentMethod },
                    success: function(response) {
                        alert(response); // You can handle the response accordingly
                    }
                });
            });
        });
    </script>
</body>
</html>
