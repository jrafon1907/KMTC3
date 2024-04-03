<?php
	session_start();
	
	include('../conn.php');
	
	// Check if 'userlog' key is set in $_SESSION
	if(isset($_SESSION['userlog'])) {
		$userlogid = $_SESSION['userlog'];
		
		// Use prepared statement to prevent SQL injection
		$stmt = $conn->prepare("UPDATE userlog SET logout = NOW() WHERE userlogid = ?");
		$stmt->bind_param("s", $userlogid);
		$stmt->execute();
		$stmt->close();
	}
	
	session_destroy();
	header('location:../web.php');
?>
