 <div class="container">
                      <div class="row">
                        <label class="form-control bg-info" style="font-size:13px;">SPECIAL INSTRUCTIONS - MUST READ</label>
                          <ol style="font-size:13px;">
                            <li>MUST RECEIVE PICTURE OF BOLS BEFORE LEAVING THE SHIPPER</li>
                            <li>DO NOT PAY LUMPER AT C&S. IT IS PRE PAID</li>
                            <li>. All detention requests must be made via this email: <?php echo $row4["email"]; ?> and responses will be returned to the carrier within 5 business days.</li>
                          </ol>

                          <p class="text-justify" style="font-size:13px;">HEALTH RESTRICTIONS: As concerns regarding COVID-19 (Coronavirus) grow, RTS will continue to prioritize safety above all. We ask that you cooperate with 
officials at shipping and receiving facilities as they take measures to limit the spread of the virus. They may ask you questions pertaining to your recent health and travel 
history, and it is at their discretion that you may be asked to leave the facility if it seems you pose a health risk to others.</p>


                      </div>
                    </div>


                    <div class="container">
                      <div class="row">
                        <label class="form-control bg-info" style="font-size:13px;">TERMS AND CONDITIONS</label>
                          <p class="text-justify" style="font-size:13px;">This load is subject to all terms and conditions of the Broker-Carrier Agreement. As the Motor Carrier you understand that you are functioning independently and RTS 
is functioning as the property broker.</p>

<label>SUBMITTING PAPERWORK:</label>
<ol>
  <li>DIGITAL PAPERWORK (gets you paid faster): EMAIL: PDF to invoices@relyonrts.com | FAX: 937-378-5370 | TRANSFLO: Broker ID is RTSBV</li>
  <li>ORIGINAL PAPERWORK (if necessary): <?php echo $row4["address"]; ?> <?php echo $row4["poBox"]; ?></li>
</ol>

<p><b>ALL CALLS RECORDED:</b> Carrier understands that all calls are recorded for quality assurance and agrees to notify all drivers, dispatchers, agents, affiliates, and any individual or 
company speaking on your behalf of this policy.</p>

<p>DETENTION: Detention can only be authorized by RTS if notification is received prior to detention time starting. Failure to provide timely communication may result in lack of 
payment to carrier/RTS.</p>
<p>As an authorized representative of LGTI LOGISTICS, you confirm that: 1) You have the authority to act on behalf of LGTI LOGISTICS, 2) The carrier information above is correct, 3) 
The DOT# listed above will be on the side of the truck that will be physically hauling the load, 4) You have read and agree to the load notes above, and 5) You will make sure the 
driver is aware of the load notes and is able to fulfill these requirements.</p>

<?php 
$staffID = $_SESSION["id"];
  $sqlStaff = "SELECT * FROM users WHERE id = $staffID";
  $queryStaff = mysqli_query($conn, $sqlStaff);
  $rowStaff = mysqli_fetch_assoc($queryStaff);
?>

<p><b><?php echo $rowStaff["name"]; ?></b> committed to this via a digital rate confirmation at http://rtms.app/104DGC on 5/26/2022 at 1512 (03:12 PM). 
Signed at 8.978309, 7.570411 using IP address: 197.210.76.154 from provider: MTN NIGERIA Communication limited.</p>

<p style="font-style: italic;"><b>Consent to do business electronically:</b> By completing our forms electronically, you agree that the electronic signatures appearing on these documents are the 
same as handwritten signatures for the purposes of validity, enforceability, and admissibility</p>



              <div class="container">
                <div class="row"> 
                   <div class="col-md-5 text-center">
                    <span><?php echo $row4["name"];?></span><br>
                     <hr><br>
                    <label><?php echo $row4["ceo"]; ?> <?php echo $row4["name"]; ?></label>
                  </div>

                  <div class="col-sm-2">
                    
                  </div>

                    <div class="col-md-5 text-center">
                      <span><?php echo $row2["name"]; ?> </span><br>
                    <hr><br>
                    <label>Authorized Carrier Representative Signature</label>
                  </div>
                </div>
              </div>   


                      </div>
                    </div>
              <div class="modal-footer no-print">
                  <a href="driver_workload.php" class="btn btn-sm btn-danger no-print"><i class="fa fa-backward no-print"></i> Back</a>

                  <a href="driverDetails_Print.php?id=<?php echo $id;?>" class="btn btn-primary no-print"><i class="fa fa-print no-print"></i> Print</a>
              </div>