<?php
  session_start();
  include "include/Config.php";
  include "include/Database.php";
 ?>

 <!--User login section (USE BINARY KEYWORD FOR CASE SENSETIVE LOGIN INFORMATION)-->
 <?php
   $msg = "";
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
  if(isset($_POST['submit']))
  {
      $user_name = $_POST['user_name'];
      $password  = $_POST['password'];

      $sql = "SELECT * FROM tb_user WHERE BINARY user_name = '$user_name' AND BINARY password = '$password' LIMIT 1";

      $result = $db->link->query($sql) or die($this->link->error.__LINE__);

      if($result->num_rows != 0)
      {
        while($getData = $result->fetch_assoc())
        {
            $user_type = $getData['user_type'];
        }

        if($user_type == "Admin")
        {
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_type'] = $user_type;
            header('location: Admin_Panel/html/dist/index.php');
        }
        else if($user_type == "Volunteer" || $user_type == "Blood Doner" || $user_type == "Charity Owner")
        {
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_type'] = $user_type;
            header('location: Volunteer_Panel/html/dist/index.php');
        }
        else if($user_type == "General User")
        {
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_type'] = $user_type;
            header('location: User_Panel/index.php');
        }

      }
      else
      {
        $msg = '<div class="alert alert-danger alert-dismissable w-100 m-auto" id="flash-msg"><strong><i class="fa fa-exclamation-triangle fa-fw"></i> </strong>Incorrect Username or Password. Try again please !</div><br />';
      }
  }
  ?>









<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>VMS - Sign In</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/icon/volunteer.png" rel="icon">
  <link href="assets/icon/volunteer.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Fontawsome(v-4.7.0) -->
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php" style="font-size: 16px; letter-spacing: 4px;" class="m-auto"><img  src="assets/icon/volunteer.png" class="d-inline" width="40" height="40"><span>Volunteer</span><span style="color: #FFBB2C;">Hub</span><small class="d-block" style="font-size: 8px; letter-spacing: 2px; margin-left: 52px;">Volunteer Management</small></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li class="dropdown"><a href="#about-us" class="scroll-to"><span>About</span></a>
          </li>
          <li><a href="#services" class="scroll-to">Services</a></li>
          <li><a href="login.php">Volunteer</a></li>
          <li><a href="login.php">Blood Doner</a></li>
          <li><a href="login.php">Charity</a></li>
          <li><a href="contact.php">Contact</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex">
        <a href="login.php" class="instagram"><i class="fa fa-sign-in"></i> SIGN IN</a>
      </div>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Sign In</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Sign In</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->

    <section id="contact" class="contact">
      <div class="container">

        <div class="row mt-2 justify-content-center" data-aos="fade-up">
          <div class="col-lg-6 col-md-8 col-12">
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off" style="border-top: 1px solid #1BBD36;">
              <div class="text-center mb-4">
                <a href="index.php"><img src="assets/icon/volunteer.png" width="60" height="60"></a>
                <h4>SIGN IN</h4>
              </div>

              <div class="form-group mt-3">
                <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Username" required>
              </div>
              <div class="form-group mt-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
              </div>
              <div class="text-center mt-3">
                <input type="submit" name="submit" class="btn px-4" style="background-color: #1BBD36; color: white;" value="SIGN IN">
              </div>

              <br>

              <small class="text-muted">Don't have an account? <a href="sign_up.php">Create New Account</a></small>

            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">

            <h1 class="logo me-auto"><a href="index.html" style="font-size: 16px; letter-spacing: 4px;" class="m-auto"><img  src="assets/icon/volunteer.png" class="d-inline" width="40" height="40"><span>VOLUNTEER</span><span style="color: #FFBB2C;">HUB</span><small class="d-block" style="font-size: 8px; letter-spacing: 2px; margin-left: 60px;">Volunteer Management</small></a></h1>

            <p>
              Access Road <br>
              Agrabad, Chattogram<br>
              Bangladesh <br><br>
              <strong>Phone:</strong> +880 1679-811194<br>
              <strong>Email:</strong> volunteerhub.ctg@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about-us">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="login.php">Volunteer</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="login.php">Blood Doner</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="login.php">Charity</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.php">Contact</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Account Setting</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="login.php">My Account</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Settings</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          <?php date("Y"); ?> &copy; Copyright <strong><span>VOLUNTEERHUB</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Developed by <a href="https://bootstrapmade.com/">Nandi</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>