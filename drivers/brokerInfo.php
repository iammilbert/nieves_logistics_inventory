<div class="modal fade" id="broker<?php echo $row['id']?>" aria-hidden="true" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-primary">
              <h4 class="modal-title" id="staticBackdropLabel">BROKER DETAILS</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form method="POST" action="update_staff_query.php">
                <div class="card-body">
                  <div class="row">
                     <div class="col">
                          <div class="form-group">
                                <label>Name</label>
                               
                              <input style="border: none; background: none;" type="text" name="brokerName" class="form-control" value="<?php echo $row['brokerName']?>" disabled>         
                          </div>

                            <div class="form-group">
                                <label>Telephone <i class="fa fa-phone" style="color:red;"></i></label>    
                                <a href="tel:<?php echo $row['brokerNumber']?>"><input style="border: none; background: none; color: darkgreen;" type="tel" name="brokerNumber" class="form-control" value="<?php echo $row['brokerNumber']?>"></a>         
                            </div>

                            <div class="form-group">
                                      <label>Email <i class="fa fa-envelope" style="color:red;"></i></label>
                                 <a href="mailto:<?php echo $row['shipperEmail']?>"><input style="border: none; background: none; color: green;" type="email" name="shipperEmail" class="form-control" value="<?php echo $row['shipperEmail']?>" disabled></a>           
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
