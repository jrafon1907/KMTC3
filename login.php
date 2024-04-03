<?php
include('conn.php');
session_start();

function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);    
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = check_input($_POST['username']);
    $password = check_input($_POST["password"]);

    if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
        $_SESSION['msg'] = "Username should not contain spaces or special characters!";
        header('location: index.php');
        exit(); // Exit to prevent further execution
    }

    $stmt = $conn->prepare("SELECT * FROM `user` WHERE BINARY username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 0) {
        $_SESSION['msg'] = "Your account and/or password is incorrect, please try again";
        header('location: index.php');
        exit(); // Exit to prevent further execution
    } else {
        $row = $result->fetch_assoc();
        // Check if the passwords match case-sensitively
        if ($row['password'] !== $password) {
            $_SESSION['msg'] = "Your account and/or password is incorrect, please try again";
            header('location: index.php');
            exit(); // Exit to prevent further execution
        }

        $_SESSION['id'] = $row['userid'];

        switch ($row['access']) {
            case 1:
                $_SESSION['role'] = 'admin';
                break;
            case 2:
                $_SESSION['role'] = 'user';
                break;
        }

        $redirect_url = $_SESSION['role'] . '/';
        header('location: ' . $redirect_url);
        exit(); // Exit to prevent further execution
    }

    $stmt->close();
}
?>