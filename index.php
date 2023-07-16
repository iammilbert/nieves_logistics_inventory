<!DOCTYPE html>
<html lang="en">
  <?php
include 'config.php';
    if (isset($_POST['subscribe'])){
       $email = $_POST["email"];
       $date_sub = $_POST["date_sub"];
            
           $query2 = "INSERT INTO subscribers (email, date_sub) VALUES('$email', '$date_sub')";
           $result = mysqli_query($conn, $query2) or die(mysqli_error($conn));

           if ($result) {
              function validate($em2){
             echo "<script>alert('$em2'); window.location.href = 'index.php';</script>";
              }

              validate("Successfully subscribe!");
          }
          else {
              function validate($em1){
              echo "<script>alert('$em1'); window.location.href = 'index.php';</script>";
            }
            validate("Error occured, Try again!");
            }
        }  
?>

<?php 
if (isset($_POST["send"])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $status = $_POST['status'];
    $date = $_POST['date'];

    $sql = "INSERT INTO contacts(firstName, lastName, email, subject, message, status, date) VALUES('".$firstName."', '".$lastName."', '".$email."', '".$subject."', '".$message."', '".$status."', '".$date."')";
    $query = mysqli_query($conn, $sql);

         if ($query) {
              function validate($cts){
             echo "<script>alert('$cts'); window.location.href = 'index.php';</script>";
              }

              validate("Message Sent, Thank You, we will get back to you. Click OK to Continue");
          }
         else {
              function validate($cts1){
              echo "<script>alert('$cts'); window.location.href = 'index.php';</script>";
            }
            validate("Error occured, Try again!");
            }
  }
?>

<?php 
 $sql4 = "SELECT * FROM companyinfo"; 
 $query4 = mysqli_query($conn, $sql4); 
 $row4 = mysqli_fetch_assoc($query4);
