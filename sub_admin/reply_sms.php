  <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="reply_sms_modal<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel"> Replying Message </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="#.php" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="tex" name="subject" class="form-control" placeholder="Subject">
                                </div>
                                <div class="form-group">
                                    <label>TO</label>
                                    <input type="tex" name="subject" class="form-control" value="<?php echo $row["email"]; ?>" >
                                </div>

                                  <div class="form-group">
                                    <label>Message</label>
                                    <div class="mailbox-read-message">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Type your message."></textarea>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <input type="hidden" name="delete_id" id="delete_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel </button>
                        <button type="submit" name="" class="btn btn-primary"> Send</button>
                    </div>
                </form>

            </div>
        </div>
    </div>