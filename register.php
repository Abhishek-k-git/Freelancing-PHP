<?php require_once 'connection.php'; ?>

<?php
    if(isset($_POST ['register'])) {
        if(($_POST ['useremail']=='') && ($_POST ['password']=='') && ($_POST ['jobtype']=='')) {
            $_SESSION ['data'] = 'Please fill all fields';
        } else {
            $useremail = $_POST ['useremail'];
            $password = $_POST ['password'];
            $jobtype = $_POST ['jobtype'];

            $query = "SELECT * FROM users WHERE EMAIL='$useremail'";
			$result = $conn->query($query);
			if($result->num_rows >0) {
                $_SESSION ['data'] = 'Email already exists';
            } else {
                $pass = password_hash($password, PASSWORD_BCRYPT);
                $final_pass = mysqli_real_escape_string($conn, $pass);
                $final_email = mysqli_real_escape_string($conn, $useremail);
                $final_jobtype = mysqli_real_escape_string($conn, $jobtype);

                $query = "INSERT INTO users(EMAIL, PASS, STATUS)
                VALUES('$final_email','$final_pass','$final_jobtype')";
                $result = $conn->query($query);
                if($result) {
                    $_SESSION ['data'] = 'Account successfully created';
                } else {
                    $_SESSION ['data'] = 'Failed to create account';
                }
            }
        }
    } else {
        $_SESSION ['data'] = 'Register here';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Freelancing</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="style/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-11 d-flex align-items-center">
          <h1 class="logo mr-auto"><a href="index.html">Freelancing</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li><a href="index.html">Home</a></li>
              <li><a href="#about">About Us</a></li>
              <li><a href="#services">Services</a></li>
              <li><a href="#portfolio">Portfolio</a></li>
              <li><a href="#team">Team</a></li>
              <li class="drop-down"><a href="">Start</a>
                <ul>
                  <li><a href="#">Post job</a></li>
                  <li><a href="#">Freelancing</a></li>
                  <li><a href="#">Account</a></li>
                  <li><a href="#">Help</a></li>
                </ul>
              </li>
              <li><a href="#contact">Contact Us</a></li>

            </ul>
          </nav><!-- .nav-menu -->
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Register Page</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Register</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page mt-4">
      <div class="container">
        <form action="" method="POST">
            <div class="container">   
                <label>Email : </label>   
                <input type="text" placeholder="Enter Email" name="useremail" required>  
                <label>Password : </label>   
                <input type="password" placeholder="Enter Password" name="password" required>  
                <label>Job type : </label>   
                <select name="jobtype">
                    <option value="freelancer">Freelancer</option>
                    <option value="company">Company</option>
                </select>
                <button type="submit" name="register">Register</button>    
                <a href="index.html" ><button type="button" class="cancelbtn"> Cancel</button></a>
                Already have account <a href="login.php"> Login? </a>  <br> 
                <small style="color:red;font-size:20px;"><?php echo $_SESSION ['data']; ?></small>
            </div>   
        </form> 
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Freelancing</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">About us</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Services</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Freelancing</strong>. All Rights Reserved
      </div>
      <div class="credits">
        
        Designed by <a href="#">Freelancing</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!--Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>