<?php require_once 'connection.php'; ?>

<?php
    if(isset($_SESSION ['email']) && ($_SESSION ['loggedin']==True)) {
        $useremail = $_SESSION ['email'];?>
      
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
              <!--<li><a href="#about">About Us</a></li>
              <li><a href="#services">Services</a></li>
              <li><a href="#portfolio">Portfolio</a></li>
              <li><a href="#team">Team</a></li>-->
              <li class="drop-down"><a href="">Start</a>
                <ul>
                  <li>
                    <?php
                        $query = "SELECT * FROM users WHERE EMAIL='$useremail'";
                        $result = $conn->query($query);
                        if($result->num_rows >0) {
                            while($row = $result->fetch_assoc()) {
                    ?>

                    <img src="<?php echo $row ['PHOTO']; ?>" height=60px width=60px style="margin-left:30px;border-radius:20%;"/>
                    <?php } }else { ?>
                        <img src="images/profile.png" height=60px width=60px style="margin-left:30px;border-radius:20%;"/>
                    <?php } ?>
                  </li>
                  <li><a href="logout.php">Sign out</a></li>
                  <li><a href="profile.php">Account</a></li>
                  <li><a href="#">Help</a></li>
                </ul>
              </li>
              <li><a href="index.html">Home</a></li>
              

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
          <h2>Works posted</h2>
          <ol>
            <li><a href="freelancer.php">Home</a></li>
            <li><a href="jobs.php">Jobs</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page mt-4">
      <div class="container bg-white">

      <section>
          <div class="container bg-white text-dark">
               <div class="text-center">
                    <h1>Works listed</h1>

                    <br>

                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, alias.</p>
               </div>
          </div>
     </section>


<section class="section-background">
<div class="container">

<div class="row">
<div class="col-lg-3 col-xs-12">

<?php
     $query = "SELECT * FROM jobs WHERE CATEGORY LIKE '%Web development%'";
     $result = $conn->query($query);
     $webnum = $result->num_rows;

     $query = "SELECT * FROM jobs WHERE CATEGORY LIKE '%App development%'";
     $result = $conn->query($query);
     $appnum = $result->num_rows;

     $query = "SELECT * FROM jobs WHERE CATEGORY LIKE '%Data entry%'";
     $result = $conn->query($query);
     $datanum = $result->num_rows;

     $query = "SELECT * FROM jobs WHERE CATEGORY LIKE '%Photoshop%'";
     $result = $conn->query($query);
     $photonum = $result->num_rows;
?>

     <div class="form">
          <form action="#" style="color:green;padding-left:10px;">
               <h4>Type</h4>

               <div>
                    <label>
                         <!--<input type="checkbox">-->

                         Contract (5)
                    </label>
               </div>

               <div>
                    <label>
                         <!--<input type="checkbox">-->

                         Full time (5)
                    </label>
               </div>

               <div>
                    <label>
                         <!--<input type="checkbox">-->

                         Internship (5)
                    </label>
               </div>

               <br>

               <h4>Category</h4>

               <div>
                    <label>
                         <!--<input type="checkbox">-->

                         Photoshop (<?php echo $photonum; ?>)
                    </label>
               </div>

               <div>
                    <label>
                         <!--<input type="checkbox">-->

                         Web development (<?php echo $webnum; ?>)
                    </label>
               </div>

               <div>
                    <label>
                         <!--<input type="checkbox">-->

                         App development (<?php echo $appnum; ?>)
                    </label>
               </div>

               <br>

               <div>
                    <label>
                         <!--<input type="checkbox">-->

                         Data Entry (<?php echo $datanum; ?>)
                    </label>
               </div>

               <br>

               <h4>Career levels</h4>

               <div>
                    <label>
                         <!--<input type="checkbox">-->

                         Entry Level (5)
                    </label>
               </div>

               <div>
                    <label>
                         <!--<input type="checkbox">-->

                         Mid (5)
                    </label>
               </div>

               <div>
                    <label>
                         <!--<input type="checkbox">-->

                         Experienced (5)
                    </label>
               </div>

               <br>

          </form>
     </div>
</div>

<div class="col-lg-9 col-xs-12">
     <div class="row">
                    <?php
                        $query = "SELECT * FROM jobs";
                        $result = $conn->query($query);
                        if($result->num_rows >0) {
                            while($row = $result->fetch_assoc()) {
                    ?>
          <div class="col-lg-6 col-md-4 col-sm-6">
               <div class="courses-thumb courses-thumb-secondary">
                    <div class="courses-top">
                         <div class="courses-image">
                              <img src="<?php echo $row ['PHOTO']; ?>" class="img-responsive" alt="" height=200px width=200px>
                         </div>
                         <div class="courses-date">
                              <span title="Posted on"><i class="fa fa-calendar"></i> <?php echo $row ['DATE']; ?></span>
                              <span title="Location"><i class="fa fa-map-marker"></i> <?php echo $row ['COUNTRY']; ?></span><br>
                              <span title="Type"><i class="fa fa-phone"></i> <?php echo $row ['MOBILE']; ?></span>
                         </div>
                    </div>

                    <div class="courses-detail">
                         <h3><a href="#"><?php echo $row ['JOB_TITLE']; ?></a></h3>

                         <p class="lead"><strong>$<?php echo $row ['PAY']; ?></strong></p>

                         <p><?php echo $row ['DESCRIPTION']; ?></p>
                    </div>

                    <div class="courses-info">
                         <a href="job-details.php?id=<?php echo $row ['ID'];?>&company=<?php echo $row ['JOB_TITLE'];?>" class="section-btn btn btn-primary btn-block">View Details</a>
                    </div>
               </div>
          </div>
          <?php } }else { }?>
     </div>
</div>
</div>
</div>
</section>

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

<?php } else {
    header('location:login.php');
} ?>