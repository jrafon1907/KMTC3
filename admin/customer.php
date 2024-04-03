<title>Customers Account</title>
<?php
include('session.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['archive_id'])) {
    // Assuming you have a function to handle archiving
    $archive_id = $_POST['archive_id'];
    archiveData($archive_id); // You need to define the archiveData function
}

function archiveData($id) {
    // Perform the archival operation here
    // You can execute SQL queries to move data to archive tables or perform other actions
    // Ensure you have a proper implementation based on your database structure
    // Example: mysqli_query($conn, "INSERT INTO archived_table SELECT * FROM original_table WHERE id = $id");
    // After archiving, you may also want to remove the data from the original table
    require("conn.php"); // Make sure to include your database connection file
    mysqli_query($conn, "INSERT INTO archive SELECT * FROM customer WHERE userid = $id");
    mysqli_query($conn, "DELETE FROM customer WHERE userid = $id");
}
?>

<html>
  <body style="overflow: hidden; background: #E7E7E7;">
    <style type="text/css">
      #wrapper {
        display: flex;
      }

      #table-header {
        display: flex;
        background-color:#e8847c;
        color: white;
      }

      #table-header div {
        padding: 8px;
        flex: 1;
        text-align: center;
      }

      .table-row {
        display: flex;
        box-sizing: border-box;
      }

      .table-row div {
        padding: 30px 30px;
        flex: 1;
        text-align: center;
      }

      .btn-danger {
        background-color: #d9534f;
        color: #fff;
        border: none;
        padding: 5px 10px;
        margin: 3px;
        border-radius: 5px;
      }
      #customer:hover{
        background-color: #ddd;
      }
    </style>

    <div id="wrapper">
      <div>
        <?php include('navbar.php'); ?>
      </div>
      <div style="flex: 1;">

        <div style="display: flex; justify-content: space-between;  padding: 0 20px;">
          <div style="flex: 1; font-size: 5vh; font-family: sans-serif;font-weight: bold;">Customers Account</div>

          <div class="row" style="flex: 1; text-align: right; padding-right: 5vh;">
            <div style="height: 12vh;"></div>
            <form method="post" action="">
              <div class="input-group" rowspan="2">
                <input type="text" class="form-control" name="search" placeholder="Search......" style="width: 200px; font-size: 2vh; border-radius: 5px; padding: 8px">
                <span class="input-group-btn">
                  <button style="font-size: 2vh; border-radius: 5px; color: white; background-color:#351224 ; padding:10px;" class="btn btn-info" type="search"><i class="fa fa-search"></i></button>
                </span>
              </div>
            </form>
          </div>
        </div>

        <div style="flex: 1; text-align: right; padding-right: 5vh;">
        <a href="arch.php" class="button-small" style="background: #351224; display: inline-block; text-decoration: none; color: white; border-radius: 10px; text-align: center;">
          <h6 style="font-weight: bolder; margin: 15px;"><i class="fa fa-archive"></i> Archive page</h6>
        </a>

        <div style="height: 1.5vh;"></div>
      </div>

        <div class="row" style="height: 95vh; overflow: scroll; padding: 4vh; font-size: 2vh;">
          <div style="border-radius: 10px; border: 0px solid; background-color: white; overflow: hidden;">
            <div id="table-header">
              <div style="padding: 8px; flex: 1;"><center>Customer Name</div>
              <div style="padding: 8px; flex: 1;"><center>Username</div>
              <div style="padding: 8px; flex: 1;"><center>Password</div>
              <div style="padding: 8px; flex: 1;"><center>Address</div>
              <div style="padding: 8px; flex: 1;"><center>Email</div>
              <div style="padding: 8px; flex: 1;"><center>Contact Info</div>
              <div style="padding: 8px; flex: 1;"><center>Operation</div>
            </div>
            <tbody>
              <?php
              $search = ''; // Initialize $search variable

              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $search = isset($_POST['search']) ? mysqli_real_escape_string($conn, $_POST['search']) : '';

                $cq = mysqli_query($conn, "SELECT customer.*, user.username, customer.customer_address AS customer_address, customer.customer_contact FROM customer LEFT JOIN user ON user.userid = customer.userid WHERE customer.customer_name LIKE '%$search%'");
              } else {
                $cq = mysqli_query($conn, "SELECT customer.*, user.username, customer.customer_address AS customer_address, customer.customer_contact FROM customer LEFT JOIN user ON user.userid = customer.userid");
              }

              require("conn.php");
              $cqrow = mysqli_query($conn, "select * from customer");

              while ($cqrow = mysqli_fetch_array($cq)) {
              ?>
                <div id="Customer" style=" display: flex; box-sizing: border-box; ">
                  <div style="padding: 20px 30px; flex: 1;"><center><?php echo $cqrow['customer_name']; ?></div>
                  <div style="padding: 20px 30px; flex: 1;"><center><?php echo $cqrow['username']; ?></div>
                  <div style="padding: 20px 30px; flex: 1;"><center>*******</div>
                  <div style="padding: 20px 30px; flex: 1;"><center><?php echo $cqrow['customer_address']; ?></div>
                  <div style="padding: 20px 30px; flex: 1;"><center><?php echo $cqrow['customer_email']; ?></div>
                  <div style="padding: 20px 30px; flex: 1;"><center><?php echo $cqrow['customer_contact']; ?></div>

                  <div style="padding: 20px 30px; flex: 1; "><center> 
                    <form method="post" action="">
                      <input type="hidden" name="archive_id" value="<?php echo $cqrow['userid']; ?>">
                      <button type="submit" class="btn btn-danger">Archive</button>
                    </form>
                  </div>

                </div>
              <?php
              }
              ?>
            </tbody>
          </div>
        </div>
      </div>
    </div>
    <script src="custom.js"></script>
  </body>
</html>
