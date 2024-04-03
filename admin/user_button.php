<!-- Delete Customer -->
<div class="modal fade" id="del_<?php echo isset($cqrow['userid']) ? $cqrow['userid'] : ''; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Customer</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        $a = isset($cqrow['userid']) ? mysqli_query($conn, "select * from customer where userid='" . $cqrow['userid'] . "'") : false;
                        $b = $a ? mysqli_fetch_array($a) : null;
                    ?>
                    <h5><center>Customer Name: <strong><?php echo $b ? ucwords($b['customer_name']) : ''; ?></strong></center></h5>
                </div>
            </div>
            <div class="modal-footer">
                <form role="form" method="POST" action="deletecustomer.php<?php echo isset($cqrow['userid']) ? '?id=' . $cqrow['userid'] : ''; ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

