<?php
  include 'db-connection.php';
  if(count($_POST)>0){
    if($_POST['type']=='create'){
      $mat_with_name=$_POST['mat_with_name'];
      $date_take=$_POST['date_take'];
      $em_take=$_POST['em_take'];
      $sql = "INSERT INTO `mat_with`( `mat_with_name`,`date_take`,`em_take`) VALUES ('$mat_with_name','$date_take','$em_take')";
      if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        header("location: /photak-system/pages/mat-with.php?add=".$last_id);
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
      $mat_with_name=$_POST['mat_with_name'];
      $date_take=$_POST['date_take'];
      $em_take=$_POST['em_take'];
      $sql = "UPDATE `mat_with` SET `mat_with_name`='$mat_with_name',`date_take`='$date_take',`em_take`='$em_take' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/mat-with.php");
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
      $sql = "DELETE FROM mat_with WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/mat-with.php");
      }
      else {
        echo '<script language="javascript">alert("ไม่สามารถลบข้อมูลได้")</script>';
        echo '<script language="javascript">window.location.pathname = "/photak-system/pages/mat-with.php"</script>';
      }
      mysqli_close($conn);
    }
  }
?>
