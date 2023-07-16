           <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="pickModal<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel"> PICK LOAD  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

             <form method="POST" action="pickLoadForm_query.php">


                              <input type="hidden" class="form-control" name="pickedup_Date" value="<?php echo date("Y-m-d"); ?>">
                             <input type="hidden" name="pickedStatus" class="form-control" value="2">
                             <input type="hidden" name="status" class="form-control" value="2">
                              <input type="hidden" class="form-control" name="load_id" value="<?php echo $row["load_id"]; ?>">

                             <input type="hidden" class="form-control" name="pickedupTime" value="<?php echo date("h:i:sa"); ?>">
                             <input type="hidden" name="pickID" value="<?php echo $row["id"]; ?>">   

                          <div class="input-group mb-3 modal-body">
                             <label class="input-group-text">Any Comment ?</label>
                             <textarea class="form-control" name="comment" required="comment"></textarea>
                        </div>

              <div class="modal-footer justify-content-between">
                 
                 <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel </button>
                   <button type="submit" class="btn btn-primary" name="submit">Pick</button>
              </div>
              </form>

            </div>
        </div>
    </div>