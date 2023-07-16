           <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="cancelModal<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel"> CANCEL DROP  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="cancel_Drop_query.php" method="POST">
                   <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="<?php echo $row["id"]; ?>">
                        <input type="hidden" name="status" value="4">
                        <input type="hidden" name="load_id" value="<?php echo $row["load_id"]; ?>">
                        <input type="hidden" name="dropped_Date" value="<?php echo date("Y-m-d") ?>">
                        <input type="hidden" name="droppedTime" value="<?php echo date("h:i:sa"); ?>">
                       
                        <h5> Rate Confrimation: #<?php echo $row["rateConfirmationID"]; ?> </h5>
                    </div>

                    <div class="form-group modal-body">
                        <label>Reason:</label>
                         <textarea class="form-control" name="comment" requisred="comment"></textarea>
                    </div>


                    <div class="input-group mb-3 modal-body">
                        <div class="container">
                        <div class="row">
                            <div class="col-md-1" style="padding-top:6px;">
                                 <input class="input-group-text" type="checkbox" name="agree" required="agree">
                            </div>
                            
                            <div class="col-md-11">
                                <span> Are you sure ? Terms and Conditions apply!!</span>
                            </div>
                        </div>
                    </div>
                        
                          
                    </div> 

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="cancel" class="btn btn-danger"> Yes !! Cancel. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>