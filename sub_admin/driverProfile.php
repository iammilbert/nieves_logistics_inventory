<div class="modal fade" id="driver_profile_modal<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">Driver Record</h5>
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

                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span><b>Drivers Name</b></span>
                    </div>
                  </div>
                  <input type="text" name="name" class="form-control" readonly value="<?php echo $row['name']?>">         
              </div>


                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span><b>Telephone</b></span>
                    </div>
                  </div>
                  <input type="text" name="tel" class="form-control" readonly value="<?php echo $row['tel']?>">         
              </div>


                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span><b>Email</b></span>
                    </div>
                  </div>
                  <input type="text" name="email" class="form-control" readonly value="<?php echo $row['email']?>">         
              </div>

                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span><b>License Number</b></span>
                    </div>
                  </div>
                  <input type="text" name="licenseID" class="form-control" readonly value="<?php echo $row['licenseID']?>">         
              </div>


               <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                      <span><b>ROLE</b></span>
                    </div>
                  </div>
                  <input type="text" name="role" class="form-control" readonly value="<?php echo $row['role']?>">              
                 
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
