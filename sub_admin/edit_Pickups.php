<div class="modal fade" id="updateLoad_Modal<?php echo $row['id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title" id="staticBackdropLabel">Editing Pickup</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="car card-primary">
                  
                         <!-- form start -->

<?php 
 $sql1 = "SELECT * FROM loads WHERE id = '".$id."'"; 
 $query1 = mysqli_query($conn, $sql1); 
 $row1 = mysqli_fetch_assoc($query1);

?>
            <form method="POST" action="pickupsTable.php">
                <div class="card-body"> 
                  <div class="row">
                    <div class="col">
                      <div class="input-group mb-3">
                          <label for="rateConfirmationID" class="input-group-text">Rate Con. </label>
                          <input type="text" class="form-control" name="rateConfirmationID" readonly value="<?php echo $row1["rateConfirmationID"]; ?>">
                        </div>
                    </div>
                  </div>

                      <div class="input-group mb-3">
                          <span for="name" class="input-group-text">Pickup name</span>
                          <input type="text" class="form-control" name="name" id="name" value="<?php echo $row["name"]; ?>">
                          <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $row['id']?>">
                        </div>

                        <div class="input-group mb-3">
                          <span for="state" class="input-group-text">Pickup State</span>
                          <input type="text" class="form-control" name="state" id="state" placeholder="Enter Pickup State" value="<?php echo $row["state"]; ?>">
                        </div>

                       <div class="input-group mb-3">
                          <span for="pickup" class="input-group-text">City</span>
                          <input type="location" class="form-control" name="city" id="city" value="<?php echo $row["city"]; ?>">
                        </div>

                        <div class="input-group mb-3">
                          <span for="address" class="input-group-text">Pickup Address</span>
                          <input type="location" class="form-control" name="address" id="address" value="<?php echo $row["address"]; ?>">
                        </div>

                         <div class="input-group mb-3">
                          <span for="stateZipCode" class="input-group-text">Zip Code</span>
                          <input type="zip" pattern="[0-9]*" maxlength="5" name="stateZipCode" id="stateZipCode" value="<?php echo $row["stateZipCode"]; ?>" class="form-control">
                        </div>


                        <div class="input-group mb-3">
                          <span for="date" class="input-group-text">Pickup Date</span>
                          <input type="date" class="form-control" name="date" id="date" value="<?php echo $row["date"]; ?>">

                          <input type="hidden" class="form-control" name="load_id" id="status" value="<?php echo $id; ?>">
                        </div>

                        <div class="input-group mb-3">
                          <span for="time" class="input-group-text">Pickup Time</span>
                          <input type="time" class="form-control" name="time" id="time" value="<?php echo $row["time"]; ?>">

                        </div>
                </div>
                <!-- /.card-body -->
                <div style="clear:both;"></div>
              <div class="modal-footer justify-content-between">
                  <button data-dismiss="modal" class="btn btn-outline-light btn-danger">Back</button>

                  <input type="submit" name="update" class="btn btn-primary">

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

