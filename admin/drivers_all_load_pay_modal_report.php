<div class="modal fade" id="drivers_all_loads<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">View <?php echo $row["name"]; ?> Loads</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
        <form class="form" action="drivers_all_load_paid_report.php" method="POST">
                <div class="modal-body">
                    <div class="col">
                      <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="name" class="form-control" value="<?php echo $row["name"]; ?>" readonly>
                        <input type="hidden" name="driver_id" class="form-control" value="<?php echo $row["driver_id"]; ?>">
                      </div>

                       <div class="form-group">
                        <label>Date Paid</label>
                        <input type="text" name="datePaid" class="form-control" value="<?php echo $row["datePaid"]; ?>" readonly>
                        <input type="hidden" name="startDate" class="form-control" value="<?php echo $row["startDate"]; ?>">
                        <input type="hidden" name="endDate" class="form-control" value="<?php echo $row["endDate"];  ?>">
                        <input type="hidden" name="timePaid" class="form-control" value="<?php echo $row["timePaid"]; ?>">
                      </div>

                         <label>PAYMENT DATE</label>
                      

                      <div class="row">
                        <div class="col">
                           <label>From :</label>
                            <input type="text" name="startDate" class="form-control" value="<?php echo $row["startDate"]; ?>" readonly>
                        </div>

                        <div class="col">
                           <label>To :</label>
                        <input type="text" name="endDate" class="form-control" value="<?php echo $row["endDate"];  ?>" readonly>
                        </div>
                      </div>
                    </div>

                  </div>

                    <div class="col text-center">
                       <div class="form-group">
                         <input type="submit" name="submit" value="View All Loads" class="btn btn-sm btn-flat btn-info">
                      </div>
                     
                  </div>
                </div>
               </form>      
    </div>
  </div>
</div>
