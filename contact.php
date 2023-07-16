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
             echo "<script>alert('$em2'); window.location.href = 'contact.php';</script>";
              }

              validate("Successfully subscribe!");
          }
          else {
              function validate($em1){
              echo "<script>alert('$em1'); window.location.href = 'contact.php';</script>";
            }
            validate("Error occured, Try again!");
            }
          }       
?>
  <head>
<?php 
 $sql4 = "SELECT * FROM companyinfo"; 
 $query4 = mysqli_query($conn, $sql4); 
 $row4= mysqli_fetch_assoc($query4);
?>
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
          <h5 class="text-info"><b><?php echo $row4["name"]; ?>.</b></h5>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto" style="font-weight:bolder; font-family: Geometr415 Blk BT">
            <li class="nav-item">
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
            <li class="nav-item active">
              <a class="nav-link" href="contact.php">Contact us</a></a>
            </li>
          </ul>

        </div>
      </nav>    

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/Logistics.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
            <h1 class="text-white font-weight-light text-uppercase font-weight-bold">Contact Us</h1>
            <p class="breadcrumb-custom"><a href="index.php"><b>Home</b></a> <span class="mx-2">&gt;</span> <a href="contact.php"><b>Contact</b></a></p>
          </div>
        </div>
      </div>
    </div>  


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
    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-7 mb-5">
            <form action="contact.php" class="p-5 bg-white" method="POST"> 
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
                  <input type="submit" value="Send Message" class="btn btn-success py-2 px-4 text-white" name="send">
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
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Our customers service makes it an important part of the value chain for clients to be attend to.</p>
              <p><a href="about.php" class="btn btn-success px-4 py-2 text-white">Learn More</a></p>
            </div>

          </div>
        </div>
      </div>
    </div>


<?php include 'footer_h.php'; ?>