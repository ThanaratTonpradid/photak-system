<!DOCTYPE html>
<html lang="en">

<head>
  <title>จัดการผู้รับผิดชอบใบแจ้งซ่อม - ระบบแจ้งซ่อมครุภัณฑ์คอมพิวเตอร์</title>
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
        <h3>รายการใบแจ้งซ่อม</h3>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>รหัส</th>
              <th>หมายเลขครุภัณฑ์</th>
              <th>รายละเอียดแจ้งซ่อม</th>
              <th>วันที่แจ้ง</th>
              <th>ผู้แจ้ง</th>
              <th>สถานะการซ่อม</th>
              <th>ผลการอนุมัติ</th>
              <th>ผู้อนุมัติ</th>
              <th>ผู้รับผิดชอบ</th>
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
              <td>ipsum</td>
              <td>ipsum</td>
              <td>ipsum</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></span>แก้ไข</button>
                <button type="button" class="btn btn-sm btn-primary" onclick="handleAssignRow()">กำหนดผู้รับผิดชอบ</button>
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
              <td>consectetur</td>
              <td>consectetur</td>
              <td>consectetur</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></span>แก้ไข</button>
                <button type="button" class="btn btn-sm btn-primary" onclick="handleAssignRow()">กำหนดผู้รับผิดชอบ</button>
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
              <td>nec</td>
              <td>nec</td>
              <td>nec</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></span>แก้ไข</button>
                <button type="button" class="btn btn-sm btn-primary" onclick="handleAssignRow()">กำหนดผู้รับผิดชอบ</button>
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
              <td>Sed</td>
              <td>Sed</td>
              <td>Sed</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></span>แก้ไข</button>
                <button type="button" class="btn btn-sm btn-primary" onclick="handleAssignRow()">กำหนดผู้รับผิดชอบ</button>
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
              <td>diam</td>
              <td>diam</td>
              <td>diam</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></span>แก้ไข</button>
                <button type="button" class="btn btn-sm btn-primary" onclick="handleAssignRow()">กำหนดผู้รับผิดชอบ</button>
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
              <td>quis</td>
              <td>quis</td>
              <td>quis</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></span>แก้ไข</button>
                <button type="button" class="btn btn-sm btn-primary" onclick="handleAssignRow()">กำหนดผู้รับผิดชอบ</button>
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
              <td>elementum</td>
              <td>elementum</td>
              <td>elementum</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></span>แก้ไข</button>
                <button type="button" class="btn btn-sm btn-primary" onclick="handleAssignRow()">กำหนดผู้รับผิดชอบ</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- Create Form -->
      <div class="create-assign-repair-form d-none">
        <h4>กำหนดผู้รับผิดชอบใบแจ้งซ่อม</h4>
        <form>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateNumber">หมายเลขครุภัณฑ์</label>
              <input type="text" class="form-control" id="validateNumber" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="dayAssign">วันที่แจ้ง</label>
              <input type="date" class="form-control" id="dayAssign" name="dayAssign" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="detailAssign">รายละเอียด</label>
              <textarea class="form-control" id="detailAssign" rows="3" readonly></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateStaff">ผู้แจ้ง</label>
              <input type="text" class="form-control" id="validateStaff" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <img id='file-preview' class="img-thumbnail w-50" width="200px" height="200px" />
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="approveStatus">ผลการอนุมัติ</label>
              <input type="text" class="form-control" id="approveStatus" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="approveStaff">ผู้อนุมัติ</label>
              <input type="text" class="form-control" id="approveStaff" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="assignStaff">กำหนดผู้รับผิดชอบ</label>
              <select class="form-control" id="assignStaff" required>
                <option selected disabled value="">เลือกผู้รับผิดชอบ...</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <button id="cancel-save-btn" class="btn btn-secondary" type="button">ยกเลิก</button>
          <button id="save-btn" class="btn btn-primary" type="submit">บันทึก</button>
        </form>
      </div>
      <!-- Update Form -->
      <div class="edit-assign-repair-form d-none">
        <h4>แก้ไขผู้รับผิดชอบใบแจ้งซ่อม</h4>
        <form>
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="validateNumber">หมายเลขครุภัณฑ์</label>
            <input type="text" class="form-control" id="validateNumber" readonly>
          </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="dayAssign">วันที่แจ้ง</label>
              <input type="date" class="form-control" id="dayAssign" name="dayAssign" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="detailAssign">รายละเอียด</label>
              <textarea class="form-control" id="detailAssign" rows="3" readonly></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateStaff">ผู้แจ้ง</label>
              <input type="text" class="form-control" id="validateStaff" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <img id='file-preview' class="img-thumbnail w-50" width="200px" height="200px" />
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="approveStatus">ผลการอนุมัติ</label>
              <input type="text" class="form-control" id="approveStatus" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="approveStaff">ผู้อนุมัติ</label>
              <input type="text" class="form-control" id="approveStaff" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="assignStaff">กำหนดผู้รับผิดชอบ</label>
              <select class="form-control" id="assignStaff" required>
                <option selected disabled value="">เลือกผู้รับผิดชอบ...</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <button id="cancel-edit-btn" class="btn btn-secondary" type="button">ยกเลิก</button>
          <button id="edit-btn" class="btn btn-primary" type="submit">แก้ไขข้อมูล</button>
        </form>
      </div>
    </main>
    </div>
  </div>
  <?php include '../components/footer-script.php'; ?>
  <script src="../assets/js/assign-repair-script.js"></script>
</body>

</html>
