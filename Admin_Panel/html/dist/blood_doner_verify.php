<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../../../login.php');
  }
 ?>


  <!--Blood Doner Activation Section-->
  <?php
   $db = new Database();

     if(isset($_GET['doner_id']))
     {
       $doner_id = $_GET['doner_id'];

       $sql = "SELECT doner_verify_status FROM tb_blood_doner WHERE doner_verify_status = 0 AND doner_id = $doner_id LIMIT 1";

       $result = $db->link->query($sql) or die($this->link->error.__LINE__);

       if($result->num_rows == 1)
       {
         $sql = "UPDATE tb_blood_doner SET doner_verify_status = 1 WHERE doner_id = $doner_id LIMIT 1";

         $update = $db->link->query($sql) or die($this->link->error.__LINE__);

         if($update)
         {
           ?>
           <script type="text/javascript">

             window.alert("Blood doner verified successfully.");
             window.location='blood_doner_list.php';

           </script>
           <?php
         }
         else
         {
           echo $db->link->error;
         }
       }
       else
       {
         $msg = '<br /><br /><br /><div class="alert alert-danger w-50 m-auto text-center">Something went wrong!</div><br />';
         echo $msg;
       }
     }
     else
     {
       die("Something went wrong!");
     }
   ?>
