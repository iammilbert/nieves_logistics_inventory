<div class="modal fade" id="assign_role_modal<?php echo $row['id']?>" aria-hidden="true" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-primary">
              <h6 class="modal-title" id="staticBackdropLabel">ASSIGN A ROLE</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
               <form method="POST" action="assign_users_role_query.php">
                <div class="card-body">
                  <div class="row">
                     <div class="col">
                          <div class="input-group mb-3">
                             <div class="input-group-append">
                                <div class="input-group-text">
                                   <span><b>Name</b></span>
                                </div>
                              </div>
                              <input type="text" name="name" class="form-control" value="<?php echo $row['name']?>" readonly>  
                               <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']?>">         
                          </div>


                              <div class="input-group mb-3">
                                <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span><b>Role</b></span>
                                   </div>
                                 </div>
                            <select class="form-control" name="role" required="role">
                                <option selected value="<?php echo $row["role"]; ?>"><?php echo $row["role"]; ?></option>
                              <option value="Admin">Admin</option>
                              <option value="Sub_Admin">Sub Admin</option>
                              <option value="Staff">Staff</option>
                              <option value="Driver">Driver</option>
                              <option value="Despatcher">Despatcher</option>
                              <option value="Accountant">Accountant</option>
                            </select>     
                             </div>


                          </div>
    

                     </div>
                  </div>


                <!-- /.card-body -->
                <div style="clear:both;"></div>
              <div class="modal-footer justify-content-between bg-primary">
                  
                  <button type="button" class="btn btn-outline-light btn-danger" data-dismiss="modal"><span class="fas fa-close">Cancel</span></button>
                  <input type="submit" name="assign" class="btn btn-outline-light btn-primary" value="Assign">
              </div>

              </form>
      
    </div>
  </div>
</div>
