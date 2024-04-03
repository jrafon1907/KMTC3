<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

$servername = "localhost";
$username = "root";
$password = "";
$pos = "pos";

$conn = mysqli_connect($servername, $username, $password, $pos);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nameErr = $addressErr = $contactErr = $emailErr = $usernameErr = $passwordErr = "";
$name = $address = $contact = $email = $username = $password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation for Name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Validation for Address
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
        // Additional address validation if needed
    }

// Validation for Contact
if(isset($_POST['contact'])) {
    $contact = $_POST['contact'];
    // Remove whitespace characters
    $contact = preg_replace('/\s+/', '', $contact);
    // Check if contact is exactly 11 digits long
    if (preg_match("/^\d{11}$/", $contact)) {
        // If the contact is valid, proceed with further actions
    } else {
        // Display an error message using JavaScript alert
        echo "<script>alert('Mobile number should be exactly 11 digits long. Please sign up again.');</script>";
        // Redirect to the signup page using JavaScript
        echo "<script>window.location.href = 'signup.php';</script>";
        exit; // Ensure that no further code is executed after the redirection
    }
}



   // Validation for Email
if (empty($_POST["email"])) {
    $emailErr = "Email is required";
} else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    } else {
        // Check if the email address is from Yahoo or Gmail domain
        $allowedDomains = array('yahoo.com', 'gmail.com');
        $emailParts = explode('@', $email);
        $domain = end($emailParts);
        
        if (!in_array($domain, $allowedDomains)) {
            echo "<script>window.alert('Only Yahoo and Gmail email addresses are allowed'); window.location.href = 'signup.php';</script>";
            exit;
        }
    }
}




    // Validation for Password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        // Additional password validation if needed
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : "";
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Check if the email is already used
    $emailCheck = "SELECT * FROM customer WHERE customer_email = '$email'";
    $result = mysqli_query($conn, $emailCheck);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>window.alert('Email address already registered. Please use a different email.'); window.location.href = 'signup.php';</script>";
        exit;
    }

    // Insert user into the database
    $user = "INSERT INTO user (username, password, access, is_verified) VALUES ('$username', '$password', '2', '0')";
    mysqli_query($conn, $user);
    $userid = mysqli_insert_id($conn);

    $customer = "INSERT INTO customer (userid, customer_name, customer_address, customer_contact, customer_email) VALUES ('$userid', '$name', '$address', '$contact', '$email')";
    mysqli_query($conn, $customer);

    // Send email confirmation to the user using PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0; // Set to 2 for detailed debugging
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Update with your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'jrafon0710@gmail.com'; // Update with your SMTP username
        $mail->Password = 'tcdvqlvmjcbgqhlk'; // Update with your SMTP password
        $mail->SMTPSecure = 'ssl'; // Use 'tls' or 'ssl'
        $mail->Port = 465; // Use 587 for TLS, 465 for SSL



        // Recipients
        $mail->setFrom('jrafon0710@gmail.com', 'KMTC Pet Supplies');
        $mail->addAddress($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Registration Confirmation';
        $mail->Body    = "Thank you for registering with us, $name! Your registration is successful.";

        $mail->send();
        echo "<script>window.alert('Customer added successfully! Check your email for confirmation.'); window.location.href = 'index.php';</script>";
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<link href="upload/logo.png" rel="shortcut icon">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=ADLaM Display' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofGJFC6H9tiIepompGvlK1+0R2L4N2G9l3" crossorigin="anonymous">
    <title>Sign Up</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  background:  #e8847c;
}
.container{
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.7);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background:  #e8847c;
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
button {
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background:  #e8847c;;
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background:  #e8847c;;
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}

#custom-submit-button {
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background:  #e8847c;
   margin-bottom: 10px;
}
    </style>
</head>

<body style="background: #E7E7E7;">

        <div class="container">
    <div class="title" style="font-family:'ADLaM Display';font-size: 25px;">Sign Up</div>

    <div class="content">

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="name" required placeholder="Firstname, Mi, Lastname">
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" required required placeholder="Enter Address">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
           <input type="email" name="email" required required placeholder="Enter Email">
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="tel" name="contact" maxlength="11" required placeholder="Enter Contact No#" value="<?php echo $contact; ?>">
            <span class="error"><?php echo $contactErr; ?></span>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" required required placeholder="Enter Username">
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" required required placeholder="Enter Password">
          </div>
        </div>

         <div class="input-box">
            <input type="checkbox" name="terms_and_conditions" id="terms_and_conditions" required>
            <label for="terms_and_conditions">I agree to the terms and conditions</label>
        </div>


        <div class="form-group">
            <input type="submit" value="Submit" id="custom-submit-button">
            <a href="index.php"><button type="button">Cancel</button></a>
        </div>
    </form>

            <?php
        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if the terms and conditions checkbox is checked
            if (!isset($_POST['terms_and_conditions'])) {
                echo "<p style='color: red;'>Please agree to the terms and conditions.</p>";
            } else {
                // Proceed with the signup process
                // Your existing PHP signup code here
            }
        }
        ?>

</body>
</html>
