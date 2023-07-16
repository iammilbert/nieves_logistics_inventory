<div class="modal fade" id="vehicle_date_range_report_modal<?php echo $row['number']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">GENERATE VEHICLE REPORT</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div> 
        <form class="form" action="vehicle_workload_report.php" method="POST">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <i class="fa fa-exclamation-circle" style="color:red;"></i> Kindly select date range to view pay roll.
                    </div>
                  </div>

                  <div class="row"> 
                    <div class="col">
                      
                    </div>

                    <div class="col">
                      <div class="form-group">
                        <label>From :</label>
                        <input type="date" name="startDate" class="form-control" required ="startDate">
                      </div>
                    </div>

                    <div class="col">
                      <div class="form-group">
                        <label>End:</label>
                        <input type="date" name="endDate" class="form-control" required ="endDate">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $row['number']?>">
                      </div>
                    </div>

                    <div class="col">
                      
                    </div>
                  </div>

                  <div class="row">
                    <div class="col text-center">

                      <input type="submit" name="view" value="Generate" class="btn btn-sm btn-flat btn-warning">

                    </div>
                  </div>
                </div>
               </form>      
    </div>
  </div>
</div>
