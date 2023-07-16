
     <div class="modal fade" id="pickup_drop_modal<?php echo $row["id"]?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel"> Adding Pickups/Drops</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php
               if ($row["status"]=="0")                 
               echo "<form action='delete_load_query.php' method='POST'>
                   <div class='modal-body'>
                        <input type='hidden' name='delete_id' id='delete_id'>

                        <h4> What do you want ?</h4>
                    </div>
                    <div class='modal-footer justify-content-between'>
                        <a href='pickupsTable.php?reg={$row["id"]}' class='btn btn-sm btn-primary'><i class='fa fa-plus'></i> Pickups</a>
                        <p>Rate Confirmation: #{$row["rateConfirmationID"]}</p>
                       <a href='dropsTable.php?reg={$row["id"]}' class='btn btn-sm btn-primary'><i class='fa fa-plus'></i> Drops</a>
                    </div>
                </form>";


                else 
                    echo "<form action='delete_load_query.php' method='POST'>
                   <div class='modal-body'>
                        <input type='hidden' name='delete_id' id='delete_id'>

                        <h6> You can not Edit Pickups/Drops, The Load has already been assigned.</h6>
                        <p><small class='badge badge-info'> Contact the Despatcher</small></p>
                    </div>
                    
                </form>";
            ?>
            </div>
        </div>
    </div>


