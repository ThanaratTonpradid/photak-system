<!DOCTYPE html>
<html lang="en">

<head>
  <title>รายงานประวัติครุภัณฑ์คอมพิวเตอร์ - ระบบแจ้งซ่อมครุภัณฑ์คอมพิวเตอร์</title>
  <?php include '../components/head.php'; ?>
  <link rel="stylesheet" href="/photak-system/assets/css/dashboard.css">
</head>

<body>
  <?php include '../components/header.php'; ?>
  <div class="container-fluid">
    <div class="row">
      <?php include '../components/sidebar.php'; ?>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-center flex-wrap flex-column align-items-center pt-3 pb-2 mb-3">
          <h3>รายงานประวัติครุภัณฑ์คอมพิวเตอร์</h3>
          <h4>โรงพยาบาลโพธิ์ตาก</h4>
          <form>
            <div class="form-group row">
              <label  class="col-5 col-form-label" for="validateNumber">หมายเลขครุภัณฑ์</label>
              <input type="text" class="form-control col-7" id="validateNumber">
            </div>
          </form>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>รหัส</th>
                <th>วันที่ซ่อม</th>
                <th>รายการเปลี่ยนวัสดุ</th>
                <th>รายละเอียดการซ่อม</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1,001</td>
                <td>Lorem</td>
                <td>ipsum</td>
                <td>ipsum</td>
              </tr>
              <tr>
                <td>1,002</td>
                <td>amet</td>
                <td>consectetur</td>
                <td>consectetur</td>
              </tr>
              <tr>
                <td>1,003</td>
                <td>Integer</td>
                <td>nec</td>
                <td>nec</td>
              </tr>
              <tr>
                <td>1,003</td>
                <td>libero</td>
                <td>Sed</td>
                <td>Sed</td>
              </tr>
              <tr>
                <td>1,004</td>
                <td>dapibus</td>
                <td>diam</td>
                <td>diam</td>
              </tr>
              <tr>
                <td>1,005</td>
                <td>Nulla</td>
                <td>quis</td>
                <td>quis</td>
              </tr>
              <tr>
                <td>1,006</td>
                <td>nibh</td>
                <td>elementum</td>
                <td>elementum</td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
  <?php include '../components/footer-script.php'; ?>
  <!-- <script src="/photak-system/assets/js/report-script.js"></script> -->
</body>

</html>
