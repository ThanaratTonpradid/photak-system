<?php include '../actions/session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>ไม่มีสิทธิ์ใช้งานหน้านี้ - ระบบแจ้งซ่อมครุภัณฑ์คอมพิวเตอร์</title>
  <?php include '../components/head.php'; ?>
  <link rel="stylesheet" href="/photak-system/assets/css/dashboard.css">
</head>
<body>
  <?php include '../components/header.php'; ?>
  <div class="container-fluid">
    <div class="row">
      <?php include '../components/sidebar.php'; ?>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-center align-items-center flex-column full-height">
          <h1>ไม่มีสิทธิ์ใช้งานหน้านี้</h1>
          <h2>ระบบแจ้งซ่อมครุภัณฑ์คอมพิวเตอร์ออนไลน์</h2>
          <h3>โรงพยาบาลโพธิ์ตาก</h3>
          <a href="/photak-system/index.php">กลับสู่หน้าหลัก</a>
        </div>
      </main>
    </div>
  </div>
  <?php include '../components/footer-script.php'; ?>
</body>
<style>
  .full-height {
    height: calc(100vh - 48px);
  }
</style>
</html>
