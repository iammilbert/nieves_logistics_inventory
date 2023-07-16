<div class="modal fade" id="staff_profile_modal<?php echo $row['id']?>" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title">STAFF PROFILE</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../picture/<?=$row['picture']?>"
                       alt="User profile picture" style="height: 99px;">
                       <h3><?php echo $row['name']?></h3>
                </div>
            <div class="car card-primary">
             <form method="POST" action="update_staff_query.php">
                <div class="card-body">
                  <div class="row">
                     <div class="col">
                          <div class="input-group mb-3">
                             <div class="input-group-append">
                                <div class="input-group-text">
                                   <span><b>Name</b></span>
                                </div>
                              </div>
                              <input type="text" name="name" class="form-control" value="<?php echo $row['name']?>">  
                               <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']?>">         
                          </div>

                           <div class="input-group mb-3">
                             <div class="input-group-append">
                                <div class="input-group-text">
                                   <span><b>Telephone</b></span>
                                </div>
                              </div>
                              <input type="text" name="tel" class="form-control" value="<?php echo $row['tel']?>">         
                          </div>

                                  <div class="input-group mb-3">
                                <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span><b>Email</b></span>
                                   </div>
                                 </div>
                                 <input type="text" name="email" class="form-control" value="<?php echo $row['email']?>">         
                             </div>

                               <div class="input-group mb-3">
                                <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span><b>License ID</b></span>
                                   </div>
                                 </div>
                                 <input type="text" name="licenseID" class="form-control" value="<?php echo $row['licenseID']?>">         
                             </div>

                              <div class="input-group mb-3">
                                <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span><b>Role</b></span>
                                   </div>
                                 </div>
                                 <input type="text" name="role" class="form-control" value="<?php echo $row['role']?>">         
                             </div>

                             <div class="input-group mb-3">
                                <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span><b>Password</b></span>
                                   </div>
                                 </div>
                                 <input type="text" name="password" class="form-control" value="<?php echo $row['password']?>">         
                             </div>

                          </div>


                           <div class="col">
                               <div class="input-group mb-3">
                                <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span><b>Account Number</b></span>
                                   </div>
                                 </div>
                                 <input type="text" name="accountNumber" class="form-control" value="<?php echo $row['accountNumber']?>">         
                             </div>

                            <div class="form-group">
                               <label>Enter Bank Name</label>
                               <input type="text" placeholder="Enter Bank Name" name="bankName" class="form-control" value="<?php echo $row['bankName']?>">
                             </div>



                             <div class="input-group mb-3">
                                <div class="input-group-append">
                                   <div class="input-group-text">
                                      <span><b>Acccount Name</b></span>
                                   </div>
                                 </div>
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
                                      if ($row["role"]=="Admin" OR $row["role"]=="Accountant" OR $row["role"]=="Despatcher" OR $row["role"]=="Staff") {
                                        echo "<div class='input-group-append'> <div class='input-group-text'> <span><b>Salary</b></span></div></div> 
                                        <input type='text' name='salary' class='form-control' value='{$row["salary"]}'>";
                                      }
                                      if ($row["role"]=="Driver")
                                           echo "<div class='input-group mb-3'>
                                                   <span class='input-group-text'><b>Total Pickups</b></span>
                                                   
                                            <input type='text' name='pickups' class='form-control' value='{$row2["sum2"]}'>
                                              </div>

                                              <div class='input-group mb-3'>
                                                   <span class='input-group-text'><b>Total Pickups</b></span>
                                                   
                                            <input type='text' name='pickups' class='form-control' value='{$row2["sum2"]}'>
                                              </div>

                         

                                                <div class='input-group mb-3'>
                                                   <div class='input-group-append'> 
                                                      <div class='input-group-text'> 
                                                         <span><b>Current Balance</b></span>
                                                      </div>
                                                    </div> 
                                                    <input type='text' name='balance' class='form-control' value='{$row3["sum3"]}'>
                                                </div>


                                                <div class='input-group mb-3'>
                                                   <div class='input-group-append'> 
                                                      <div class='input-group-text'> 
                                                         <span><b>Total Income</b></span>
                                                      </div>
                                                    </div> 
                                                    <input type='text' name='Income' class='form-control' value='{$row2["sum2"]}'>";
                                     
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
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
