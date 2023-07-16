     <div class="modal fade" id="delivered_modal<?php echo $row["load_id"]?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel"> Load Delivered #<?php echo $row["rateConfirmationID"]; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <form class="form">
                    <div class='modal-footer justify-content-between'>
                        <a href="pickLoadTable.php?load_id=<?php echo $row["load_id"]?>" class="btn btn-sm btn-primary"> View Loads Picked</a>
                        
                       <a href="dropLoadTable.php?load_id=<?php echo $row["load_id"]?>" class="btn btn-sm btn-danger">View Loads Dropped</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


