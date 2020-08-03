<?php
  include 'db-connection.php';
  if(count($_POST)>0){
    if($_POST['type']=='create'){
      $p_name=$_POST['p_name'];
      $p_number=$_POST['p_number'];
      $p_serie=$_POST['p_serie'];
      $p_band=$_POST['p_band'];
      $p_status=$_POST['p_status'];
      $p_image=$_POST['p_image'];
      $p_detail=$_POST['p_detail'];
      $p_datein=$_POST['p_datein'];
      $p_dateout=$_POST['p_dateout'];
      $ptype_id=(int)$_POST['ptype_id'];
      $room_id=(int)$_POST['room_id'];
      $em_id=(int)$_POST['em_id'];
      $sql = "INSERT INTO `product`( `p_name`,`p_number`,`p_serie`,`p_band`,`p_status`,`p_image`,`p_detail`,`p_datein`,`p_dateout`,`ptype_id`,`room_id`,`em_id`) VALUES ('$p_name','$p_number','$p_serie','$p_band','$p_status','$p_image','$p_detail','$p_datein','$p_dateout','$ptype_id','$room_id','$em_id')";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/product.php");
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
      $p_name=$_POST['p_name'];
      $p_number=$_POST['p_number'];
      $p_serie=$_POST['p_serie'];
      $p_band=$_POST['p_band'];
      $p_status=$_POST['p_status'];
      $p_image=$_POST['p_image'];
      $p_detail=$_POST['p_detail'];
      $p_datein=$_POST['p_datein'];
      $p_dateout=$_POST['p_dateout'];
      $ptype_id=(int)$_POST['ptype_id'];
      $room_id=(int)$_POST['room_id'];
      $em_id=(int)$_POST['em_id'];
      $p_name=$_POST['p_name'];
      $sql = "UPDATE `product` SET `p_name`='$p_name',`p_number`='$p_number',`p_serie`='$p_serie',`p_band`='$p_band',`p_status`='$p_status',`p_image`='$p_image',`p_detail`='$p_detail',`p_datein`='$p_datein',`p_dateout`='$p_dateout',`ptype_id`='$ptype_id',`room_id`='$room_id',`em_id`='$em_id', WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/product.php");
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
      $sql = "DELETE FROM product WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/product.php");
      }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }
?>
