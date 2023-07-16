
         <div class="modal fade" id="vehicle_assigned_details<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">

  <?php      
    $vehicleId = $row['id'];
    $sql2 = "SELECT vehicle_assigned.vehicle_id, vehicle_assigned.driver_id, drivers.name, vehicles.id, vehicles.vehicleNumber, vehicles.vehicleVin, vehicles.vehicleModel, vehicle_assigned.date FROM vehicle_assigned 
        INNER JOIN vehicles
        ON vehicle_assigned.vehicle_id = vehicles.id
        INNER JOIN drivers
        ON vehicle_assigned.driver_id = drivers.id
        WHERE vehicle_assigned.vehicle_id ='".$vehicleId."'";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
    
?>
    
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">Assigned Records</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>

     <form class="form">
                <div class="card-body">
                   <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle"
                           src="../dist/img/user4-128x128.jpg"
                           alt="User profile picture">
                    </div>

                  <div class="form-group">
                    <label for="name">Date</label>
                    <input type="hidden" name="id" value="<?php echo $row2['id'];?>"/>
                    <input type="text" name="name" class="form-control" placeholder="Enter Driver Name" value="<?php echo $row2['date'];?>" readonly/>
                  </div>

                  <div class="form-group">
                    <label for="driverTel">Vehicle Number</label>
                    <input type="tel" name="tel" class="form-control"  placeholder="Enter Telephone" value="<?php echo $row2['vehicleNumber'];?>" readonly/>
                  </div>

                  <div class="form-group">
                    <label for="email">Model</label>
                    <input type="text" name="email" class="form-control"  placeholder="Enter Email" value="<?php echo $row2['vehicleModel'];?>" readonly/>
                  </div>

        
                  <div class="form-group">
                    <label for="licenseID">Driver Name</label>
                    <input type="text" name="licenseID" class="form-control" placeholder="Enter License Number" value="<?php echo $row2['name'];?>" readonly/>
                  </div>

                </div>
                <!-- /.card-body -->
                <div style="clear:both;"></div>
              <div class="modal-footer justify-content-between bg-primary ">
                  <button type="button" class="btn btn-outline-light btn-danger ml-auto" data-dismiss="modal"><span class="fas fa-close">Exit</span></button>
              </div>

              </form>
      
    </div>
  </div>
</div>
