    <?php include('session.php'); ?>
    <?php include('header.php'); ?>

    <body style=" background: #E7E7E7;">
    <?php include('navbar.php'); ?>
    <div class="container">
    	<?php include('cart_search_field.php'); ?>
    	<div style="height: 50px;"></div>
    	
        <br>
    	<br>
    	<div style="flex: 1;">
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 0 20px;">
                        <div style="flex: 1; font-size: 5vh; font-family: sans-serif; font-weight: bold;"> My Purchase 
                        </div>
                    </div>

                    <!-- /.row -->
    				<div class="row" style="height: 95vh;  padding: 4vh; font-size: 2vh;">
    					<div style="border-radius: 10px; border: 1px solid; background-color: white; overflow: hidden;">
    						<table style="border-collapse: collapse; width: 100%;">						
    							<div style="display: flex; background-color: #e8847c ; color: white;">
                                    <div style="padding: 8px; flex: 1;"><center>Purchase Date & Time</div>
                                    <div style="padding: 8px; flex: 1;"><center>Total Purchase</div>
                                    <div style="padding: 8px; flex: 1;"><center>Operation</div>
                                    <div style="padding: 8px; flex: 1;"><center>Status</div>
    							</div>
    						
    							<tbody>
    							<?php
    								$h=mysqli_query($conn,"select * from sales where userid='".$_SESSION['id']."' order by sales_date desc");
    								while($hrow=mysqli_fetch_array($h)){
    									?>
    										<div style=" display: flex; box-sizing: border-box; ">
                                                 <div style="padding: 30px 30px; flex: 1;"><center><?php echo date("M d, Y - h:i A", strtotime($hrow['sales_date']));?></div>
                                                    <div style="padding: 30px 30px; flex: 1;"><center>
                                                        <?php echo number_format($hrow['sales_total'],2); ?>
                                                    </div>

                                                     <div style="padding: 30px 30px; flex: 1; text-align: center;">
                                            <button onclick="window.location.href='full_details.php?salesid=<?php echo $hrow['salesid']; ?>'" class="btn btn-primary btn-sm" style="background: #4caf50; border-radius: 10px; color: white; padding: 10px;"> View Full Order</button>
                                     </div>

                                      <div style="padding: 30px 30px; flex: 1; text-align: center;">
                                            <button onclick="window.location.href='receive_order.php?salesid=<?php echo $hrow['salesid']; ?>'" class="btn btn-primary btn-sm" style="background: #007bff; border-radius: 10px; color: white; padding: 10px;">To Receive</button>
                                        </div>

                                     </div>
                                    </div>
    									<?php
    								}
    							?>
    						</tbody>
                        </table>
                                <!-- /.table-responsive -->
                               <!-- /.panel-body -->
                        </div>
    	
    	
    </div>
    <?php include('script.php'); ?>
    <?php include('modal.php'); ?>
    <script src="custom.js"></script>
    <script>
    $(document).ready(function(){
    	$('#history').addClass('active');
    	
    	$('#historyTable').DataTable({
    	"bLengthChange": true,
    	"bInfo": true,
    	"bPaginate": true,
    	"bFilter": true,
    	"bSort": true,
    	"pageLength": 7
    	});
    });
    </script>
    </body>
    </html>