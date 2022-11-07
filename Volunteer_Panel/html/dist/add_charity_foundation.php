<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../../../login.php');
  }
 ?>




 <!-- Select User Type -->
 <?php
   $user_name = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

    $sql     = "SELECT user_type FROM tb_user WHERE user_name = '$user_name'";

    $result  = $db->select($sql);

    while($getData = $result->fetch_assoc())
    {
        $user_type     = $getData['user_type'];
    }
  ?>





 <!-- Add Charity Foundation Section -->
 <?php
   $user_name = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['submit']))
   {    
         $foundation_code     = rand(100000, 999999);
         $foundation_name     = $_POST['foundation_name'];
         $contact_number      = $_POST['contact_number'];
         $email_address       = $_POST['email_address'];
         $external_link       = $_POST['external_link'];
         $about_foundation    = $_POST['about_foundation'];
         $foundation_address  = $_POST['foundation_address'];
         $foundation_added_on = $_POST['foundation_added_on'];
         $way_of_donation     = $_POST['way_of_donation'];
         $foundation_added_by = $user_name;
       
         $tmp              = md5(time());
         $foundation_img      = $_FILES["foundation_img"]["name"];
         $dst              = "./foundation_img_folder/".$tmp.$foundation_img;
         $dst_db           = "foundation_img_folder/".$tmp.$foundation_img;
         move_uploaded_file($_FILES["foundation_img"]["tmp_name"],$dst);

         $sql = "INSERT INTO tb_charity_foundation(foundation_code,foundation_name,contact_number,email_address,external_link,about_foundation,foundation_address,foundation_added_on,foundation_img,way_of_donation,foundation_added_by,entry_time)values('$foundation_code','$foundation_name','$contact_number','$email_address','$external_link','$about_foundation','$foundation_address','$foundation_added_on','$dst_db','$way_of_donation','$foundation_added_by','$current_datetime')";
         
         $insert_row = $db->insert($sql);

         if($insert_row)
         {
           ?>

           <script type="text/javascript">
             window.alert("Charity Foundation details added successfully.");
             window.location='manage_charity.php';
           </script>

          <?php
         }
         else 
         {
           $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong! Data not added.</div><br />';
           echo $msg;
           return false;
         }
   }

  ?>










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>VMS - Volunteer Panel | Add Charity</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/icons/volunteer.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/volunteer.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icons/volunteer.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/icons/volunteer.png" color="#666666">
    <link rel="shortcut icon" href="assets/icons/volunteer.png">

    <!-- Fontawsome(v-4.7.0) -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Summernote Plugin File (Only js without bootstrap)-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand bg-light">
                <a class="link" href="index.php">
                    <img class="d-inline mb-1" src="assets/icons/volunteer.png" width="30" height="30">
                          <h4 class="mt-0 mb-0 py-0 d-inline" style="font-size: 15px; letter-spacing: 2px;"><strong><span style="color: #1BBD36;">VOLUNTEER</span><span style="color: #FFBB2C;">HUB</span></strong></h4>
                    <span class="brand-mini">VH</span>
                </a>
            </div>
            <div class="flexbox flex-1" style="background-color: #3498DB;">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler" style="color: white;"><i class="ti-menu"></i></a>
                    </li>
                    <li>
                        <form class="navbar-search" action="javascript:;">
                            <div class="rel">
                                <span class="search-icon"><i class="ti-search"></i></span>
                                <input class="form-control" placeholder="Search here...">
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-notification">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o rel" style="color: white;"><span class="notify-signal"></span></i></a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <li class="dropdown-menu-header">
                                <div>
                                    <span><strong>5 New</strong> Notifications</span>
                                    <a class="pull-right" href="javascript:;">view all</a>
                                </div>
                            </li>
                            <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                                <div>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-13">4 New Booking</div><small class="text-muted">22 mins</small></div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user" style="color: white;">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown" style="color: white;">
                            <img src="./assets/img/admin-avatar.png" />
                            <span></span><?php echo $_SESSION['user_name']; ?><i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="profile.html"><i class="fa fa-user"></i>Profile</a>
                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item" onclick="return confirm('Sure to logout?')" href="logout_volunteer.php"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="./assets/img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"><?php echo $_SESSION['user_name']; ?></div><small><?php echo $user_type ?></small></div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a href="index.php"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li class="heading">MAIN MENU</li>
                    <li>
                        <a href="add_volunteer_profile.php"><i class="sidebar-item-icon fa fa-plus"></i>
                            <span class="nav-label">Add Volunteer Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="manage_profile.php"><i class="sidebar-item-icon fa fa-list-ul"></i>
                            <span class="nav-label">Manage Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="blood_doner_reg.php"><i class="sidebar-item-icon fa fa-tint"></i>
                            <span class="nav-label">Blood Doner Reg.</span>
                        </a>
                    </li>
                    <li>
                        <a href="blood_doner_list.php"><i class="sidebar-item-icon fa fa-list-ul"></i>
                            <span class="nav-label">Blood Doner List</span>
                        </a>
                    </li>
                    <li>
                        <a class="active" href="add_charity_foundation.php"><i class="sidebar-item-icon fa fa-hand-rock-o"></i>
                            <span class="nav-label">Add Charity</span>
                        </a>
                    </li>
                    <li>
                        <a href="manage_charity.php"><i class="sidebar-item-icon fa fa-list-ul"></i>
                            <span class="nav-label">Manage Charity</span>
                        </a>
                    </li>
                    <li>
                        <a href="volunteering_feedback.php"><i class="sidebar-item-icon fa fa-star-half-o"></i>
                            <span class="nav-label">Volunteering Feedback</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"><i class="sidebar-item-icon fa fa-info-circle"></i>
                            <span class="nav-label">About Us</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"><i class="sidebar-item-icon fa fa-cog"></i>
                            <span class="nav-label">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="return confirm('Sure to logout?')" href="logout_volunteer.php"><i class="sidebar-item-icon fa fa-sign-out"></i>
                            <span class="nav-label">Sign Out</span>
                        </a>
                    </li>  
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->


        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Add Charity</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home fa-fw"></i> Dashboard</a></li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Charity Details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Foundation Name</label>
                                            <input class="form-control" type="text" name="foundation_name" placeholder="Charity foundation name" required>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Contact Number</label>
                                            <input class="form-control" type="number" name="contact_number" placeholder="Contact Number" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>E-mail Address</label>
                                            <input class="form-control" type="email" name="email_address" placeholder="Email address" required>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>External Link</label>
                                            <input class="form-control" type="text" name="external_link" placeholder="External link if any" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>About Founation</label>
                                            <textarea class="form-control" rows="4" name="about_foundation" placeholder="Type something about foundation" required></textarea>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Foundation Address</label>
                                            <textarea class="form-control" rows="4" name="foundation_address" placeholder="Type foundation address" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Foundation Added On</label>
                                            <input class="form-control" type="date" name="foundation_added_on" required>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Foundation Image</label>
                                            <input class="form-control" type="file" name="foundation_img" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label>Way of Donation <span class="text-danger">**(Describe briefly)</span></label>
                                            <textarea class="form-control" name="way_of_donation" id="way_of_donation" required></textarea>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-primary" value="Add Foundation">
                                </form>

                                <!-- Script for Summernote -->
                                <script>
                                  $('#way_of_donation').summernote({
                                    placeholder: 'Type way of donation here...',
                                    tabsize: 0,
                                    height: 250,
                                    toolbar: [
                                      ['style', ['style']],
                                      ['font', ['bold', 'underline', 'clear']],
                                      ['color', ['color']],
                                      ['para', ['ul', 'ol', 'paragraph']],
                                      ['table', ['table']],
                                      ['insert', ['link', 'picture', 'video']],
                                      ['view', ['fullscreen', 'codeview', 'help']]
                                    ]
                                  });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->

            <footer class="page-footer">
                <div class="font-13"><?php echo date("Y") ?> © <b>VOLUNTEERHUB</b> - All rights reserved.</div>
                <a class="px-4" href="index.php"><i class="fa fa-home fa-fw"></i>Home</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->
    <div class="theme-config">
        <div class="theme-config-toggle"><i class="fa fa-cog theme-config-show"></i><i class="ti-close theme-config-close"></i></div>
        <div class="theme-config-box">
            <div class="text-center font-18 m-b-20">SETTINGS</div>
            <div class="font-strong">LAYOUT OPTIONS</div>
            <div class="check-list m-b-20 m-t-10">
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedNavbar" type="checkbox" checked>
                    <span class="input-span"></span>Fixed navbar</label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedlayout" type="checkbox">
                    <span class="input-span"></span>Fixed layout</label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input class="js-sidebar-toggler" type="checkbox">
                    <span class="input-span"></span>Collapse sidebar</label>
            </div>
            <div class="font-strong">LAYOUT STYLE</div>
            <div class="m-t-10">
                <label class="ui-radio ui-radio-gray m-r-10">
                    <input type="radio" name="layout-style" value="" checked="">
                    <span class="input-span"></span>Fluid</label>
                <label class="ui-radio ui-radio-gray">
                    <input type="radio" name="layout-style" value="1">
                    <span class="input-span"></span>Boxed</label>
            </div>
            <div class="m-t-10 m-b-10 font-strong">THEME COLORS</div>
            <div class="d-flex m-b-20">
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Default">
                    <label>
                        <input type="radio" name="setting-theme" value="default" checked="">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-white"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue">
                    <label>
                        <input type="radio" name="setting-theme" value="blue">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-blue"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green">
                    <label>
                        <input type="radio" name="setting-theme" value="green">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-green"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple">
                    <label>
                        <input type="radio" name="setting-theme" value="purple">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-purple"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange">
                    <label>
                        <input type="radio" name="setting-theme" value="orange">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-orange"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink">
                    <label>
                        <input type="radio" name="setting-theme" value="pink">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-pink"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
            </div>
            <div class="d-flex">
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="White">
                    <label>
                        <input type="radio" name="setting-theme" value="white">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue light">
                    <label>
                        <input type="radio" name="setting-theme" value="blue-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-blue"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green light">
                    <label>
                        <input type="radio" name="setting-theme" value="green-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-green"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple light">
                    <label>
                        <input type="radio" name="setting-theme" value="purple-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-purple"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange light">
                    <label>
                        <input type="radio" name="setting-theme" value="orange-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-orange"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink light">
                    <label>
                        <input type="radio" name="setting-theme" value="pink-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-pink"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
</body>

</html>