<?php
   include 'db-connection.php';
   session_start();

   $user_check = $_SESSION['login_user'];
   $permission = $_SESSION['permission'];

   $sql = "SELECT `em_user`, `em_group` FROM `employee` WHERE `em_user`='$user_check'";
   $ses_sql = mysqli_query($conn,$sql);

   $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

   $login_session = $row['em_user'];
   $permission = $row['em_group'];

   if(!isset($_SESSION['login_user'])){
      header("location: /photak-system/login.php");
      die();
   }
?>
