<?php
include('session.php');
include('conn.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function processCheckout($conn) {
    // Retrieve data from the cart table
    $cartQuery = "SELECT product_id, quantity FROM cart"; // Adjusted the column names
    $cartResult = $conn->query($cartQuery);

    if ($cartResult) { // Check if the query was executed successfully
        if ($cartResult->num_rows > 0) {
            // Process each item in the cart
            while ($row = $cartResult->fetch_assoc()) {
                // Example: Update the product inventory, record the purchase history, etc.
                // This part should be tailored based on your specific business logic.
                
                // You may need to update product inventory, record purchase history, etc.
                // Update your database tables accordingly.
                // Example: 
                // $productId = $row['product_id'];
                // $quantity = $row['quantity'];
                // Update product inventory and record purchase history here.
                
            }

            // After processing, clear the cart
            $clearCartQuery = "DELETE FROM cart";
            if ($conn->query($clearCartQuery) === TRUE) {
                echo "Cart cleared successfully";
            } else {
                echo "Error clearing cart: " . $conn->error;
            }
        } else {
            echo "Cart is empty";
        }
    } else {
        echo "Error fetching cart items: " . $conn->error;
    }
}


// Call the checkout process function
processCheckout($conn);

// Close the database connection
$conn->close();
?>
