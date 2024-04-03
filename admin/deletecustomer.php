<?php
	include('session.php');
	
	$id = $_GET['id'];
	
	// Attempt to delete records
	$deleteUserQuery = "DELETE FROM user WHERE userid='$id'";
	$deleteCustomerQuery = "DELETE FROM customer WHERE userid='$id'";
	
	if (mysqli_query($conn, $deleteUserQuery) && mysqli_query($conn, $deleteCustomerQuery)) {
	    // Deletion successful
	    header('location:customer.php');
	} else {
	    // Deletion failed
	    echo "Error deleting record: " . mysqli_error($conn);
	}

	// Close the connection
	mysqli_close($conn);
?>
