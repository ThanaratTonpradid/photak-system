<!DOCTYPE html>
<html lang="en">

<head>
  <title>อนุมัติใบเบิกวัสดุ - ระบบแจ้งซ่อมครุภัณฑ์คอมพิวเตอร์</title>
  <?php include '../components/head.php'; ?>
  <link rel="stylesheet" href="../../assets/css/dashboard.css">
</head>

<body>
  <?php include '../components/header.php'; ?>
  <div class="container-fluid">
    <div class="row">
      <?php include '../components/sidebar.php'; ?>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h3>รายการใบเบิกวัสดุ</h3>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div id="search-form" class="btn-group mr-2">
            <input class="form-control" type="text" placeholder="ค้นหาใบเบิกวัสดุ" aria-label="ค้นหาใบเบิกวัสดุ">
            <button id="search-btn" type="button" class="btn btn-secondary"><span data-feather="search"></span></button>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>ผู้ขอเบิก</th>
              <th>วันที่เบิก</th>
              <th>รายการ</th>
              <th>ผู้อนุมัติ</th>
              <th>วันที่อนุมัติ</th>
              <th>สถานะ</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>ipsum</td>
              <td>ipsum</td>
              <td>ipsum</td>
              <td>ipsum</td>
              <td>
                <button type="button" class="btn btn-sm btn-success" onclick="handleApproveRow()"><span data-feather="check"></span></button>
              </td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>amet</td>
              <td>consectetur</td>
              <td>consectetur</td>
              <td>consectetur</td>
              <td>consectetur</td>
              <td>consectetur</td>
              <td>
                <button type="button" class="btn btn-sm btn-success" onclick="handleApproveRow()"><span data-feather="check"></span></button>
              </td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>Integer</td>
              <td>nec</td>
              <td>nec</td>
              <td>nec</td>
              <td>nec</td>
              <td>nec</td>
              <td>
                <button type="button" class="btn btn-sm btn-success" onclick="handleApproveRow()"><span data-feather="check"></span></button>
              </td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>libero</td>
              <td>Sed</td>
              <td>Sed</td>
              <td>Sed</td>
              <td>Sed</td>
              <td>Sed</td>
              <td>
                <button type="button" class="btn btn-sm btn-success" onclick="handleApproveRow()"><span data-feather="check"></span></button>
              </td>
            </tr>
            <tr>
              <td>1,004</td>
              <td>dapibus</td>
              <td>diam</td>
              <td>diam</td>
              <td>diam</td>
              <td>diam</td>
              <td>diam</td>
              <td>
                <button type="button" class="btn btn-sm btn-success" onclick="handleApproveRow()"><span data-feather="check"></span></button>
              </td>
            </tr>
            <tr>
              <td>1,005</td>
              <td>Nulla</td>
              <td>quis</td>
              <td>quis</td>
              <td>quis</td>
              <td>quis</td>
              <td>quis</td>
              <td>
                <button type="button" class="btn btn-sm btn-success" onclick="handleApproveRow()"><span data-feather="check"></span></button>
              </td>
            </tr>
            <tr>
              <td>1,006</td>
              <td>nibh</td>
              <td>elementum</td>
              <td>elementum</td>
              <td>elementum</td>
              <td>elementum</td>
              <td>elementum</td>
              <td>
                <button type="button" class="btn btn-sm btn-success" onclick="handleApproveRow()"><span data-feather="check"></span></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- Approve Form -->
      <div class="create-mat-with-approve-form d-none">
        <h4>อนุมัติใบเบิกวัสดุ</h4>
        <form>
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group row">
                <label for="dayStart" class="col-sm-2 col-form-label">วันที่เบิก</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="dayStart" name="dayStart" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="matWithStaff" class="col-sm-2 col-form-label">ผู้ขอเบิก</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="matWithStaff" readonly>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="matWithStatus" class="col-sm-2 col-form-label">สถานะใบเบิก</label>
                <div class="col-sm-10">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioOptions" id="radio1" value="approve" required>
                    <label class="form-check-label" for="radio1">อนุมัติ</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioOptions" id="radio2" value="notApprove" required>
                    <label class="form-check-label" for="radio2">ไม่อนุมัติ</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="dayEnd" class="col-sm-2 col-form-label">วันที่อนุมัติใบเบิก</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="dayEnd" name="dayEnd" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="matWithStaff" class="col-sm-2 col-form-label">ผู้อนุมัติ</label>
                <div class="col-sm-10">
                  <select class="form-control" id="matWithStaff" required>
                    <option selected disabled value="">เลือกผู้อนุมัติ...</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>ลำดับ</th>
                    <th>รายการ</th>
                    <th>จำนวน</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>วัสดุ1</td>
                    <td>1,234</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>วัสดุ2</td>
                    <td>1,234</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>วัสดุ3</td>
                    <td>1,234</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <button id="cancel-save-btn" class="btn btn-secondary" type="button">ยกเลิก</button>
          <button id="save-btn" class="btn btn-primary" type="submit">อนุมัติใบเบิกวัสดุ</button>
        </form>
      </div>
    </main>
    </div>
  </div>
  <?php include '../components/footer-script.php'; ?>
  <script src="../assets/js/mat-with-approve-script.js"></script>
</body>

</html>
