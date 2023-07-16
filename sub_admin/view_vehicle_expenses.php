
<div class="modal fade" id="vehicle_expenses_Modal<?php echo $row['number']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
       <div class="modal-header bg-primary">
              <h5 class="modal-title" id="staticBackdropLabel">Editing Vehicle Record</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
			<form method="POST"  action="update_vehicle_query.php">
                <div class="card-body">
                     <div class="input-group mb-3">
                        <label class="input-group-text">Vehicle</label>
                        <select class="form-select form-control" name="vehicleType">
                          <option selected><?php echo $row["vehicleType"]; ?></option>
                          <option value="Truck">Truck</option>
                          <option value="Trailer">Trailer</option>
                      </select>
                    </div>
                  <div class="form-group">
                    <label for="number">Vehicle Number</label>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']?>"/>
                    <input type="text" name="number" class="form-control" value="<?php echo $row['number']?>"/>
                  </div>

                  <div class="form-group">
                    <label for="vin">Vehicle VIN</label>
                    <input type="text" name="vin" class="form-control" value="<?php echo $row['vin']?>"/>
                  </div>

        
                  <div class="form-group">
                    <label for="model">Vehicle Model</label>
                    <input type="text" name="model" class="form-control" value="<?php echo $row['model']?>"/>
                  </div>

                </div>
                <!-- /.card-body -->
                <div style="clear:both;"></div>
              <div class="modal-footer justify-content-between bg-primary">
                  <button name="update_vehicle" class="btn btn-outline-light btn-primary">Update</button>
                  <button type="button" class="btn btn-outline-light btn-danger" data-dismiss="modal"><span class="fas fa-close">Cancel</span></button>
              </div>

              </form>
			
		</div>
	</div>
</div>
