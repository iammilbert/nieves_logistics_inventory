<div class="modal fade" id="dispatcher<?php echo $row['registeredBy']?>" aria-hidden="true" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-primary">
              <h4 class="modal-title" id="staticBackdropLabel">DISPATCHER DETAILS</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                     <?php
              
                      $sql4="SELECT * FROM users WHERE users.id = '".$row["registeredBy"]."'";
                      $query4 = mysqli_query($conn, $sql4) or die(mysqli_error($conn));

                      $row4 = mysqli_fetch_assoc($query4);

                      ?>
              <form method="POST" action="update_staff_query.php">
                <div class="card-body">
                  <div class="row">
                     <div class="col">
                          <div class="form-group">
                                <label>Name</label>
                               
                              <input style="border: none; background: none;" type="text" name="name" class="form-control" value="<?php echo $row4['name']?>" disabled>         
                          </div>

                            <div class="form-group">
                                <label>Telephone <i class="fa fa-phone" style="color:red;"></i></label>    
                                <a href="tel:<?php echo $row['tel']?>"><input style="border: none; background: none; color: darkgreen;" type="tel" name="tel" class="form-control" value="<?php echo $row4['tel']?>"></a>         
                            </div>

                            <div class="form-group">
                                      <label>Email <i class="fa fa-envelope" style="color:red;"></i></label>    
                                <a href="mailto:<?php echo $row['email']?>"><input style="border: none; background: none; color: darkgreen;" type="email" name="email" class="form-control" value="<?php echo $row4['email']?>"></a>              
                             </div>

                              <div class="form-group">
                                      <label>Role</label>  
                                      <input style="border: none; background: none;" type="text" name="email" class="form-control" value="<?php echo $row4['role']?>" disabled> 
                             </div>

                          </div>    

                     </div>
                  </div>

              <div class="modal-footer justify-content-between bg-primary">
                  
                  <button type="button" class="btn btn-outline-light btn-danger" data-dismiss="modal"><span class="fas fa-close">Exit</span></button>
              </div>   
           </form>
    </div>
  </div>
</div>
