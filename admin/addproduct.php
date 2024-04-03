<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
                body {
            overflow: scroll;
            background: #E7E7E7;
            font-family: arial, sans-serif;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group.input-group {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }
        .input-group-addon {
            width: 120px;
            padding: 8px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-right: none;
            border-radius: 4px 0 0 4px;
            box-sizing: border-box;
            flex: 0 0 auto;
            text-align: center;
        }
        .form-control {
            flex: 1 1 auto;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 0 4px 4px 0;
            box-sizing: border-box;
        }
        input[type="file"] {
            padding: 6px;
        }
        input[type="submit"],
        input[type="button"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: #fff;
            background-color: #4caf50;
        }
        input[type="button"] {
            background-color: #d9534f;
            margin-left: 10px;
        }
        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #286090;
        }
 
    </style>
</head>
<body style="overflow: scroll; background: #E7E7E7;">

<?php
    include('session.php');
    include('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $product_des = $_POST['product_des']; // Product Description
    $expiration_date = $_POST['expiration_date']; // Expiration Date
    $unit_of_measure = $_POST['unit_of_measure']; // Unit of Measure

    $fileInfo = PATHINFO($_FILES["image"]["name"]);

    if (empty($_FILES["image"]["name"])) {
        $location = "";
    } else {
        if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
            $newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
            move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
            $location = "upload/" . $newFilename;
        } else {
            $location = "";
            echo "<script>window.alert('Photo not added. Please upload JPG or PNG photo only!');</script>";
        }
    }

    // Insert the product
    mysqli_query($conn, "INSERT INTO product (product_name, categoryid, product_price, product_qty, product_des, product_exp, unit_of_measure, photo, created_at) 
    VALUES ('$name', '$category', '$price', '$qty', '$product_des', '$expiration_date', '$unit_of_measure', '$location', NOW())");

    // Get the ID of the newly inserted product
    $pid = mysqli_insert_id($conn);

    // Insert into the inventory table
    mysqli_query($conn, "INSERT INTO inventory (userid, action, productid, quantity, inventory_date) VALUES ('".$_SESSION['id']."', 'Add Product', '$pid', '$qty', NOW())");

    // Redirect after adding the product
    echo "<script>window.alert('Product added successfully!'); window.location.href = 'product.php';</script>";
}
?>


    
<div class="container"> 
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group input-group">
            <span style="width:150px;" class="input-group-addon">Product Name</span>
            <input type="text" style="text-transform:capitalize;" class="form-control" name="name" required>
        </div>

        <!-- Category Selection Dropdown -->
        <div class="form-group input-group">
            <span style="width:150px;" class="input-group-addon">Category </span>
            <select class="form-control" name="category">
                <?php
                $cat=mysqli_query($conn,"select * from category");
                while($catrow=mysqli_fetch_array($cat)){
                ?>
                    <option value="<?php echo $catrow['categoryid']; ?>"><?php echo $catrow['category_name']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>


            
        <!-- Product Description Input -->
        <div class="form-group input-group">
            <span for="product_des" style="width:150px;" class="input-group-addon"> ProductDescription</span>
            <textarea name="product_des" class="form-control" required></textarea>
        </div>

        <!-- Expiration Date Input -->
        <div class="form-group input-group">
            <span style="width:150px;" class="input-group-addon">Expiration Date</span>
            <input type="date" class="form-control" name="product_exp">
        </div>

        <!-- Unit of Measure Input -->
        <div class="form-group input-group">
            <span style="width:150px;" class="input-group-addon">Unit of Measure</span>
            <input type="text" class="form-control" name="unit_of_measure">
        </div>




        <!-- Price Input -->
        <div class="form-group input-group">
            <span style="width:150px;" class="input-group-addon">Price</span>
            <input type="text" class="form-control" name="price" required>
        </div>

        <!-- Quantity Input -->
        <div class="form-group input-group">
            <span style="width:150px;" class="input-group-addon">Stock Quantity</span>
            <input type="text" class="form-control" name="qty">
        </div>

        <!-- Photo Upload Input -->
        <div class="form-group input-group">
            <span style="width:150px;" class="input-group-addon">Photo</span>
            <input type="file" class="form-control" name="image">
        </div>

        <div>
            <input type="submit" value="Add Product">
            <input type="button" style="background: #d9534f" value="Cancel" onclick="window.location.href='product.php';">
        </div>
    </form>
</body>
</html>
