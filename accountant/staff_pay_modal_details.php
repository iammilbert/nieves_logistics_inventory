<div class="modal fade" id="staff_pay_modal<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">Payment Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
           <table id="example1" class="table" style="font-size:13px;">
                  <thead>
                   <tr>
                    <th>ID</th>
                    <th>MONTHS</th>
                    <th>STATUS</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
              
                      $sql="SELECT * FROM staff_salaries";
                      $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                      while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                          <td><?php echo $row['staff_id']; ?></td>
                        <td><?php echo $row['months']; ?></td>
                        <td><?php if ($row["id"]>0) {
                          echo "Paid";
                        } echo $row['email']; ?></td>
                      </tr>

                    <?php                      
                    include'staff_pay_modal.php';
                    include'staff_pay_modal_details.php';
                      }
                      

                    ?>
              
                  </tbody>
                </table>     
    </div>
  </div>
</div>
