<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login - Equipment Maintenance Notification System</title>
  <?php include './components/head.php'; ?>
  <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body class="text-center">
  <form class="form-login">
    <h1 class="h3 mb-3 font-weight-normal">ลงชื่อเข้าสู่ระบบ</h1>
    <label for="inputUsername" class="sr-only">ชื่อผู้ใช้</label>
    <input type="text" id="inputUsername" class="form-control" placeholder="ชื่อผู้ใช้" required autofocus>
    <label for="inputPassword" class="sr-only">รหัสผ่าน</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="รหัสผ่าน" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">เข้าสู่ระบบ</button>
  </form>
  <?php include './components/footer-script.php'; ?>
</body>
</html>
