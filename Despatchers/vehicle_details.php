

<div class="modal fade" id="vehicle_details<?php echo $row['id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST">
                  <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title" id="staticBackdropLabel">Vehicle <?php echo $row['number']?> Details</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div> <!-- /.card-header -->
 
             
              <div class="card-body">
              
                <h2 style="text-align: center; font-weight:bolder;"> <?php echo $row['vehicleType']?></h2> 
        
                <hr>

                <strong>VEHICLE VIN</strong>
                <p class="text-muted"><?php echo $row['model'];?> </p>
                <hr>

                   <strong>VEHICLE VIN</strong>
                <p class="text-muted"><?php echo $row['number'];?> </p>
                <hr>

                <strong>VEHICLE Model</strong>
                <p class="text-muted"><?php echo $row['vin'];?> </p>
                <hr>

                 <strong>DRIVER NAME</strong>
                <p class="text-muted"><?php echo $row['name'];?> </p>
               </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
              <div style="clear:both;"></div>
                <div class="modal-footer bg-primary">
                  <button type="button" class="btn btn-outline-light btn-danger" data-dismiss="modal"><span class="fas fa-close">Close</span></button>
                </div>

              </form>
            </div>
          </div>
        </div>
