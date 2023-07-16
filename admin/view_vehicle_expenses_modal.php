 <div class="modal fade" id="vehicle_expenses_details<?php echo $row["id"]; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title" id="staticBackdropLabel"><?php echo $row["vehicleType"]; ?> <?php echo $row["number"]; ?> <?php echo $row["model"]; ?> Expenses</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="car card-primary">
              <form>

                <div class="card-body">
                  <div class="row">
                      
                    <div class="input-group mb-3">
                    <label class="input-group-text bold">Type of Expenses</label> 
                            <input type="text" class="form-control" value="<?php echo $row["expensesType"]; ?>" readonly>
                    </div>

                  <div class="form-group">
                     <label>Description</label> 
                    <textarea type="text" name="description" cols="80" class="form-control" readonly><?php echo $row["description"]; ?></textarea>
                  </div>

                  <div class="input-group mb-3">
                    <label class="input-group-text bold">Incured By</label>
                    <input type="text" name="incuredBy" class="form-control" value="<?php echo $row["incuredBy"]; ?>" readonly>
                    
                  </div>
                   <div class="input-group mb-3">
                    <label class="input-group-text bold">Amount</label>
                    <input type="text" name="amount" class="form-control text-right" value="<?php echo number_format($row["amount"], 2, '.', ','); ?>" readonly>
                    <label class="input-group-text text-green bold">USD</label>
                  </div>

                   <div class="input-group mb-3">
                      <label class="input-group-text bold">Date</label>
                    <input type="date" name="dateSpent" class="form-control" value="<?php echo $row["dateSpent"]; ?>" readonly>
                  </div>
          
                  </div>
                </div>
                <!-- /.card-body -->
               <div class="modal-footer bg-primary">
                  <button type="button" class="btn btn-outline-light btn-danger" data-dismiss="modal">Close</button>
                  
              </div>
              </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>