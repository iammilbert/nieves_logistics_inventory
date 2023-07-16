
 <div class="modal fade" id="updateLoad_Modal<?php echo $row['id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title" id="staticBackdropLabel">Load Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="car card-primary">
                         <!-- form start -->
 <!-- form start -->
              <form class="form" method="POST" action="load.php">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span class="bold">Rate Confirmation</span>
                    </div>
                  </div>
                  <input type="text" name="rateConfirmationID" class="form-control" value="<?php echo $row['rateConfirmationID']?>">         
              </div>
              
               <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']?>">

                 <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span class="bold">Rate</span>
                    </div>
                  </div>
                  <input type="text" name="rate" class="form-control" value="<?php echo $row['rate']?>">   
                       <div class="input-group-append">
                    <div class="input-group-text">
                       <span class="bold">USD</span>
                    </div>
                  </div>
              </div>
                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span class="bold">Date Registered</span>
                    </div>
                  </div>
                  <input type="text" name="dateRegistered" class="form-control" value="<?php echo $row['dateRegistered']?>">         
              </div>

                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span class="bold">Load Description</span>
                    </div>
                  </div>
                  <input type="text" name="loadDescription" class="form-control" value="<?php echo $row['loadDescription']?>">         
              </div>

            <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span class="bold">Weight</span>
                    </div>
                  </div>
                  <input type="text" name="weight" class="form-control" value="<?php echo $row['weight']?>">         
              </div>
          </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span class="bold">Broker's Name</span>
                    </div>
                  </div>
                  <input type="text" name="brokerName" class="form-control" value="<?php echo $row['brokerName']?>">         
              </div>


                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span class="bold">Broker Email</span>
                    </div>
                  </div>
                  <input type="email" name="brokerEmail" class="form-control" value="<?php echo $row['brokerEmail']?>">         
              </div>
                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span class="bold">Broker Tel.</span>
                    </div>
                  </div>
                  <input type="tel" name="brokerNumber" class="form-control" value="<?php echo $row['brokerNumber']?>">         
              </div> 
                <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span class="bold">Shipper Email</span>
                    </div>
                  </div>
                  <input type="email" name="shipperEmail" class="form-control" value="<?php echo $row['shipperEmail']?>">        
              </div>
              
                    <div class="input-group mb-3">
                 <div class="input-group-append">
                    <div class="input-group-text">
                       <span class="bold">Shipper Address</span>
                    </div>
                  </div>
                  <input type="location" name="shipperAddress" class="form-control" value="<?php echo $row['shipperAddress']?>">        
              </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-light btn-danger" data-dismiss="modal">Cancel</button>
                  <input type="submit" class="btn btn-outline-light btn-primary" name="update" value="Update">
              </div>
            </div>
              </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<style type="text/css">
  .input-group .form-control{
    color: blue;
  }
</style>

