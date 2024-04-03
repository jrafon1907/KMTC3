<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
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

<?php
include('session.php');
include('conn.php');

$id = isset($_GET['product_id']) ?(int)$_GET['product_id'] : null;


$p = $conn->prepare("SELECT * FROM product JOIN category ON product.categoryid = category.categoryid WHERE product.productid = ?;");
    $p->bind_param("i", $id);
    $p->execute();
    $presult = $p->get_result();
    while($prow = mysqli_fetch_assoc($presult)) {
        $productid = $prow['productid'];
        $productname = $prow['product_name'];
        $productdes = $prow['product_des'];
        $productprice = $prow['product_price'];
        $productqty = $prow['product_qty'];
        $location = $prow['photo'];
        
        $categoryid = $prow['categoryid'];
        $categoryname = $prow['category_name'];
    }

        $p = $conn->prepare("SELECT * FROM product WHERE productid=?");
        $p->bind_param("i", $id);
        $p->execute();
        $presult = $p->get_result();
        $prow = $presult->fetch_assoc();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            

        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $qty = $_POST['product_qty'];
        $product_des = $_POST['product_des'];
        $unit_of_measure = isset($_POST['unit_of_measure']) ? $_POST['unit_of_measure'] : null;
        $product_exp = isset($_POST['expiration_date']) ? $_POST['expiration_date'] : null; // Corrected from product_exp

        $stmt = $conn->prepare("UPDATE product SET product_name=?, categoryid=?, product_price=?, product_qty=?, product_des=?, unit_of_measure=?, product_exp=? WHERE productid=?");
        $stmt->bind_param("siiisssi", $name, $categoryid, $price, $qty, $product_des, $unit_of_measure, $product_exp, $id);



    $stmt->execute();


    if ($qty != $prow['product_qty']) {
        $inventoryStmt = $conn->prepare("INSERT INTO inventory (userid, action, productid, quantity, inventory_date) VALUES (?, 'Update Quantity', ?, ?, NOW())");
         $inventoryStmt->bind_param("iii", $_SESSION['id'], $id, $qty);
         $inventoryStmt->execute();
    }

    echo '<script>alert("Product updated successfully!"); window.location.href = "product.php";</script>';
}


?>




<form action="edit_product.php?product_id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
    <label for="name">Product Name:</label>
    <input type="text" id="name" name="product_name" value="<?php echo isset($prow['product_name']) ? $prow['product_name'] : ''; ?>">

    <label for="product_des">Product Description:</label>
    <textarea id="product_des" name="product_des"><?php echo isset($prow['product_des']) ? $prow['product_des'] : ''; ?></textarea> 

    <label for="unit_of_measure">Unit of Measure:</label>
    <input type="text" id="unit_of_measure" name="unit_of_measure" value="<?php echo isset($prow['unit_of_measure']) ? $prow['unit_of_measure'] : ''; ?>">

    <label for="expiration_date">Expiration Date:</label>
    <input type="date" id="expiration_date" name="expiration_date" value="<?php echo isset($prow['product_exp']) ? $prow['product_exp'] : ''; ?>">



    <label for="price">Price:</label>
    <input type="text" id="price" name="product_price" value="<?php echo isset($prow['product_price']) ? $prow['product_price'] : ''; ?>">

    <label for="qty">Quantity:</label>
    <input type="text" id="qty" name="product_qty" value="<?php echo isset($prow['product_qty']) ? $prow['product_qty'] : ''; ?>">

    

    <button type="submit">Update Product</button>
    <button type="button" style="background: #d9534f" onclick="cancelUpdate()">Cancel</button>
</form>

<script>
    function cancelUpdate() {
        // Redirect to the desired page (replace 'other_page.php' with the actual page)
        window.location.href = "product.php";
    }
</script>
        </form>
</form>

</body>
</html>

<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<div class="success-message">Product updated successfully!</div>';
}
?>
