<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>





  <!-- Volunteer List Table Data Load -->
 <?php
   $user_name = $_SESSION['user_name'];
   $db        = new Database();
   $sql       = "SELECT * FROM tb_volunteer_profile WHERE profile_verify_status = 1";
   $read_volunteer = $db->select($sql);
  ?>












<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>VMS - Volunteer</title>
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
          <li><a href="volunteer.php" class="active">Volunteer</a></li>
          <li><a href="blood_doner.php">Blood Doner</a></li>
          <li><a href="charity_foundation.php">Charity</a></li>
          <li><a href="contact.php">Contact</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex">
        <a onclick="return confirm('Sure to logout?')" href="logout_user.php" class="instagram"><i class="fa fa-sign-out"></i> SIGN OUT</a>
      </div>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Volunteer</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Volunteer</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Volunteers</h2>
        </div>

        <div class="row">

          <?php if($read_volunteer){ $i = 0; ?>
          <?php while($result = $read_volunteer->fetch_assoc()){ $i = $i + 1; ?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up">
              <div class="member-img">
                <img src="<?php echo '../Volunteer_Panel/html/dist/'.$result['profile_img'] ?>" class="img-fluid" alt="">
                <div class="social">
                  <a href="volunteer_details.php?profile_id=<?php echo $result['profile_id']; ?>" style="font-size: 14px;"><i class="bi bi-eye"></i> View Profile</a>
                </div>
              </div>
              <div class="member-info">
                <h4><?php echo $result['name']; ?></h4>
                <span><i class="fa fa-phone"></i> <?php echo $result['contact_number']; ?></span>
              </div>
            </div>
          </div>
          <?php } ?>
          <?php }else{ ?>
          <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m  -auto" id="flash-msg">No Data Found!</div><br />';
            echo $msg; ?>
          <?php } ?>

        </div>

      </div>
    </section><!-- End Our Team Section -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="volunteer.php">Volunteer</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="blood_doner.php">Blood Doner</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="charity_foundation.php">Charity</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.php">Contact</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Account Setting</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="dashboard.php">My Account</a></li>
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