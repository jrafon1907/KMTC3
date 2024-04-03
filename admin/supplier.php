<title>Suppliers Details</title>
<?php include('session.php'); ?>

<html>

<body style="overflow: hidden; background: #E7E7E7;">

  <style type="text/css">
     * {
text-decoration: none;
}
    #wrapper {
      display: flex;
    }

    #supplier:hover {
      background-color: #ddd;
    }
  </style>

  <div id="wrapper">
    <div>
      <?php include('navbar.php'); ?>
      <div style="height:50px;"></div>
        </div>

            <div style="flex: 1;">
              
              <div style="display: flex; justify-content: space-between; align-items: center; padding: 0 20px;">
                <div style="flex: 1; font-size: 5vh; font-family: sans-serif;font-weight: bold;">Supplier Details
                </div>
                  <span class="pull-right">
                    </span>
                     </div>
                      <div class="row" style="flex: 1; text-align: right; padding-right: 5vh;">
                       <a href="addsupplier.php" class="button-small" style="background: #351224; display: inline-block; text-decoration: none; color: white;  border-radius: 10px; text-align: center;">
                          <h6 style="font-weight: bolder; margin: 15px; ">Add Supplier</h6></a>

                          <div style="height: 1.5vh;"></div>
                          <form method="post" action="">
                            <div class="input-group" rowspan="2">
                              <input type="text" class="form-control" name="search" placeholder="Search......" style="width: 200px; font-size: 2vh; border-radius: 5px; padding: 8px;">
                              <span class="input-group-btn">
                                <button style="font-size: 2vh; border-radius: 5px; color: white; background-color:#351224 ;  padding:10px;" class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                              </span>
                            </div>
                          </form>
                        </div>

                        <div class="row" style="height: 95vh; overflow: scroll; padding: 4vh; font-size: 2vh;">
                          <div style="border-radius: 10px;background-color: white; overflow: hidden;">
                            <table style="border-collapse: collapse; width: 100%;">
                              <div style="display: flex; background-color: #e8847c; color: white;">
                                <div style="padding: 8px; flex: 1;"><center>Company Name</div>
                                <div style="padding: 8px; flex: 1;"><center>Full Name</div>
                                <div style="padding: 8px; flex: 1;"><center>Address</div>
                                <div style="padding: 8px; flex: 1;"><center>Contact Info</div>
                                <div style="padding: 8px; flex: 1;"><center>Operation</div>
                              </div>

                              <tbody>
                                <?php
                                $search = isset($_GET['search']) ? $_GET['search'] : '';
                                $sq = mysqli_query($conn, "SELECT supplier.userid, company_name, full_name AS fullname, company_address AS address, contact FROM supplier LEFT JOIN user ON user.userid = supplier.userid WHERE company_name LIKE '%$search%' OR full_name LIKE '%$search%' OR company_address LIKE '%$search%' OR contact LIKE '%$search%'");

                                while ($sqrow = mysqli_fetch_array($sq)) {
                                ?>
                            <div id="supplier" style="display: flex; box-sizing: border-box; ">
                              <div style="padding: 30px 30px; flex: 1;"><center><?php echo $sqrow['company_name']; ?></div>
                              <div style="padding: 30px 30px; flex: 1;"><center><?php echo $sqrow['fullname']; ?></div>
                              <div style="padding: 30px 30px; flex: 1;"><center><?php echo $sqrow['address']; ?></div>
                              <div style="padding: 30px 30px; flex: 1;"><center><?php echo $sqrow['contact']; ?></div>
                              <div style="padding: 30px 30px; flex: 1; "><center>
                    
                          <div style= "display: flex;">
                    <form role="form" method="get" action="edit_supplier.php">
                        <input type="hidden" name="id" value="<?php echo $sqrow['userid']; ?>">
                        <button type="submit" style="background-color: #5cb85c; color: #fff; border: none; padding: 5px 10px; margin: 3px; border-radius: 5px"><i class="fas fa-edit"></i> Edit</button>

                    </form>

                    <form role="form" method="POST" action="deletesupplier.php<?php echo isset($sqrow['userid']) ? '?id=' . $sqrow['userid'] : ''; ?>">
                      <button type="submit" class="btn btn-danger" style="background-color: #d9534f; color: #fff; border: none; padding: 5px 10px; margin: 3px; border-radius: 5px;"><i class="fas fa-trash-alt"></i> Delete</button>
                    </form>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="custom.js"></script>
</body>

</html>
