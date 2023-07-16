<div class="modal fade" id="staff_pay_modal<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">Payment Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    <form class="form" action="staff_pay_modal_query.php" method="POST">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <i class="fa fa-exclamation-circle" style="color:red;"></i> Kindly verify payment details.
                    </div>
                  </div>
                  <p></p>
                    <div class="col">
                      <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="name" class="form-control" value="<?php echo $row["name"]; ?>" readonly>
                      </div>

                       <div class="form-group">
                        <label>Payment For The Month Of </label>
                        <input type="month" name="months" class="form-control">
                      </div>



                      <div class="form-group">
                        <label>Amount (USD)</label>
                        <input type="text" name="amount" class="form-control" value="<?php echo $row["salary"]; ?>">
                        <input type="hidden" name="datePaid" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                            <input type="hidden" name="timePaid" class="form-control" value="<?php echo date("h:i:sa"); ?>">
                             <input type="hidden" name="staff_id" class="form-control" value="<?php echo $row["id"]; ?>">
                             <input type="hidden" name="paidBy" class="form-control" value="<?php echo $myID; ?>">
                             <input type="hidden" name="status" class="form-control" value="1">
                      </div>

                       <div class="form-group">
                        <label>Next Payment Date </label>
                        <input type="date" name="nextpaymentDate" class="form-control" required="nextpaymentDate">
                      </div>
                    
                  

                       <div class="form-group">
                        <label>Comment </label>
                       <textarea class="form-control" name="comment"></textarea>
                      </div>
                    </div>

                  </div>

                    <div class="col text-center">
                       <div class="form-group">
                         <input type="submit" name="submit" value="Proceed Payment >>" class="btn btn-sm btn-flat btn-info">
                      </div>
                     
                  </div>
                </div>
               </form>      
    </div>
  </div>
</div>
