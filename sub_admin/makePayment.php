<div class="modal fade" id="makePayment<?php echo $id_row["driver_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">PAYMENT CONFIRMATION</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
      <form class="form" action="makePayment_query.php" method="POST">
                <div class="card-body">
                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span><b>Drivers ID</b></span>
                    </div>
                  </div>
                  <input type="text" name="#" class="form-control" readonly value="<?php echo $id_row['name']?>">  
                  <input type="hidden" name="driver_id" class="form-control" value="<?php echo $id_row['driver_id']?>"> 
                  <input type="hidden" name="payrollStatus" class="form-control">   

                   <input type="hidden" name="paidBy" class="form-control" value="<?php echo $_SESSION['Id']; ?>" >    
              </div>

                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span><b>DATE RANGE</b></span>
                    </div>
                  </div>
                  <input style="text-align:right;" type="text" name="" class="form-control" readonly value="<?php echo $startDate; ?> - <?php echo $endDate; ?> ">  

                   <input style="text-align:right;" type="hidden" name="startDate" class="form-control" readonly value="<?php echo $startDate; ?>">  

                    <input style="text-align:right;" type="hidden" name="endDate" class="form-control" readonly value="<?php echo $endDate; ?>">  

                   <div class="input-group-append">
                    <div class="input-group-text">
                       <i class="fa fa-calendar"><b></b></i>
                    </div>
                  </div>       
              </div>

              <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span><b>SUM TOTAL</b></span>
                    </div>
                  </div>
                  <input id="totalAmount" style="text-align:right;" type="text" name="totalAmount" class="form-control bold font-size-28" readonly value="<?php echo number_format($id_row['sum'], 2, '.', ',');?>">

                   <input type="hidden" name="grossPay" value="<?php echo $id_row['sum']; ?>"> 
                   <input type="hidden" name="amountPaid" value="<?php echo $id_row['sum']; ?>"> 

                  <input type="hidden" name="timePaid" class="form-control" value="<?php echo date('h:i:s a'); ?> ">  
                   <div class="input-group-append">
                    <div class="input-group-text">
                       <span><b>USD</b></span>
                    </div>
                  </div>       
              </div>

                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span><b>Comment:</b></span>
                    </div>
                  </div>
                 <textarea class="form-control" name="comment"></textarea>    
              </div>


                  <input type="hidden" name="datePaid" class="form-control" value="<?php echo date("m/d/Y") ?>">

                  <input type="hidden" name="paymentStatus" class="form-control" value="1">         

                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <input type="checkbox" name="terms" required="terms">  
                    </div>
                  </div>
                   <h6 class="text-green">Click on the checkbox to confirm. </h6>            
              </div>

                </div>

              <div class="modal-footer justify-content-between ">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fas fa-close">Cancel</span></button>

                    <input type="submit" name="pay" class="btn btn-success">
              </div>

              </form>
      
    </div>
  </div>
</div>



<script type="text/javascript">
  function getPartPayMent(){

  var balance = $('#balance').val();
  var totalAmount = $('#totalAmount').val();
  var amountPaid = $('#amountPaid').val();    
  $('#balance').val(Math.round(totalAmount - amountPaid));

}

</script>