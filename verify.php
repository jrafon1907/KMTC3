<?php
$servername = "localhost";
$username = "root";
$password = "";
$pos = "pos";

$conn = mysqli_connect($servername, $username, $password, $pos);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['user'])) {
    $userid = mysqli_real_escape_string($conn, $_GET['user']);

    $updateUser = "UPDATE user SET is_verified = 1 WHERE id = '$userid'";
    mysqli_query($conn, $updateUser);

    echo "Email verification successful. You can now login.";
} else {
    echo "Invalid verification link.";
}
?>
