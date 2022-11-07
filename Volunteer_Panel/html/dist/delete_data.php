<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../../../login.php');
  }
 ?>


  <!-- Delete Volunteer Profile -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_GET['profile_id']))
    {
      $profile_id = $_GET['profile_id'];

      $sql = "DELETE FROM tb_volunteer_profile WHERE profile_id = $profile_id";
      $delete_row = $db->delete($sql);
      if($delete_row)
      {
        ?>
        <script type="text/javascript">
          window.alert("Profile details deleted successfully.");
          window.location='manage_profile.php';
        </script>
        <?php
      }
      else
      {
        $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
        echo $msg;
        return false;
      }
    }
    ?>



    <!-- Delete Blood Doner Details -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_GET['doner_id']))
    {
      $doner_id = $_GET['doner_id'];

      $sql = "DELETE FROM tb_blood_doner WHERE doner_id = $doner_id";
      $delete_row = $db->delete($sql);
      if($delete_row)
      {
        ?>
        <script type="text/javascript">
          window.alert("Blood doner details deleted successfully.");
          window.location='blood_doner_list.php';
        </script>
        <?php
      }
      else
      {
        $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
        echo $msg;
        return false;
      }
    }
    ?>



    <!-- Delete Charity Foundation Details -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_GET['foundation_id']))
    {
      $foundation_id = $_GET['foundation_id'];

      $sql = "DELETE FROM tb_charity_foundation WHERE foundation_id = $foundation_id";
      $delete_row = $db->delete($sql);
      if($delete_row)
      {
        ?>
        <script type="text/javascript">
          window.alert("Charity Foundation details deleted successfully.");
          window.location='manage_charity.php';
        </script>
        <?php
      }
      else
      {
        $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
        echo $msg;
        return false;
      }
    }
    ?>



