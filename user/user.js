<!DOCTYPE html>
<html>
<title>KMTC</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<style>
    *{
    text-decoration: none;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.navbar{
    position: sticky;
    top: 0;
    left: 0;
    width: 100%;
    background: #f5f5f5;
    z-index: 9;
}

.nav{
    background: linear-gradient(-135deg, #c850c0, #4158d0);
    padding: 10px 10vw;
    display: flex;
    justify-content: space-between;
}

.brand-logo{
    height: 60px;
}

.cart-count{
  background-color: #2f3542;
  top: -5px;
  right: 0;
  padding: 3px;
  height: 20px;
  width: 20px;
  line-height:20px ;
  border-radius: 50%;
  z-index: 99;
}

.nav-items{
    display: flex;
    align-items: center;
}

.search{
    width: 1100px;
}

.search-box{
    width: 800px;
    height: 40px;
    padding: 10px;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    border: 1px solid #d1d1d1;
    text-transform: capitalize;
    background: none;
    color: #a9a9a9;
    outline: none;
}

.search-btn{
    width: 5%;
    height: 39px;
    padding: 10px 20px;
    border: none;
    outline: none;
    cursor: pointer;
    background: #383838;
    color: #fff;
    text-transform: capitalize;
    font-size: 15px;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
}

.search-box::placeholder{
    color: #a9a9a9;
}

.nav-items a{
    margin-left: 20px;
}

.nav-items a img{
    width: 30px;   
}

.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;

}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  list-style: none; /* Add this line to remove the list-style */
  padding: 0; /* Add this line to remove any default padding */
  margin: 0; /* Add this line to remove any default margin */
  display: none;
  opacity: 0.7;
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
    background: linear-gradient(-135deg, #c850c0, #4158d0);
}

.dropdown:hover .dropdown-content {
  display: block;   
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>
<nav class="navbar">
<div class="nav">
    <img src="../upload/km.png" class="brand-logo" alt="">
    <div class="nav-items">
        <div class="search">
            <form class="navbar-form" role="search" method="POST" action="search_result2.php">
             <input type="text" class="search-box" placeholder="Search Product" name="search" id="search"><button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
        </div>

            <li class="dropdown">
                <a href="index.php"><img src="../upload/prod.png" alt=""></a>
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
        </ul>
       

        


         <div class="dropdown">
    <a href="#"><img src="../upload/prof.png" alt=""></a>

    <!-- Dropdown content -->
    <div class="dropdown-content">
      <a href="#">My Profile</a>
      <a href="history.php">My Purchase</a>
      <a href="logout.php"><i class="fa fa-sign-out" style="font-size:15px; color: black;"></i> Logout</a>
    </div>
  </div>
    </div>
</div>
</nav>

<script>
    // Assuming you have a variable named 'totalQuantity' that holds the total quantity
    var totalQuantity = 10; // You should replace this with the actual total quantity

    // Update the content of the cart badge
    document.getElementById('cart_control').innerHTML = `
        <i class="fas fa-shopping-cart" style="margin-right: 5px;"></i> 
        <div style="position: absolute; top: 0; right: 0; font-size: 15px; background-color: #b31010; width: 25px; height: 25px; border-radius: 50%; color: #fff; font-weight: bold; display: flex; justify-content: center; align-items: center; transform: translate(1px); margin-top: 5px;">
            ${totalQuantity}
        </div>
    `;
</script>
