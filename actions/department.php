<?php
  include 'db-connection.php';
  if(count($_POST)>0){
    if($_POST['type']=='create'){
      $d_name=$_POST['d_name'];
      $sql = "INSERT INTO `department`( `d_name`) VALUES ('$d_name')";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/department.php");
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
      $d_name=$_POST['d_name'];
      $sql = "UPDATE `department` SET `d_name`='$d_name' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/department.php");
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
      $sql = "DELETE FROM department WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/department.php");
      }
      else {
        echo '<script language="javascript">alert("ไม่สามารถลบข้อมูลได้")</script>';
        echo '<script language="javascript">window.location.pathname = "/photak-system/pages/position.php"</script>';
      }
      mysqli_close($conn);
    }
  }
?>
