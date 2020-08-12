<?php
include("./actions/db-connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "SELECT id, em_group FROM employee WHERE em_user = '$username' and em_pass = '$password'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $permission = $row['em_group'];

  $count = mysqli_num_rows($result);

  // If result matched $myusername and $mypassword, table row must be 1 row

  if ($count == 1) {

    $_SESSION['login_user'] = $username;
    $_SESSION['permission'] = $permission;

    header("location: /photak-system/index.php");
  } else {
    $error = "ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login - Equipment Maintenance Notification System</title>
  <?php include './components/head.php'; ?>
  <link rel="stylesheet" href="/photak-system/assets/css/login.css">
</head>

<body class="text-center">
  <form class="form-login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h1 class="h3 mb-3 font-weight-normal">ลงชื่อเข้าสู่ระบบ</h1>
    <div class="form-group">
      <label for="username" class="sr-only">ชื่อผู้ใช้</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="ชื่อผู้ใช้" required autofocus>
    </div>
    <div class="form-group">
      <label for="password" class="sr-only">รหัสผ่าน</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="รหัสผ่าน" required>
    </div>
    <div class="form-group">
      <span class="help-block text-danger"><?php echo $error; ?></span>
    </div>
    <div class="form-group">
      <button class="btn btn-lg btn-primary btn-block" type="submit">เข้าสู่ระบบ</button>
    </div>
  </form>
  <?php include './components/footer-script.php'; ?>
</body>

</html>
