<?php
  include 'db-connection.php';
  if(count($_POST)>0){
    if($_POST['type']=='create'){
      $mtype_name=$_POST['mtype_name'];
      $sql = "INSERT INTO `material_type`( `mtype_name`) VALUES ('$mtype_name')";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/material-type.php");
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
      $mtype_name=$_POST['mtype_name'];
      $sql = "UPDATE `material_type` SET `mtype_name`='$mtype_name' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/material-type.php");
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
      $sql = "DELETE FROM material_type WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/material-type.php");
      }
      else {
        echo '<script language="javascript">alert("ไม่สามารถลบข้อมูลได้")</script>';
        echo '<script language="javascript">window.location.pathname = "/photak-system/pages/position.php"</script>';
      }
      mysqli_close($conn);
    }
  }
?>
