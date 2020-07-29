<?php
  include  'db-connection.php';
  if(count($_POST)>0){
    if($_POST['type']=='create'){
      $em_fname=$_POST['em_fname'];
      $em_lname=$_POST['em_lname'];
      $em_user=$_POST['em_user'];
      $em_pass=$_POST['em_pass'];
      $em_status=$_POST['em_status'];
      $em_group=$_POST['em_group'];
      $posi_id=(int)$_POST['posi_id'];
      $d_id=(int)$_POST['d_id'];
      $sql = "INSERT INTO `employee`( `em_fname`,`em_lname`,`em_user`,`em_pass`,`em_status`,`em_group`,`posi_id`,`d_id`)
      VALUES ('$em_fname','$em_lname','$em_user','$em_pass','$em_status','$em_group','$posi_id','$d_id')";
      if (mysqli_query($conn, $sql)) {
        echo json_encode(array("statusCode"=>200));
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
      $em_fname=$_POST['em_fname'];
      $em_lname=$_POST['em_lname'];
      $em_user=$_POST['em_user'];
      $em_pass=$_POST['em_pass'];
      $em_status=$_POST['em_status'];
      $em_group=$_POST['em_group'];
      $posi_id=(int)$_POST['posi_id'];
      $d_id=(int)$_POST['d_id'];
      $sql = "UPDATE `employee` SET `em_fname`='$em_fname',`em_lname`='$em_lname',`em_user`='$em_user',`em_pass`='$em_pass',`em_status`='$em_status',`em_group`='$em_group',`posi_id`='$posi_id',`d_id`='$d_id' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        echo json_encode(array("statusCode"=>200));
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
      $sql = "DELETE FROM employee WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        echo json_encode(array("statusCode"=>200));
      }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }
?>
