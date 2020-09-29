<?php
  include 'db-connection.php';
  if(count($_POST)>0){
    if($_POST['type']=='update'){
      $id=$_POST['id'];
      $em_approver=$_POST['em_approver'];
      $date_approve=$_POST['date_approve'];
      $approve_mw=$_POST['approve_mw'];
      $sql = "UPDATE `mat_with` SET `em_approver`='$em_approver',`date_approve`='$date_approve',`approve_mw`='$approve_mw' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/mat-with-approve.php");
      }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }
?>
