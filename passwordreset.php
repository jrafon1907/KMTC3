<?php
include_once('conn.php');

$msg = ""; // Initialize the message variable
$predefined_password = "javee"; // Define the predefined password

if(isset($_POST['pwdrst'])) {
    $username = $_POST['username']; // Retrieve username
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];

    // Check if the password matches the predefined password
    if ($pwd !== $predefined_password) {
        $msg = "Incorrect password for password reset.";
    } else {
        // Check if the username exists in the database
        $check_user = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
        $user_exists = mysqli_num_rows($check_user);

        if($user_exists > 0) {
            // Username exists, now proceed with password update
            if($pwd === $cpwd) {
                // Update password for the user with the provided username
                $reset_pwd = mysqli_query($conn, "UPDATE user SET password='$pwd' WHERE username='$username'");
                
                if($reset_pwd) {
                    $msg = 'Your password updated successfully <a href="index.php">Click here</a> to login';
                } else {
                    $msg = "Error while updating password.";
                }
            } else {
                $msg = "Password and Confirm Password do not match";
            }
        } else {
            $msg = "Username does not exist";
        }
    }
}
?>
<html>  
<head>  
    <title>Password Reset</title>  
    
</head>
<style>
 body {
    font-family: arial, sans-serif;
    background-color: #E7E7E7;
}

.container {
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
}

.box {
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 16px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
}

.btn:hover {
    background-color: #218838;
}

.error {
    color: red;
    font-weight: 700;
}

</style>
<body>
    <div class="container">  
        <div class="table-responsive">  
            <h3 align="center">Reset Password</h3><br/>
            <div class="box">
                <form id="validate_form" method="post">  
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter Username" required class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="password" name="pwd" id="pwd" placeholder="Enter Password" required data-parsley-type="pwd" data-parsley-trigger="keyup" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="cpwd">Confirm Password</label>
                        <input type="password" name="cpwd" id="cpwd" placeholder="Enter Confirm Password" required data-parsley-type="cpwd" data-parsley-trigger="keyup" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="login" name="pwdrst" value="Reset Password" class="btn btn-success" />
                    </div>
                    <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
                </form>
            </div>
        </div>  
    </div>
</body>
</html>
