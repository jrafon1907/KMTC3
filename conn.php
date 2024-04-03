<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbase = "pos";

$conn = new mysqli($servername, $username, $password, $dbase);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
