<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login - Equipment Maintenance Notification System</title>
  <?php include './components/head.php'; ?>
</head>

<body class="login">
  <div class="wrapper wrapper-login">
    <div class="container container-login animated fadeIn">
      <h3 class="text-center">เข้าสู่ระบบ</h3>
      <div class="login-form">
        <div class="form-group form-floating-label">
          <input id="username" name="username" type="text" class="form-control input-border-bottom" required>
          <label for="username" class="placeholder">ชื่อผู้ใช้งาน</label>
        </div>
        <div class="form-group form-floating-label">
          <input id="password" name="password" type="password" class="form-control input-border-bottom" required>
          <label for="password" class="placeholder">รหัสผ่าน</label>
          <div class="show-password">
            <i class="icon-eye"></i>
          </div>
        </div>
        <div class="form-action mb-3">
          <a href="#" class="btn btn-primary btn-rounded btn-login">Login</a>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/js/core/jquery.3.2.1.min.js"></script>
  <script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/atlantis.min.js"></script>
</body>

</html>
