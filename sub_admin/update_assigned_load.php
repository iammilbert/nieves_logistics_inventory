
 <div class="modal fade" id="update_assigned_load_Modal<?php echo $row['id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title" id="staticBackdropLabel">Updating Assigned Load</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="car card-primary">
                         <!-- form start -->

               <form class="form" method="POST" action="load.php">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">

                       <label class="font-size-17"><u>LOAD INFORMATION</u></label>

                        <div class="input-group mb-3">
                          <span for="ratecom" class="input-group-text">Rate Con.</span>
                          <input type="text" name="rateConfirmationID" class="form-control" id="rateConfirmationID" value="<?php echo $row['rateConfirmationID'];?>">
                        </div>

                        <div class="input-group mb-3">
                          <span class="input-group-text">Rate</span>
                          <input type="text" class="form-control" name="rate" id="rate" value="<?php echo $row['rate'];?>">
                          <span class="input-group-text">$</span>
                        </div>

                          <!--<div class="input-group mb-3">-->
                          <!--  <label class="input-group-text">Load Type</label>-->
                          <!--    <select class="form-control" name="loadType">-->
                          <!--      <option selected></option>-->
                          <!--      <option value="normal">Normal Load</option>-->
                          <!--      <option value="blind">Blind Load</option>-->
                          <!--    </select>-->
                          <!--  </div>                      -->

                   <div class="input-group mb-3">
                      <span for="loadDescription" class="input-group-text">Description</span>
                      <textarea class="form-control" name="loadDescription" id="loadDescription"><?php echo $row['loadDescription'];?></textarea>
                    </div>
                <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $row["id"]; ?>">



<?php
  $sql3 = "SELECT users.name, users.id, vehicles_assigned.driver_id FROM vehicles_assigned  
  INNER JOIN users 
  ON vehicles_assigned.driver_id = users.id 
  WHERE vehicles_assigned.load_id = '".$row["id"]."'";
  $query3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
  $row3 = mysqli_fetch_assoc($query3);
?>


                             <?php 
                                $sql_driver = "SELECT * FROM users WHERE role = 'Driver'";
                                $query_driver = mysqli_query($conn, $sql_driver) or die(mysqli_error($conn));
                              ?>
                             
                             <div class="input-group mb-3">
                             <span class="input-group-text">Drivers</span>
                                  <select class="form-control" name="driver_id" required="driver_id">

                                    <option value="<?php echo $row3['id']; ?>"><?php echo $row3['name']; ?></option>

                                    <?php while($row_driver = mysqli_fetch_assoc($query_driver)): ?>
                                    <option value="<?php echo $row_driver['id']; ?>"><?php echo $row_driver['name']; ?></option>
                                  <?php endwhile; ?>
                                  </select>
                              </div> 
                            </div>

                <div class="col-md-6"> 
                    <label class="font-size-17"><u>SHIPPER DETAILS</u></label>
                    <div class="input-group mb-3">
                      <span for="shipperEmail" class="input-group-text">Shipper name</span>
                      <input type="text" name="shipperName" class="form-control" id="shipperName" value="<?php echo $row['shipperName'];?>">
                    </div>

                   <div class="input-group mb-3">
                      <span for="shipperEmail" class="input-group-text">Shipper Email</span>
                      <input type="email" name="shipperEmail" class="form-control" id="shipperEmail" value="<?php echo $row['shipperEmail'];?>">
                    </div>

                    <div class="input-group mb-3">
                      <span for="shipperAddress" class="input-group-text">Shipper Address</span>
                      <textarea class="form-control" name="shipperAddress" id="shipperAddress"><?php echo $row['shipperAddress'];?></textarea>
                    </div>
                  <div class="input-group mb-3">
                    <span for="shipperTel" class="input-group-text">Shipper Telephone</span>
                    <input type="tel" name="shipperTel" class="form-control" id="shipperTel" value="<?php echo $row['shipperTel'];?>">
                  </div> 

                  <div class="input-group mb-3">
                    <span for="weight" class="input-group-text">Load Weight</span>
                    <input type="tel" name="weight" class="form-control" id="weight" value="<?php echo $row['weight'];?>">
                  </div> 
                  </div>

                  </div>
                </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-light btn-danger" data-dismiss="modal">Cancel</button>
                  <input type="submit" class="btn btn-outline-light btn-primary" name="update_assigned_loads" value="Update">
              </div>
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

