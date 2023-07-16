
 <div class="modal fade" id="editModal<?php echo $row['load_id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title" id="staticBackdropLabel">RE-ASSIGNING VEHICLES</h4>
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
                          <label for="rateConfirmationID" class="input-group-text">Rate Con. </label>
                          <input type="text" class="form-control" name="rateConfirmationID" readonly value="<?php echo $row["rateConfirmationID"]; ?>">
                          <input type="hidden" class="form-control" name="load_id" readonly value="<?php echo $row["load_id"]; ?>">
                          <input type="hidden" class="form-control" name="status" readonly value="<?php echo $row["status"]; ?>">
                        </div>
                    </div>
                  </div>
                  
                  <label style="text-transform:uppercase; font-weight:bolder;"><b>Vehicles Assigned</b></label>
                  <div class="row">
                      <div class="col">
                         <div class="form-group">
                          <label>Truck <i class="fa fa-arrow-down"></i></label>
                          <input style="border:none; background-color:transparent;" name="oldTruck" type="text" class="form-control" value="<?php echo $row['truck']; ?>">
                        </div>
                      </div>
                      
                        <div class="col">
                             <div class="form-group">
                              <label>Traler <i class="fa fa-arrow-down"></i></label>
                              <input style="border:none; background-color:transparent;" name="oldTrailer" type="text" class="form-control" value="<?php echo $row['trailer']; ?>">
                            </div>
                        </div>

                       <div class="col">
                        <div class="form-group">
                          <label>Tractor <i class="fa fa-arrow-down"></i></label>
                          <input style="border:none; background-color:transparent;" name="oldTractor" type="text" class="form-control" value="<?php echo $row['tractor']; ?>">
                        </div>
                      </div>
                  </div> 
                  
                  <label style="text-transform:uppercase;"><b class="text-danger">CHANGE VEHICLES TO <i class="fa fa-arrow-down"></i></b></label>
                <div class="row">
                      <div class="col">
                          <?php 
                          $truck = "Truck";
                              $sqlV = "SELECT * FROM vehicles WHERE vehicles.status = 0 AND vehicles.vehicleType = '".$truck."' OR vehicles.status = 4 AND vehicles.vehicleType = '".$truck."' OR vehicles.status = 3 AND vehicles.vehicleType = '".$truck."'";
                              $queryV = mysqli_query($conn, $sqlV) or die(mysqli_error($conn));
                            ?>
                         <div class="form-group">
                          <label>Trucks</label>
                          <select class="form-control select2" name="truck" style="width:100%">
                                 <option selected disabled value="N/A">--Choose--</option>
                                <option value="N/A">N/A</option>
                                <?php while($rowV = mysqli_fetch_assoc($queryV)): ?>
                                <option value="<?php echo $rowV["number"]; ?>"><?php echo $rowV["number"]; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                      </div>
                      
                      
                    <div class="col">
                         <?php 
                          $trailer = "Trailer";
                              $sqlT = "SELECT * FROM vehicles WHERE vehicles.status = 0 AND vehicles.vehicleType = '".$trailer."' OR vehicles.status = 4 AND vehicles.vehicleType = '".$trailer."' OR vehicles.status = 3 AND vehicles.vehicleType = '".$trailer."'";
                              $queryT = mysqli_query($conn, $sqlT) or die(mysqli_error($conn));
                            ?>
                         <div class="form-group">
                          <label>Trailers </label>
                          <select class="form-control select2" name="trailer" style="width:100%">
                                 <option selected disabled value="N/A">--Choose--</option>
                                <option value="N/A">N/A</option>
                                <?php while($rowT = mysqli_fetch_assoc($queryT)): ?>
                                 <option value="<?php echo $rowT["number"]; ?>"><?php echo $rowT["number"]; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                      </div>
                      
                    <div class="col">
                         <?php 
                          $tractor = "Tractor";
                              $sqlTK = "SELECT * FROM vehicles WHERE vehicles.status = 0 AND vehicles.vehicleType = '".$tractor."' OR vehicles.status = 4 AND vehicles.vehicleType = '".$tractor."' OR vehicles.status = 3 AND vehicles.vehicleType = '".$tractor."'";
                              $queryTK = mysqli_query($conn, $sqlTK) or die(mysqli_error($conn));
                            ?>
                         <div class="form-group">
                          <label>Tractors </label>
                          <select class="form-control select2" name="tractor" style="width:100%">
                                <option selected disabled value="N/A">--Choose--</option>
                                <option value="N/A">N/A</option>
                                <?php while($rowTK = mysqli_fetch_assoc($queryTK)): ?>
                                 <option value="<?php echo $rowTK["number"]; ?>"><?php echo $rowTK["number"]; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                      </div>
                  </div> 
                 </div>

              <div class="modal-footer">
                  <button data-dismiss="modal" class="btn btn-sm btn-flat btn-outline-light btn-danger">Cancel</button>

                  <input type="submit" name="update" class="btn btn-flat btn-sm btn-primary btn-outline-light" value="Proceed >>">

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

