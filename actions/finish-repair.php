<?php
  include 'db-connection.php';
  if(count($_POST)>0){
    if($_POST['type']=='complete'){
      $id=$_POST['id'];
      $nr_detail3=$_POST['nr_detail3'];
      $nr_successfull=$_POST['nr_successfull'];
      $nr_status='complete';
      $sql = "UPDATE `notify_repair` SET `nr_detail3`='$nr_detail3',`nr_successfull`='$nr_successfull',`nr_status`='$nr_status' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/finish-repair.php");
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
      $nr_detail3=$_POST['nr_detail3'];
      $nr_successfull=$_POST['nr_successfull'];
      $nr_status='complete';
      $sql = "UPDATE `notify_repair` SET `nr_detail3`='$nr_detail3',`nr_successfull`='$nr_successfull',`nr_status`='$nr_status' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/finish-repair.php");
      }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }
?>
