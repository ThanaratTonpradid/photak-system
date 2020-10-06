<?php
  include 'db-connection.php';
  if(count($_POST)>0){
    if($_POST['type']=='approve'){
      $id=$_POST['id'];
      $nr_approve=$_POST['nr_approve'];
      $em_approver=(int)$_POST['em_approver'];
      $em_repair=(int)$_POST['em_repair'];
      $nr_status='รอซ่อม';
      if ($nr_approve == 'ไม่อนุมัติ') {
        $nr_status='ยกเลิก';
      }
      $sql = "UPDATE `notify_repair` SET `nr_approve`='$nr_approve',`em_approver`='$em_approver',`nr_status`='$nr_status',`em_repair`='$em_repair' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/approve-repair.php");
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
      $nr_approve=$_POST['nr_approve'];
      $em_approver=(int)$_POST['em_approver'];
      $em_repair=(int)$_POST['em_repair'];
      $nr_status='รอซ่อม';
      if ($nr_approve == 'ไม่อนุมัติ') {
        $nr_status='ยกเลิก';
      }

      $sql = "UPDATE `notify_repair` SET `nr_approve`='$nr_approve',`em_approver`='$em_approver',`nr_status`='$nr_status',`em_repair`='$em_repair' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/approve-repair.php");
      }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }
?>
