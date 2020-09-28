<?php
  include 'db-connection.php';
  if(count($_POST)>0){
    if($_POST['type']=='repair'){
      $id=$_POST['id'];

      $em_repair=(int)$_POST['em_repair'];
      $nr_status='repairing';
      $sql = "UPDATE `notify_repair` SET `em_repair`='$em_repair',`nr_status`='$nr_status' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/assign-repair.php");
      }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }

  if(count($_POST)>0){
    if($_POST['type']=='update'){
      $id=$_POST['id'];
      $em_repair=(int)$_POST['em_repair'];
      $nr_status='repairing';

      $sql = "UPDATE `notify_repair` SET `em_repair`='$em_repair',`nr_status`='$nr_status' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/assign-repair.php");
      }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }
?>
