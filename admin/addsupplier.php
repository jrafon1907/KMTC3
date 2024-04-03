<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body style="overflow: hidden; background: #E7E7E7;">
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Company Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required>

        <label for="address">Company Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" required>

        <button type="submit">Add Supplier</button>
        <a href="supplier.php"><button style="background: #d9534f;" type="button">Cancel</button></a>
    </form>

    <?php
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $fullaname = $_POST['fullname'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    
    $result = mysqli_query($conn, "INSERT INTO supplier (company_name, full_name,  company_address, contact) VALUES ('$name','$fullaname', '$address', '$contact')");

    if ($result) {
        echo "<script>window.alert('Supplier added successfully!'); window.location.href = 'supplier.php';</script>";
    } else {
        // Display the error message
        echo '<script>
                window.alert("Error adding supplier: ' . mysqli_error($conn) . '");
                window.history.back();
              </script>';
    }

    mysqli_close($conn);
}
?>
</body>
</html>
