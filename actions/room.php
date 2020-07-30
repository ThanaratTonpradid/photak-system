<?php
  include 'db-connection.php';
  if(count($_POST)>0){
    if($_POST['type']=='create'){
      $room_name=$_POST['room_name'];
      $room_phone=$_POST['room_phone'];
      $buil_id=(int)$_POST['buil_id'];
      $sql = "INSERT INTO `room`( `room_name`,`room_phone`,`buil_id`) VALUES ('$room_name','$room_phone','$buil_id')";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/room.php");
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
      $room_name=$_POST['room_name'];
      $room_phone=$_POST['room_phone'];
      $buil_id=(int)$_POST['buil_id'];
      $sql = "UPDATE `room` SET `room_name`='$room_name',`room_phone`='$room_phone',`buil_id`='$buil_id' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/room.php");
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
      $sql = "DELETE FROM room WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/room.php");
      }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }
?>
