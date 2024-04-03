    <?php 
         include('conn.php'); // Assuming this file contains your database connection code

    // Start the session to access session variables
    session_start();

    // Check if userid is set in the session
    if(isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];

        // Query to fetch customer information based on customer ID
        $customerQuery = mysqli_query($conn, "SELECT customer_name FROM customers WHERE userid = $userid");

        if($customerQuery) {
            // Fetch the customer information
            $customerRow = mysqli_fetch_assoc($customerQuery);
            if ($customerRow) {
                $customer_name = $customerRow['customer_name'];
            } else {
                // If no customer name is found, provide a default value
                $customer_name = "Unknown Customer";
            }
        } else {
            echo "Error: " . mysqli_error($conn); // Print any SQL error for debugging
        }
    } else {
        // Handle the case where userid is not set in the session
        echo "User ID is not set in the session.";
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>KMTC PET SUPPLIES</title>
    </head>
    <body onload="updateTotalQuantity()">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<style>
    * {
text-decoration: none;
}

     #cartme:hover a,
    #history:hover a {
        color: #FFA500; /* Orange color on hover */
    }


    .navbar-nav .paks {
        color:#B79D94; /* Orange color for normal state */
    }

    .navbar-nav .paks a {
        color: #B79D94; /* White color for normal state */
        display: inline-block;
    }
    .nav a:hover {
            background-color: black ;
        }

.dropdown {
  cursor:pointer;
  position: relative;
  display: inline-block;
  margin-left: 50px;
  margin-top: 20px;
  width: 130px;
  color: white;
}

.dropdown-content {
  list-style: none; /* Add this line to remove the list-style */
  padding: 0; /* Add this line to remove any default padding */
  margin: 0; /* Add this line to remove any default margin */
  display: none;
  opacity: 0.9;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 170px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}


.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
    background: #e8847c;
}

.dropdown:hover .dropdown-content {
  display: block;   
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}

</style>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0; background: #e8847c; font-family: 'YourCustomFont', sans-serif;">
    <div class="navbar-header">
        <a href="index.php" class="logo">
        <img src="../upload/logo.png" style="width: 80px; height: 70px; margin-left: 70px;">
      </a>
    </div>

            <div class="paks">
                    <ul class="nav navbar-nav">
                        <li id="cartme" style="cursor:pointer;" class="active">
                            <a id="cart_control" style="color: white; margin-left: 50px; margin-top: 10px;background-color:#e8847c ;">
                    <i class="fa-solid fa-bag-shopping" style="font-size: 30px;"></i>
                     <div class="qty" style="position: absolute; top: 0; right: 0; font-size: 15px; background-color: gray; width: 25px; height: 25px; border-radius: 50%; color: #fff; font-weight: bold; display: flex; justify-content: center; align-items: center; transform: translate(1px); margin-top: 5px;"><?php echo isset($row['qty']) ? $row['qty'] : 0; ?></div>


                </a>

            </li>


            

            <li>
                <form class="navbar-form" role="search" method="POST" action="search_result2.php">
                    <div class="input-group" id="searchbox" style="width:600px; margin-left: 90px; margin-top: 10px;">
                        <input type="text" class="form-control" placeholder="Search Product" name="search" id="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </li>
        </ul>

        <li class="dropdown">
                <i class="fa-solid fa-list" style="font-size: 30px"></i>
                <a class="dropdown-toggle" data-toggle="dropdown" href="index.php">
                    

                </a>
                <ul class="dropdown-content" style="display: flex 1;">
                    <li><a href="index.php"> All Category</a></li>
                    <?php

                    $caq=mysqli_query($conn,"select * from category");
                    while($catrow=mysqli_fetch_array($caq)){
                        ?>
                        <li class="divider"></li>
                        <li><a href="plist.php?cat=<?php echo $catrow['categoryid']; ?>"><?php echo $catrow['category_name']; ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </li>   

         <div class="dropdown ">
    <i class="fa fa-user-circle-o" style="font-size:30px;"></i>

    <!-- Dropdown content -->
    <div class="dropdown-content">
      <a href="profile.php"><span class="glyphicon glyphicon-user"></span> My Profile</a>
      <a href="history.php"><i class='fas fa-history'></i> My Purchase</a>
      <a href="logout.php"><i class="fa fa-sign-out" style="font-size:15px; color: black;"></i> Logout</a>
    </div>
  </div>


</nav>

<script>
  function updateTotalQuantity() {
    const qty = document.querySelector('.qty');
    let count=itemList.length;
    qty.innerHTML=count;

    if (count==0) {
        qty.style.display='none';
    }else{
        qty.style.display='block';
    }

}

</script>

</div>


</body>
</html>
