<?php
  include 'db-connection.php';
  if(count($_POST)>0){
    if($_POST['type']=='create'){
      $ptype_name=$_POST['ptype_name'];
      $sql = "INSERT INTO `product_type`( `ptype_name`) VALUES ('$ptype_name')";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/product-type.php");
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
      $ptype_name=$_POST['ptype_name'];
      $sql = "UPDATE `product_type` SET `ptype_name`='$ptype_name' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/product-type.php");
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
      $sql = "DELETE FROM product_type WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        header("location: /photak-system/pages/product-type.php");
      }
      else {
        echo '<script language="javascript">alert("ไม่สามารถลบข้อมูลได้")</script>';
        echo '<script language="javascript">window.location.pathname = "/photak-system/pages/position.php"</script>';
      }
      mysqli_close($conn);
    }
  }
?>
