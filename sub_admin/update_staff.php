<div class="modal fade" id="update_modal<?php echo $row['id']?>" aria-hidden="true" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
              <h4 class="modal-title" id="staticBackdropLabel">Editing <?php echo $row['role']?> Record</h4>
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
                               
                              <input type="text" name="name" class="form-control" value="<?php echo $row['name']?>">  
                               <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']?>">         
                          </div>

                            <div class="form-group">
                                <label>Telephone</label>    
                                <input type="text" name="tel" class="form-control" value="<?php echo $row['tel']?>">         
                            </div>

                            <div class="form-group">
                                      <label>Email</label>
                                 <input type="text" name="email" class="form-control" value="<?php echo $row['email']?>">         
                             </div>

                               <div class="form-group">
                                      <label>License ID</label>
                                 <input type="text" name="licenseID" class="form-control" value="<?php echo $row['licenseID']?>">   
                                </div>

                              <div class="form-group">
                                      <label>Role</label>
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

                             <div class="form-group">
                                      <label>Password</label>
                                 <input type="text" name="password" class="form-control" value="<?php echo $row['password']?>">         
                             </div>

                               <div class="form-group">
                                      <label>Address</label>
                                 <input type="location" placeholder="Enter Address" name="address" class="form-control" value="<?php echo $row['address']?>">     
                             </div>

                          </div>


                           <div class="col">
                               <div class="form-group">
                                      <label>Account Number</label>
                                 <input type="text" name="accountNumber" class="form-control" value="<?php echo $row['accountNumber']?>">         
                             </div>

                            <div class="form-group">
                               <label>Enter Bank Name</label>
                               <input type="text" placeholder="Enter Bank Name" name="bankName" class="form-control" value="<?php echo $row['bankName']?>">
                             </div>


                             <div class="form-group">
                                      <label>Acccount Name</label>
                                 <input type="text" name="accountName" class="form-control" value="<?php echo $row['accountName']?>">         
                             </div>

            <?php 
                $sql2 = "SELECT SUM(wages.amountPaid) AS sum2 FROM wages WHERE wages.driver_id = '".$row["id"]."'";
                $query2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($query2);
              ?>

                   <?php 
                $sql3 = "SELECT SUM(drivers_pay_roll.netPay) AS sum3 FROM drivers_pay_roll WHERE drivers_pay_roll.driver_id = '".$row["id"]."' AND drivers_pay_roll.paymentStatus = 0";
                $query3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($query3);
              ?>


               <?php 
                $sql4 = "SELECT COUNT(pickups.id) AS sum4 FROM pickups WHERE pickups.driver_id = '".$row["id"]."'";
                $query4 = mysqli_query($conn, $sql4);
                $row4 = mysqli_fetch_assoc($query4);
              ?>

                                         <?php 
                                      if ($row["role"]=="Admin" OR $row["role"]=="Accountant" OR $row["role"]=="Despatcher" OR $row["role"]=="Staff") {
                                        echo "<div class='form-group'>
                                                 <label>Acccount Name</label>
                                                 <input type='text' name='salary' class='form-control' value='{$row["salary"]}'>         
                                            </div>";
                                            

                                      }
                                      if ($row["role"]=="Driver"){
                                        echo "<div class='form-group'>
                                                 <label>Total Pickups</label>
                                                 <input type='text' name='pickups' class='form-control' value='{$row4["sum4"]}'>         
                                            </div>

                                            <div class='form-group'>
                                                 <label>Current Balance</label>
                                                 <input type='text' name='balance' class='form-control' value='{$row3["sum3"]}'>         
                                            </div>

                                             <div class='form-group'>
                                                 <label>Total Income</label>
                                                 <input type='text' name='balance' class='form-control' value='{$row2["sum2"]}'>         
                                            </div>";
                                     }
                                      ?>

      

                     </div>
                  </div>
                 </div>


                <!-- /.card-body -->
                <div style="clear:both;"></div>
              <div class="modal-footer justify-content-between bg-primary">
                  
                  <button type="button" class="btn btn-outline-light btn-danger" data-dismiss="modal"><span class="fas fa-close">Cancel</span></button>
                  <button name="update" class="btn btn-outline-light btn-primary">Update</button>
              </div>

              </form>
      
    </div>
  </div>
</div>
