
 <div class="modal fade" id="viewTractor<?php echo $row["tractor"]; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-primary">
                <?php 
                    $sql = "SELECT * FROM vehicles WHERE vehicles.number = '".$row["tractor"]."' ";
                    $query = mysqli_query($conn, $sql);
                    $row1 = mysqli_fetch_assoc($query);
                ?>
              <h4 class="modal-title" id="staticBackdropLabel">Tractor <?php echo $row1["number"]; ?> </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="car card-primary">
                <form method="POST" action="editAssigned_vehicleQuery.php">
                <div class="card-body"> 
                  
                  <div class="row">
                      <div class="col">
                         <div class="input-group mb-3">
                          <label class="input-group-text">NUMBER</label>
                          <input type="text" class="form-control" value="<?php echo $row1['number']; ?>" readonly>
                        </div>
                      </div>
                  </div> 
                  
                    <div class="row">
                      <div class="col">
                         <div class="input-group mb-3">
                          <label class="input-group-text">VIN</label>
                          <input type="text" class="form-control" value="<?php echo $row1['vin']; ?>" readonly>
                        </div>
                      </div>
                  </div>
                  
                <div class="row">
                      <div class="col">
                         <div class="input-group mb-3">
                          <label class="input-group-text">LICENSE PLATE</label>
                          <input type="text" class="form-control" value="<?php echo $row1['plateNumber']; ?>" readonly>
                        </div>
                      </div>
                  </div>
                  
                    <div class="row">
                      <div class="col">
                         <div class="input-group mb-3">
                          <label class="input-group-text">ENGINE</label>
                          <input type="text" class="form-control" value="<?php if($row1["status"]==1){echo "OFF";} if($row1["status"]==2){echo "ON - Running";} if($row1["status"]==3){echo "Delivered";} ?>" readonly>
                        </div>
                      </div>
                  </div>
                 </div>

              <div class="modal-footer justify-content-between">
                  <button data-dismiss="modal" class="btn btn-outline-light btn-danger">Back</button>

              </div>

            </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<style type="text/css">
  .input-group .form-control{
    color: blue;
  }
</style>

