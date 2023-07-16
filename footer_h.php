
 <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col">
                <h2 class="footer-heading mb-4 text-primary">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="about.php">About Us</a></li>
                  <li><a href="login.php">Login</a></li>
                  <li><a href="register.php">Signup</a></li>
                  <li><a href="contact.php">Contact Us</a></li>
                </ul>
              </div>
              <div class="col">
                <h2 class="footer-heading mb-4 text-primary">Services</h2>
                <ul class="list-unstyled">
                  <li><a href="services.php">Air freight</a></li>
                  <li><a href="services.php">Road Transport</a></li>
                  <li><a href="services.php">Ocean Transport</a></li>
                  <li><a href="services.php">Van Service</a></li>
                  <li><a href="services.php">Warehousing</a></li>
                </ul>
              </div>
            

              <div class="col">
                        <h4 class="footer-heading text-primary mb-4">Get In Touch</h4>
                        <p><i class="icon-map-marker mr-2 text-danger"></i><?php echo $row4["address"]; ?>, <?php echo $row4["city"]; ?> <?php echo $row4["state"]; ?>, <?php echo $row4["country"]; ?></p>

                        <p><i class="icon-phone mr-2 text-white"></i><a href="tel:<?php echo $row4["tel"]; ?>"><?php echo $row4["tel"]; ?></a></p>

                        <p><i class="icon-envelope mr-2 text-primary"></i><a href="mailto:<?php echo $row4["email"]; ?>"><?php echo $row4["email"]; ?></a></p>

                         <p><i class="icon-envelope mr-2 text-primary"></i><a href="mailto:<?php echo $row4["email2"]; ?>"><?php echo $row4["email2"]; ?></a></p>

                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light btn-social mr-2" href="https://www.twitter.com/<?php echo $row4["twitter"]; ?>" target="_blank"><i class="icon-twitter"></i></a>

                            <a class="btn btn-outline-light btn-social mr-2" href="https://www.facebook.com/<?php echo $row4["facebook"]; ?>" target="_blank"><i class="icon-facebook"></i></a>

                            <a class="btn btn-outline-light btn-social mr-2" href="https://wa.me/<?php echo $row4["tel"]; ?>" target="_blank"><i class="icon-whatsapp"></i></a>

                            <a class="btn btn-outline-light btn-social"href="https://www.instagram.com/<?php echo $row4["instagram"]; ?>"><i class="icon-instagram"></i></a>
                        </div>
 
              </div>
            </div>
          </div>
          <div class="col">
            <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
      <form method="POST">
              <div class="input-group mb-3">
                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2" name="email">

                 <input name="date_sub" type="hidden" value=" <?php echo date("Y-m-d"); ?>" >

                <div class="input-group-append">
                  <input type="submit" name="subscribe" class="btn btn-primary text-white" value="Send">
                </div>
              </div>
            </form>
          </div>
        </div>
    
      </div>

    </footer>


        <div class="modal-footer">
          <div class="col">
               <strong>Copyright &copy; 2022 - <?php echo date("Y");?> <a href="https://<?php echo $row4["website"]; ?>"> <?php echo $row4["name"]; ?></a>.</strong> All rights reserved. 
               <div class="float-right d-none d-sm-inline-block"> 
                <b>Developed By</b> Michael Gabriel
              </div> 
          </div>
          
        </div>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
  <script src="js/script.js"></script>
    
  </body>
</html>