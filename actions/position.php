<?php
  include 'db-connection.php';
  if(count($_POST)>0){
    if($_POST['type']=='create'){
      $posi_name=$_POST['posi_name'];
      $sql = "INSERT INTO `position`( `posi_name`) VALUES ('$posi_name')";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/position.php");
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
      $posi_name=$_POST['posi_name'];
      $sql = "UPDATE `position` SET `posi_name`='$posi_name' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/position.php");
      }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }

  if(count($_POST)>0){
    if($_POST['type']=='delete'){
      $id=$_POST['id'];
      $sql = "DELETE FROM position WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/position.php");
      }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }
?>
