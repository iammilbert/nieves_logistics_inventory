
 <div class="modal fade" id="editModal<?php echo $row['load_id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title" id="staticBackdropLabel">Editing Pickup</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="car card-primary">
                <form method="POST" action="reassign_query.php">
                <div class="card-body"> 

                  <div class="row">
                    <div class="col">
                      <div class="input-group mb-3">
                          <label for="rateConfirmationID" class="input-group-text">Rate Con. </label>
                          <input type="text" class="form-control" name="rateConfirmationID" readonly value="<?php echo $row["rateConfirmationID"]; ?>">
                          <input type="hidden" class="form-control" name="id" readonly value="<?php echo $row["load_id"]; ?>">
                        </div>
                    </div>

                  </div>
       
            <?php 
              $sql4 = "SELECT * FROM users WHERE role = 'Driver'";
              $query4 = mysqli_query($conn, $sql4) or die(mysqli_error($conn));
            ?>
            <label>Driver Name</label>
            <div class="form-group">
               
                <select class="form-control select2" name="driver_id" required="driver_id">
                  <option value="<?php echo $row['driver_id']; ?>"><?php echo $row['name']; ?></option>

                  <?php while($row4 = mysqli_fetch_assoc($query4)): ?>
                  <option value="<?php echo $row4['id']; ?>"><?php echo $row4['name']; ?></option>
                <?php endwhile; ?>
                </select>
            </div>
          </div>

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

