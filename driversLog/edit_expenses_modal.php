 <div class="modal fade" id="expenses_edit<?php echo $row["id"]; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title" id="staticBackdropLabel">EXPENSES DETAILS</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="car card-primary">
              <form class="form" method="POST" action="expenses_edit_query.php">

                <div class="card-body">
                  <div class="row">

                  <div class="input-group mb-3">
                    <label class="input-group-text bold">Type of Expenses</label> 
                            <input type="text" name="type" class="form-control" value="<?php echo $row["type"]; ?>">
                    </div>

                  <div class="form-group">
                     <label>Description</label> 
                    <textarea type="text" name="description" cols="80" class="form-control"><?php echo $row["description"]; ?></textarea>
                  </div>

                  <div class="input-group mb-3">
                    <label class="input-group-text bold">Incured By</label>
                    <input type="text" name="incuredBy" class="form-control" value="<?php echo $row["incuredBy"]; ?>">
                     <input type="hidden" name="id" class="form-control" value="<?php echo $row["id"]; ?>">
                    
                  </div>
                   <div class="input-group mb-3">
                    <label class="input-group-text bold">Amount</label>
                    <input type="text" name="amount" class="form-control text-right" value="<?php echo $row["amount"]; ?>">
                    <label class="input-group-text text-green bold">USD</label>
                  </div>

                   <div class="input-group mb-3">
                      <label class="input-group-text bold">Date</label>
                    <input type="date" name="dateSpent" class="form-control" value="<?php echo $row["dateSpent"]; ?>">
                  </div>
          
                  </div>
                </div>
                <!-- /.card-body -->
               <div class="modal-footer justify-content-between bg-primary">
                  <button type="button" class="btn btn-outline-light btn-danger" data-dismiss="modal">Cancel</button>
                  <input type="submit" class="btn btn-outline-light btn-primary" name="submit" value="Update">
              </div>
              </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>