     <div class="modal fade" id="pickup_drop_modal<?php echo $row["load_id"]?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel"> Pick/Drop Load</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <form class="form">
                   <div class='modal-body'>
                        <h4> What do you want ?</h4>
                    </div>
                    <div class='modal-footer justify-content-between'>
                        <a href="pickLoadTable.php?load_id=<?php echo $row["load_id"]?>" class="btn btn-sm btn-primary"> Pickups</a>
                        
                        <p>Rate Confirmation: #<?php echo $row["rateConfirmationID"]; ?></p>
                       <a href="dropLoadTable.php?load_id=<?php echo $row["load_id"]?>" class="btn btn-sm btn-danger">Drops</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


