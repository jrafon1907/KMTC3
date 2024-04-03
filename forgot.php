<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';
?>
<html>  
<head>  
    <title>Forgot Password</title>  
    
</head>
<style>
            body {
            font-family: arial, sans-serif;
             background-color: #E7E7E7;
        }

        .box {
            width: 100%;
            max-width: 600px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 16px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            font-weight: 700;
        }

        .back-button {
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
        background-color: #ccc;
        color: #333;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
        margin-left: 350px;
        margin-bottom: 20px;
    }

    .back-button:hover {
        background-color: #999;
        color: #fff;
    }
</style>
<?php
include_once('conn.php');
if(isset($_REQUEST['pwdrst']))
{
  $email = $_REQUEST['email'];
  $check_email = mysqli_query($conn,"SELECT customer_email FROM customer WHERE customer_email='$email'");
  $res = mysqli_num_rows($check_email);
  if($res>0)
  {
    $message = '<div>
     <p><b>Hello!</b></p>
     <p>You are recieving this email because we recieved a password reset request for your account.</p>
     <br>
     <p><button class="btn btn-primary"><a href="http://localhost/kmtc/passwordreset.php?secret='.base64_encode($email).'">Reset Password</a></button></p>
     <br>
     <p>If you did not request a password reset, no further action is required.</p>
    </div>';


$email = $email; 
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPAuth = true;                 
$mail->SMTPSecure = "tls";      
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587; 
$mail->Username = "jrafon0710@gmail.com";   //Enter your username/emailid
$mail->Password = "tcdvqlvmjcbgqhlk";   //Enter your password
$mail->FromName = "KMTC SUPPORT";
$mail->AddAddress($email);
$mail->Subject = "Reset Password";
$mail->isHTML( TRUE );
$mail->Body =$message;
if($mail->send())
{
  $msg = "We have e-mailed your password reset link!";
}
}
else
{
  $msg = "We can't find a user with that email address";
}
}

?>
<body>
    <div class="container">  
        <div class="table-responsive">
            <br>  
            <h3 align="center">Forgot Password</h3><br/>
            <button onclick="window.history.back();" class="back-button">Back</button>
            <div class="box">
                <form id="validate_form" method="post">  
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" id="email" placeholder="Enter Email" required 
                        data-parsley-type="email" data-parsley-trigger="keyup" class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="submit" id="login" name="pwdrst" value="Send Password Reset Link" class="btn btn-success" />
                    </div>
                    
                    <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
                </form>
            </div>
        </div>  
    </div>
</body>
