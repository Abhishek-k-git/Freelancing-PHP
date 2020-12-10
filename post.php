<?php require_once 'connection.php'; ?>

<?php
    if(isset($_SESSION ['email']) && ($_SESSION ['loggedin']==True)) {
        $useremail = $_SESSION ['email'];?>
  
<?php
if(isset($_POST ['upload'])){
    if(($_POST ['email']=='') && ($_POST ['mobile']=='') && ($_POST ['name']=='') && ($_POST ['category']=='') && ($_POST ['jobtitle']=='') && ($_POST ['country']=='') && ($_POST ['city']=='') && ($_POST ['Jobdescription']=='') && ($_POST ['requirments']=='') && ($_POST ['pay']=='') && ($_FILES ['photo']=='')) {
        $_SESSION ['data'] = 'Please fill all fields';
    } else {
        $email = $_POST ['email'];
        $mobile = $_POST ['mobile'];
        $name = $_POST ['name'];
        $category = $_POST ['category'];
        $job_title = $_POST ['jobtitle'];
        $country = $_POST ['country'];
        $city = $_POST ['city'];
        $Job_description = $_POST ['Jobdescription'];
        $requirments = $_POST ['requirements'];
        $pay = $_POST ['pay'];
        $file = $_FILES ['photo'];
        $filename= $file ['name'];
        $filepath= $file ['tmp_name'];
        $fileerror= $file ['error'];
        if($fileerror==0){
            $destfile = 'images/'.$filename;
            move_uploaded_file($filepath,$destfile);

            $query="INSERT INTO jobs(EMAIL, MOBILE, CONTACT_NAME, CATEGORY, JOB_TITLE, COUNTRY, CITY, DESCRIPTION, REQUIREMENTS, PAY, PHOTO)
            VALUES('$email', '$mobile', '$name', '$category', '$job_title', '$country', '$city', '$Job_description', '$requirments', '$pay', '$destfile')";
            $result = $conn->query($query);
            if($query){
                $_SESSION ['data'] = 'Uploaded successfully';
            }else{
                $_SESSION ['data'] = 'Failed to Upload';
            }
        }else{
            $_SESSION ['data'] = 'File error';
        }
    }
}else {
    $_SESSION ['data'] = 'Upload work';
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
              <!--<li><a href="#about">About Us</a></li>
              <li><a href="#services">Services</a></li>
              <li><a href="#portfolio">Portfolio</a></li>
              <li><a href="#team">Team</a></li>-->
              <li><a href="post.php">Post</a></li>
              <li class="drop-down"><a href="">Start</a>
                <ul>
                  <li>
                    <?php
                        $query = "SELECT * FROM users WHERE EMAIL='$useremail'";
                        $result = $conn->query($query);
                        if($result->num_rows >0) {
                            while($row = $result->fetch_assoc()) {
                    ?>

                    <img src="<?php echo $row ['PHOTO']; ?>" height=60px width=60px style="margin-left:30px;"/>
                    
                    <?php } }else { ?>
                        <img src="images/profile.png" height=60px width=60px style="margin-left:30px;"/>
                    <?php } ?>
                  </li>
                  <li><a href="logout.php">Sign out</a></li>
                  <li><a href="#">Account</a></li>
                  <li><a href="#">Help</a></li>
                </ul>
              </li>
              <li><a href="freelancer.php">Home</a></li>
              

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
          <h2>Your posts</h2>
          <ol>
            <li><a href="company.php">Home</a></li>
            <li><a href="applicants.php">Applicants</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page mt-4">
      <div class="container">
<!-- ======= Job post form ======= -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-row mx-2">
                <div class="form-group">
                    <label for="email" >Email</label>
                    <input type="email" class="form-control" placeholder="name123@mail.com" name="email">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="number" class="form-control" placeholder="1234567890" name="mobile">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" placeholder="Your name" name="name">
                </div>
        
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category">
                    <option value="Web development">Web development</option>
                    <option value="Data entry">Data entry</option>
                    <option value="Photoshop">Photoshop</option>
                    <option value="App development">App development</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jobtitle">Company name</label>
                    <input type="text" class="form-control" placeholder="Manager" name="jobtitle">
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" placeholder="India" name="country">
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" placeholder="Bangalore" name="city">
                </div>
                <div class="form-group">
                    <label for="pay">Pay</label>
                    <input type="number" class="form-control" placeholder="30000" name="pay">
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" class="btn btn-primary" name="photo">
                </div>
                <div class="form-group">
                    <label for="Jobdescription">Description (upto 5 rows)</label>
                    <textarea class="form-control" rows="5" name="Jobdescription"></textarea>
                </div>
                <div class="form-group">
                    <label for="requirements">Requirements (upto 3 rows)</label>
                    <textarea class="form-control" rows="3" name="requirements"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="upload">Upload</button>
        </form>
        <strong style="color:red;"><?php echo $_SESSION ['data'] ;?></strong>
<!-- ======= Job post form end======= -->
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