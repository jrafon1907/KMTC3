<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
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
<body>
    <div class="container">
        <?php
        include('session.php');
        include('conn.php');

        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

        $s = $conn->prepare("SELECT * FROM supplier WHERE userid=?");
$s->bind_param("i", $id);
$s->execute();
$sresult = $s->get_result();
while($srow = mysqli_fetch_assoc($sresult)) {
    $userid = $srow['userid'];
    $fullname = $srow['full_name'];
    $name = $srow['company_name'];
    $address = $srow['company_address'];
    $contact = $srow['contact'];
    
}

$s = $conn->prepare("SELECT * FROM supplier WHERE userid=?");
$s->bind_param("i", $id);
$s->execute();
$sresult = $s->get_result();
$srow = $sresult->fetch_assoc(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $fullname = $_POST['full_name'];
            $name = $_POST['company_name'];
            $address = $_POST['company_address'];
            $contact = $_POST['contact'];

            $stmt = $conn->prepare("UPDATE supplier SET company_name=?, full_name=?, company_address=?, contact=? WHERE userid=?");
            $stmt->bind_param("ssssi", $name, $fullname, $address, $contact, $id);

            $stmt->execute();

            echo '<script>alert("Supplier updated successfully!"); window.location.href = "supplier.php";</script>';
            
        }
        ?>


        <form action="edit_supplier.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" value="<?php echo isset($srow['full_name']) ? $srow['full_name'] : ''; ?>">

        <label for="company_name">Company Name:</label>
        <input type="text" id="company_name" name="company_name" value="<?php echo isset($srow['company_name']) ? $srow['company_name'] : ''; ?>">

        <label for="company_address">Address:</label>
        <input type="text" id="company_address" name="company_address" value="<?php echo isset($srow['company_address']) ? $srow['company_address'] : ''; ?>">

        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" value="<?php echo isset($srow['contact']) ? $srow['contact'] : ''; ?>">



            <button type="submit">Update Supplier</button>
             <button type="button" style="background: #d9534f" onclick="cancelUpdate()">Cancel</button>
</form>

<script>
    function cancelUpdate() {
        // Redirect to the desired page (replace 'other_page.php' with the actual page)
        window.location.href = "supplier.php";
    }
</script>
        </form>
    </div>
</body>
</html>
