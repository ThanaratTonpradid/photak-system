<?php
  include 'db-connection.php';
  if(count($_POST)>0){
    if($_POST['type']=='add-item'){
      $mat_with_id=$_POST['mat_with_id'];
      $mat_id=$_POST['mat_id'];
      $quantity=$_POST['quantity'];
      $sql = "INSERT INTO `mat_with_detail`( `mat_with_id`,`mat_id`,`quantity`) VALUES ('$mat_with_id','$mat_id','$quantity')";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/mat-with.php?add=".$mat_with_id);
      }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }
  if(count($_POST)>0){
    if($_POST['type']=='edit-item'){
      $id=$_POST['id'];
      $mat_with_id=$_POST['mat_with_id'];
      $mat_id=$_POST['mat_id'];
      $quantity=$_POST['quantity'];
      $sql = "INSERT INTO `mat_with_detail`( `mat_with_id`,`mat_id`,`quantity`) VALUES ('$mat_with_id','$mat_id','$quantity')";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/mat-with.php?edit=".$id."&edit-item=".$mat_with_id);
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
      $mat_wit_id=$_POST['mat_wit_id'];
      $sql = "DELETE FROM mat_with_detail WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        if ($_POST['table']=='edit') {
          header("location: /photak-system/pages/mat-with.php?edit=".$mat_wit_id);
        } else {
          header("location: /photak-system/pages/mat-with.php?add=".$mat_wit_id);
        }
      }
      else {
        echo '<script language="javascript">alert("ไม่สามารถลบข้อมูลได้")</script>';
        echo '<script language="javascript">window.location.pathname = "/photak-system/pages/mat-with.php"</script>';
      }
      mysqli_close($conn);
    }
  }
?>
