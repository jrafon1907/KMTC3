<?php
include('session.php');
include('conn.php');

if(isset($_GET['userid'])) {
    $userid = $_GET['userid'];
    
    // Move record from archive table back to customer table
    $restore_query = "INSERT INTO customer SELECT * FROM archive WHERE userid = $userid";
    $delete_query = "DELETE FROM archive WHERE userid = $userid";
    
    if(mysqli_query($conn, $restore_query) && mysqli_query($conn, $delete_query)) {
        // Records successfully restored
        header("Location: customer.php"); // Redirect back to the archive page
        exit;
    } else {
        // Handle errors if any
        echo "Error restoring record: " . mysqli_error($conn);
    }
}

$query = "SELECT archive.*, user.username FROM archive INNER JOIN user ON archive.userid = user.userid";
$result = mysqli_query($conn, $query);

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
        background-color:  #5cb85c;
        color: #fff;
        border: none;
        padding: 5px 10px;
        margin: 3px;
        border-radius: 5px;
      }
    </style>

    <div id="wrapper">
      <div>
        <?php include('navbar.php'); ?>
      </div>
      <div style="flex: 1;">

        <div style="display: flex; justify-content: space-between;  padding: 0 20px;">
          <div style="flex: 1; font-size: 5vh; font-family: sans-serif;font-weight: bold;"> Archive Account</div>

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
        <a href="customer.php" class="button-small" style="background: #351224; display: inline-block; text-decoration: none; color: white; border-radius: 10px; text-align: center;">
          <h6 style="font-weight: bolder; margin: 15px;"><i class="fa fa-user"></i> Customer Page</h6>
        </a>

        <div style="height: 1.5vh;"></div>
      </div>

        <div class="row" style="height: 95vh; overflow: scroll; padding: 4vh; font-size: 2vh;">
          <div style="border-radius: 10px; border: 0px solid; background-color: white; overflow: hidden;">
            <div id="table-header">
              <div style="padding: 8px; flex: 1;"><center>Customer Name</center></div>
              <div style="padding: 8px; flex: 1;"><center>Username</center></div>
              <div style="padding: 8px; flex: 1;"><center>Password</center></div>
              <div style="padding: 8px; flex: 1;"><center>Address</center></div>
              <div style="padding: 8px; flex: 1;"><center>Email</center></div>
              <div style="padding: 8px; flex: 1;"><center>Contact Info</center></div>
              <div style="padding: 8px; flex: 1;"><center>Operation</center></div>
            </div>
            <tbody>
              <?php
              while ($row = mysqli_fetch_array($result)) {
              ?>
                <div style=" display: flex; box-sizing: border-box; ">
                  <div style="padding: 20px 30px; flex: 1;"><center><?php echo $row['customer_name']; ?></center></div>
                  <div style="padding: 20px 30px; flex: 1;"><center><?php echo $row['username']; ?></center></div>

                  <div style="padding: 20px 30px; flex: 1;"><center>*******</center></div>
                  <div style="padding: 20px 30px; flex: 1;"><center><?php echo $row['customer_address']; ?></center></div>
                  <div style="padding: 20px 30px; flex: 1;"><center><?php echo $row['customer_email']; ?></center></div>
                  <div style="padding: 20px 30px; flex: 1;"><center><?php echo $row['customer_contact']; ?></center></div>


                  <div style="padding: 20px 30px; flex: 1; "><center> <a href="arch.php?userid=<?php echo $row['userid']; ?>"><button class="btn btn-danger">Restore</button></a></center></div>
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
