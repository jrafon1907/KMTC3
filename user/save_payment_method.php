<?php
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if payment_method is set and not empty
    if (isset($_POST['payment_method']) && !empty($_POST['payment_method'])) {
        // Sanitize input to prevent SQL injection
        $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);

        // Insert payment method into the database
        $sql = "INSERT INTO payments (payment_method) VALUES ('$payment_method')";
        if (mysqli_query($conn, $sql)) {
            echo "Payment method saved successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Payment method is required.";
    }
} else {
    echo "Invalid request.";
}
?>