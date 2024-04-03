<?php
include('session.php');
$cpass = $_POST['cpass'];
$repass = $_POST['repass'];

if ($cpass != $repass) {
    ?>
    <script>
        window.alert('Required passwords did not match. Account not updated!');
        window.history.back();
    </script>
    <?php
} elseif (!password_verify($cpass, $srow['password'])) {
    ?>
    <script>
        window.alert('Current password did not match. Account not updated!');
        window.history.back();
    </script>
    <?php
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Update user information using prepared statement
    $stmt = $conn->prepare("UPDATE `user` SET `username`=?, `password`=? WHERE `userid`=?");
    $stmt->bind_param("ssi", $username, $hashedPassword, $_SESSION['id']);
    $stmt->execute();
    $stmt->close();

    // Check if the 'activitylog' table exists, if not, create it
    $checkTableQuery = "SHOW TABLES LIKE 'activitylog'";
    $result = mysqli_query($conn, $checkTableQuery);

    if (mysqli_num_rows($result) == 0) {
        // 'activitylog' table doesn't exist, create it
        $createTableQuery = "
            CREATE TABLE activitylog (
                log_id INT AUTO_INCREMENT PRIMARY KEY,
                userid INT,
                action VARCHAR(255),
                activity_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
        ";
        mysqli_query($conn, $createTableQuery);
    }

    // Insert activity log using prepared statement
    $stmt = $conn->prepare("INSERT INTO activitylog (`userid`, `action`) VALUES (?, 'Update account')");
    $stmt->bind_param("i", $_SESSION['id']);
    $stmt->execute();
    $stmt->close();

    ?>
    <script>
        window.alert('Account updated successfully!');
        window.history.back();
    </script>
    <?php
}

?>
