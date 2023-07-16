    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
  <div class="modal fade" id="delete<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Delete Load Data </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="delete_load_query.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id" value="<?php echo $row["id"]; ?>">
                        <h4> Do you want to Delete this Load ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-danger"> Yes !! Delete it. </button>
                    </div>
                </form>
            </div>
        </div>
    </div>