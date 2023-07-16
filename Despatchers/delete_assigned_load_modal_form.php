            <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal<?php echo $row['load_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Load Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="delete_assigned_load_query.php" method="POST">
                   <div class="modal-body">
                        <input type="hidden" name="load_id" id="load_id" value="<?php echo $row["load_id"]; ?>">
                        <input type="hidden" name="vehicle_id" id="vehicle_id" value="<?php echo $row["vehicle_id"]; ?>">

                        <h5> Do you want to Delete this Load ??</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-danger"> Yes !! Delete it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>