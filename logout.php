<?php
   session_start();

   if(session_destroy()) {
      header("Location: /photak-system/login.php");
   }
?>
