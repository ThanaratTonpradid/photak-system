<?php
  include 'db-connection.php';
  if(count($_POST)>0){
    if($_POST['type']=='create'){
      $p_id=(int)$_POST['p_id'];
      $nr_datenotifi=$_POST['nr_datenotifi'];
      $nr_detail1=$_POST['nr_detail1'];
      $em_order=(int)$_POST['em_order'];
      $nr_images=$_POST['nr_images'];
      $nr_status='pending';
      $sql = "INSERT INTO `notify_repair`(`p_id`,`nr_datenotifi`,`nr_detail1`,`em_order`,`nr_images`, `nr_status`) VALUES ( '$p_id','$nr_datenotifi','$nr_detail1','$em_order','$nr_images','$nr_status')";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/notify-repair.php");
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
      $p_id=(int)$_POST['p_id'];
      $nr_datenotifi=$_POST['nr_datenotifi'];
      $nr_detail1=$_POST['nr_detail1'];
      $em_order=(int)$_POST['em_order'];

      $sql = "UPDATE `notify_repair` SET `p_id`='$p_id',`nr_datenotifi`='$nr_datenotifi',`nr_detail1`='$nr_detail1',`em_order`='$em_order' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/notify-repair.php");
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
      $sql = "DELETE FROM notify_repair WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/notify-repair.php");
      }
      else {
        echo '<script language="javascript">alert("ไม่สามารถลบข้อมูลได้")</script>';
        echo '<script language="javascript">window.location.pathname = "/photak-system/pages/position.php"</script>';
      }
      mysqli_close($conn);
    }
  }
?>