?>
  <head>
    <title><?php echo $row4["name"]; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="index.php">
          <h5 class="text-primary bold"><b><?php echo $row4["name"]; ?>.</b></h5>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto" style="font-weight:bolder; font-family: Geometr415 Blk BT">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Career
              </a>
                   <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                <a class="dropdown-item" href="#">Vacancies</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Careers</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Blog</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="services.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Services
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="services.php">Air Freight</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="services.php">Ocean Freight</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="services.php">Ground Shipping</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="services.php">Warehousing</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="services.php">Storage</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="services.php">Van Hiring</a>
              </div>
            </li>

             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Users
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="login.php">Login</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="register.php">Signup</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a></a>
            </li>
          </ul>

        </div>
      </nav>  

    <div class="site-blocks-cover overlay" style="background-image: url(images/Logistics.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col" data-aos="fade-up" data-aos-delay="400">
            

            <h1 class="font-weight-light mb-5 text-Sentencecase font-weight-bold" style="font-weight:bolder; font-family: Geometr415 Blk BT;"><b>NIEVES LOGISTICS.</b> <br> Fastest <span class="text-primary">Logistics</span> Services</h1>
            <p><a href="#services" class="btn btn-primary py-3 px-5 text-white">Get Started!</a></p>

          </div>
        </div>
      </div>
    </div>  

  
  <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary" id="services">Our Services</h2>
            <p class="color-black-opacity-5">We Offer The Following Services</p>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-travel"></span></div>
               <div>
                <h3 id="airfreight">Air Freight</h3>
                <p>We give you live information on your Product. Shipment of goods through an air carrier <span id="dots1">...</span><span id="more1" style="display: none;"> We have Air transport services that are the most valuable when it comes to moving express shipments around the world.</span></p>
                 <button class="btn btn-sm btn-primary" style="color:white;" onclick="myFunction1()" id="myBtn1">Read more</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-sea-ship-with-containers"></span></div>
               <div>
                <h3 id="oceantp">Ocean Freight</h3>
                <p>Transporting large quantities of goods through the sea. Prod<span id="dots2">...</span></span><span id="more2" style="display: none;">ucts are packed into large containers which are loaded onto vessels sailed to the destination country/state.</span></p>
                <button class="btn btn-sm btn-primary" style="color:white;" onclick="myFunction2()" id="myBtn2">Read more</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-frontal-truck"></span></div>
               <div>
                <h3 id="roadtp">Ground Shipping</h3>
                <p>Your delivery would make it across the country fom one city to the next by truck, until it reaches it's destination <span id="dots3">...</span></span><span id="more3" style="display: none;"> It is usually inexpensive and fast since it could be moved by NIEVES Professional Drivers.</span></p>
                <button class="btn btn-sm btn-primary" style="color:white;" onclick="myFunction3()" id="myBtn3">Read more</button>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-barn"></span></div>
              <div>
                <h3 id="ware">Warehousing</h3>
                <p>We have the largest and the cleanest warehouse and well secure environment with top security personnels <span id="dots">...</span><span id="more" style="display: none;"> Dealing with logistics management and optimizing your distribution network and warehouses in NIEVES Logistics helps reduce supply chain costs.</span></p>
                <button class="btn btn-sm btn-primary" style="color:white;" onclick="myFunction()" id="myBtn">Read more</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-platform"></span></div>
              <div>
                <h3 id="storage">Storage</h3>
                <p>Guarantee accurate temperature delivery and reduce warehouse losses, <span id="dots4">...</span><span id="more4" style="display: none;"> making it possible to offer better services, to occupy a position ahead of competitors and, ultimately, to increase profits.</span></p>
                    <button class="btn btn-sm btn-primary" style="color:white;" onclick="myFunction4()" id="myBtn4">Read more</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-car"></span></div>
              <div>
                <h3 id="van">Delivery Van</h3>
                <p>NIEVES has got you covered with all sizes of vans and trucks suitable for moving small and large items, <span id="dots5">...</span><span id="more5" style="display: none;">  ranging from household and consumer goods, office equipment, home moving and office relocation.</span></p>
                <button class="btn btn-sm btn-primary" style="color:white;" onclick="myFunction5()" id="myBtn5">Read more</button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  

    <div class="site-section block-13">
      <!-- <div class="container"></div> -->
       <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary" id="services">Our Vehicles</h2>
            <p class="color-black-opacity-5">The Following are services we offer</p>
          </div>
        </div>
      <div class="owl-carousel nonloop-block-13">
        <div>
          <a href="#" class="unit-1 text-center">
            <img src="images/van1.jpg" alt="NIEVES Truck" style="height:200px;" class="img-fluid">
            <div class="unit-1-text">
              <h3 class="unit-1-heading">NIEVES Truck</h3>            
         
            </div>
          </a>
        </div>

        <div>
          <a href="#" class="unit-1 text-center">
            <img src="images/van2.jpg" alt="Image" style="height:200px;" class="img-fluid">
            <div class="unit-1-text">
              <h3 class="unit-1-heading">Fast and Firm</h3>
            </div>
          </a>
        </div>

         <div>
          <a href="#" class="unit-1 text-center">
            <img src="images/van3.png" style="height:200px;" alt="NIEVES Truck" class="img-fluid">
            <div class="unit-1-text">
              <h3 class="unit-1-heading">Temperature Control</h3>
            </div>
          </a>
        </div>

      </div>
    </div>
  <div class="site-section block-13">
      <!-- <div class="container"></div> -->
       <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary" id="services">Our Warehouses</h2>
            <p class="color-black-opacity-5">We have the following warehouses</p>
          </div>
        </div>
      <div class="owl-carousel nonloop-block-13">
        <div>
          <a href="#" class="unit-1 text-center">
            <img src="images/ware2.jpg" alt="NIEVES Warehouse" class="img-fluid">
            <div class="unit-1-text">
              <h3 class="unit-1-heading">Storage Truck</h3>

            </div>
          </a>
        </div>

        <div>
          <a href="#" class="unit-1 text-center">
            <img src="images/ware5.jpg"alt="NIEVES Warehouse" class="img-fluid">
            <div class="unit-1-text">
              <h3 class="unit-1-heading">Tempearture Control</h3>
            </div>
          </a>
        </div>

         <div>
          <a href="#" class="unit-1 text-center">
            <img src="images/ware4.jpg" alt="NIEVES Warehouse" class="img-fluid">
            <div class="unit-1-text">
              <h3 class="unit-1-heading">Temperature Control</h3>
            </div>
          </a>
        </div>

        <div>
          <a href="#" class="unit-1 text-center">
            <img src="images/ware5.jpg" alt="NIEVES Warehouse"  class="img-fluid">
            <div class="unit-1-text">
              <h3 class="unit-1-heading">Grade 1 Ship</h3>
            </div>
          </a>
        </div>
      </div>
    </div>

