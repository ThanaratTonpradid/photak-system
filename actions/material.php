<?php
  include 'db-connection.php';
  if(count($_POST)>0){
    if($_POST['type']=='create'){
      $mat_name=$_POST['mat_name'];
      $mat_band=$_POST['mat_band'];
      $mat_price=$_POST['mat_price'];
      $mtype_id=(int)$_POST['mtype_id'];
      $sql = "INSERT INTO `material`( `mat_name`,`mat_price`,`mat_band`,`mtype_id`) VALUES ('$mat_name','$mat_price','$mat_band','$mtype_id')";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/material.php");
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
      $mat_name=$_POST['mat_name'];
      $mat_band=$_POST['mat_band'];
      $mat_price=$_POST['mat_price'];
      $mtype_id=(int)$_POST['mtype_id'];
      $sql = "UPDATE `material` SET `mat_name`='$mat_name',`mat_price`='$mat_price',`mat_band`='$mat_band',`mtype_id`='$mtype_id' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/material.php");
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
      $sql = "DELETE FROM material WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/material.php");
      }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }
?>
