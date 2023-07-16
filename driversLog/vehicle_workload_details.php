<div class="modal fade" id="vehicle_workload_details_modal<?php echo $row['driver_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">VEHICLE INCOME GENERATED</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
      <form class="form">
                <div class="card-body">

                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span><b>VEHICLE</b></span>
                    </div>
                  </div>
                  <input type="text" name="name" class="form-control" readonly value="<?php echo $row['vehicleType']?> <?php echo $row['model']?> <?php echo $row['vin']?>">         
              </div>


                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span><b>RATE CONFIRMATION</b></span>
                    </div>
                  </div>
                  <input type="text" name="tel" class="form-control" readonly value="<?php echo $row['rateConfirmationID']?>">         
              </div>


                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span><b>RATE</b></span>
                    </div>
                  </div>
                  <input style="text-align:right;" type="text" name="email" class="form-control" readonly value="<?php echo $row['rate']?>">
                        <div class="input-group-append">
                        <div class="input-group-text">
                           <span><b>USD</b></span>
                        </div>
                      </div>         
              </div>

                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span><b>DRIVEN BY</b></span>
                    </div>
                  </div>
                  <input style="text-align:right;" type="text" name="licenseID" class="form-control" readonly value="<?php echo $row['name']?>">         
              </div>

              <?php
                  $load_id = $row["load_id"]; 

                  
                   $sql = "SELECT SUM(amount_Spent) AS sum FROM drops WHERE load_id = '".$load_id."'"; 
                   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                   $totalrow = mysqli_fetch_assoc($query);

                  $income = $row["rate"] - $row["netPay"]; 
                  $total_income = $income - $totalrow["sum"];
                  
                ?>


                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span><b>TOTAL EXPENSES</b></span>
                    </div>
                  </div>
                  <input style="text-align:right;" type="text" name="amount_Spent" class="form-control" readonly value="<?php echo $totalrow["sum"]; ?>">
                   <div class="input-group-append">
                        <div class="input-group-text">
                           <span><b>USD</b></span>
                        </div>
                      </div>          
              </div>


               <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                      <span><b>VEHICLE INCOME</b></span>
                    </div>
                  </div>
 
                  <input style="text-align:right; font-size: 40px; font-weight: bolder;" type="text" name="role" class="form-control" readonly value="<?php echo $total_income; ?>">
                       <div class="input-group-append">
                        <div class="input-group-text">
                           <span><b>USD</b></span>
                        </div>
                      </div>             
                 
              </div>

                   <div class="col">
                            <div class="input-group mb-3">
                             <div class="input-group-append">
                                <div class="input-group-text">
                                  <span><b>DATE GENERATED</b></span>
                                </div>
                              </div>

 <?php
$date = $row["droppedTime"];
$dropped_Time = date('h:i a', strtotime($date));
 ?>
             
                              <input type="text" name="role" class="form-control" readonly value="<?php echo $row["dropped_Date"]; ?> <?php echo $dropped_Time; ?>">             
                          </div>
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