<div class="site-section border-bottom">
      <div class="container">

        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Testimonials</h2>
          </div>
        </div>

        <div class="slide-one-item home-slider owl-carousel">
          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="images/Passport.jpg" alt="NIEVES testifiers" class="img-fluid mb-3">
                <p>Michael Gabriel</p>
              </figure>
              <blockquote>
                <p>&ldquo;Good afternoon! I just wanted to let you know that NIEVES Logistics is one of my favorite Company to work with in the shipping world. NIEVES is the most courteous Company I deal with. I have to deal with logistics groups all over this country and NIEVES Logistics is by far the best. Just wanted to give a shout-out to NIEVES.&rdquo;</p>
              </blockquote>
            </div>
          </div>
          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="images/bar.jpeg" alt="NIEVES testifiers" class="img-fluid mb-3">
                <p>Mr. Joseph</p>
              </figure>
              <blockquote>
                <p>&ldquo;I am so thankful that we found NIEVES Logistics. We typically don’t have a need for shipping and logistics companies – so the first three that we have worked with left us feeling that we should just expect subpar customer service in this industry. I’m so thankful we found NIEVES Logistics. Every single person we’ve interacted with has been organized, personable, resourceful, patient, and totally customer focused.&rdquo;</p>
              </blockquote>
            </div>
          </div>

          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="images/dan.jpeg" alt="NIEVES testifiers" class="img-fluid mb-3">
                <p>Mr. Daniel John</p>
              </figure>
              <blockquote>
                <p>&ldquo;I wanted to let you know that we are really glad we reached out to you guys to help with shipping our products. Your team has done a phenomenal job for us, starting from the moment I reached out to you. NIEVES Logistics level of communication and overall performance has been excellent throughout the entire process.&rdquo;</p>
              </blockquote>
            </div>
          </div>

          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="images/car_1.png" alt="NIEVES testifiers" class="img-fluid mb-3">
                <p>Bruce Rogers</p>
              </figure>
              <blockquote>
                <p>&ldquo;I am so thankful that we found NIEVES Logistics. Your customer Service is top notch and you have incredible Team.&rdquo;</p>
              </blockquote>
            </div>
          </div>

        </div>
      </div>
    </div>


    
    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(images/Logistics.jpg); background-attachment: fixed;">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

<style type="text/css">
  video {
  /* override other styles to make responsive */
  width: 100%    !important;
  height: auto    !important;
  
}

</style>
          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            <video controls> 
              <source src="NIEVESvid.mp4" type="video/mp4">
                <source src="vid.ogg" type="video/ogg">
                Your browser does not support the video tag. 
            </video>
            
          </div>
        </div>
      </div>
    </div> 
  

    <div class="site-section bg-light">
     <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <h2 class="mb-5 text-black">Try Our Services</h2>
            <p class="mb-0"><a href="https://wa.me/<?php echo $row4["tel"]; ?>" target="_blank" class="btn btn-flat btn-sm btn-primary py-3 px-5 text-white">Chat <i class="icon-whatsapp" style="font-size:35px;"></i></a></p>
          </div>
        </div>
      </div>
      <p></p>
      <div class="container">
        <div class="row">
          <div class="col-md-7 mb-5">
            <form action="index.php" class="p-5 bg-white" method="POST"> 
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="firstName">First Name</label>
                  <input type="text" id="firstName" class="form-control" name="firstName">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lastName">Last Name</label>
                  <input type="text" id="lastName" class="form-control" name="lastName">
                  <input type="hidden" id="status" class="form-control" name="status" value="0">
                  <input type="hidden" id="date" class="form-control" name="date" value="<?php echo date("d-m-Y"); ?>">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" class="form-control" name="email">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Subject</label> 
                  <input type="subject" id="subject" class="form-control" name="subject">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Message</label> 
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-primary py-2 px-4 text-white" name="send">
                </div>
              </div>

  
            </form>
          </div>
          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4"><?php echo $row4["address"]; ?> <?php echo $row4["state"]; ?> <?php echo $row4["city"]; ?> <?php echo $row4["country"]; ?>, <?php echo $row4["poBox"]; ?>, <?php echo $row4["zipCode"]; ?></p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="tel:<?php echo $row4["tel"]; ?>"><?php echo $row4["tel"]; ?></a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="mailto:<?php echo $row4["email"]; ?>"><?php echo $row4["email"]; ?></a></p>
              <p class="mb-0"><a href="mailto:<?php echo $row4["email2"]; ?>"><?php echo $row4["email2"]; ?></a></p>

            </div>
            
            <div class="p-4 mb-3 bg-white">
              <p><a href="about.php" class="btn btn-primary px-4 py-2 text-white">Get More Direction</a></p>
                <form>
                    <div class="form-group">
                        <div class="gmap_canvas">
                            <iframe width="400" height="313" id="gmap_canvas" src="https://maps.google.com/maps?q=153%20W%20Moser%20Ave%20PA%20Coadale%20America&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <style>.gmap_canvas {overflow:hidden;background:none!important;height:313px;width:483px;}</style>
                        </div>
                    </div>
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
    


  <?php include 'footer_h.php'; ?>
