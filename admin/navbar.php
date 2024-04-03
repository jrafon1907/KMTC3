<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="link-icon.png" type="image/png"> <!-- Replace "link-icon.png" with your actual icon file -->
    <title>Your Page Title</title> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Verdana', sans-serif;
            background-color: #f0f0f0; 
        }

        .sidebar {
            background-color: #e8847c; 
            padding: 10px;
            height: 100vh; 
            width: 30vh;
            color: white;
        }

        .sidebar img {
            padding: 20px;
            max-width: 80%;
            margin-bottom:3px;
            
        }

        .nav {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .nav li {
            margin-bottom: 20px;
        }

        .nav a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            transition: background-color 0.2s, color 0.2s;
            padding: 10px;
            border-radius: 5px;
            display: block;
        }

        .nav a:hover {
            color: black;


        }

        .sidebar-heading {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .logo-icon {
            max-width: 40px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <img src="../upload/logo.png" alt="Logo" />

    <ul class="nav" id="side-menu">
        <li>
            <a href="index.php"><i class="fas fa-home"></i> Home</a>
        </li>
        <li>
            <a href="customer.php"><i class="fas fa-users"></i> Customer</a>
        </li>
        <li>
            <a href="supplier.php"><i class="fas fa-truck"></i> Suppliers</a>
        </li>
        <li>
            <a href="product.php"><i class="fas fa-cube"></i> Products</a>
        </li>
        <li>
            <a href="sales.php"><i class="fas fa-chart-bar"></i> Sales Report</a>
        </li>
        <li>
            <a href="inventory.php"><i class="fas fa-file-alt"></i> Inventory Report</a>
        </li>
        <br><br>
        <li>
            <a href="logout.php" data-toggle="modal"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
    </ul>
</div>

<!-- Add the rest of your HTML content here -->

</body>
</html>
