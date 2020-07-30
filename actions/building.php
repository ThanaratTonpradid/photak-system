<?php
  include 'db-connection.php';
  if(count($_POST)>0){
    if($_POST['type']=='create'){
      $buil_name=$_POST['buil_name'];
      $sql = "INSERT INTO `building`( `buil_name`) VALUES ('$buil_name')";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/building.php");
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
      $buil_name=$_POST['buil_name'];
      $sql = "UPDATE `building` SET `buil_name`='$buil_name' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/building.php");
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
      $sql = "DELETE FROM building WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/building.php");
      }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }
?>
