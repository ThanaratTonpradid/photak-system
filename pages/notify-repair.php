<!DOCTYPE html>
<html lang="en">

<head>
  <title>จัดการใบแจ้งซ่อม - ระบบแจ้งซ่อมครุภัณฑ์คอมพิวเตอร์</title>
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
        <div class="btn-toolbar mb-2 mb-md-0">
          <div id="search-form" class="btn-group mr-2">
            <input class="form-control" type="text" placeholder="ค้นหาใบแจ้งซ่อม" aria-label="ค้นหาใบแจ้งซ่อม">
            <button id="search-btn" type="button" class="btn btn-secondary"><span data-feather="search"></span></button>
          </div>
          <button id="add-form-btn" type="button" class="btn btn-primary"><span data-feather="plus"></span>เพิ่มข้อมูล</button>
        </div>
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
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteNotifyRepairDialog"><span data-feather="trash-2"></button>
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
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteNotifyRepairDialog"><span data-feather="trash-2"></button>
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
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteNotifyRepairDialog"><span data-feather="trash-2"></button>
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
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteNotifyRepairDialog"><span data-feather="trash-2"></button>
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
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteNotifyRepairDialog"><span data-feather="trash-2"></button>
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
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteNotifyRepairDialog"><span data-feather="trash-2"></button>
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
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteNotifyRepairDialog"><span data-feather="trash-2"></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- Create Form -->
      <div class="create-notify-repair-form d-none">
        <h4>เพิ่มใบแจ้งซ่อม</h4>
        <form>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateNumber">หมายเลขครุภัณฑ์</label>
              <input type="text" class="form-control" id="validateNumber" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="dayStart">วันที่แจ้ง</label>
              <input type="date" class="form-control" id="dayStart" name="dayStart" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="detailStart">รายละเอียด</label>
              <textarea class="form-control" id="detailStart" rows="3" required></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="notifyStaff">ผู้แจ้ง</label>
              <select class="form-control" id="notifyStaff" required>
                <option selected disabled value="">เลือกผู้แจ้ง...</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label class="pt-0">รูปภาพ</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileCreate" lang="th">
                <label class="custom-file-label create" for="customFileCreate">เลือกไฟล์...</label>
              </div>
              <img id='create-file-preview' class="img-thumbnail w-50 d-none" />
            </div>
          </div>
          <button id="cancel-save-btn" class="btn btn-secondary" type="button">ยกเลิก</button>
          <button id="save-btn" class="btn btn-primary" type="submit">เพิ่มข้อมูล</button>
        </form>
      </div>
      <!-- Update Form -->
      <div class="edit-notify-repair-form d-none">
        <h4>แก้ไขใบแจ้งซ่อม</h4>
        <form>
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="validateNumber">หมายเลขครุภัณฑ์</label>
            <input type="text" class="form-control" id="validateNumber" required>
          </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="dayStart">วันที่แจ้ง</label>
              <input type="date" class="form-control" id="dayStart" name="dayStart" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="detailStart">รายละเอียด</label>
              <textarea class="form-control" id="detailStart" rows="3" required></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="notifyStaff">ผู้แจ้ง</label>
              <select class="form-control" id="notifyStaff" required>
                <option selected disabled value="">เลือกผู้แจ้ง...</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label class="pt-0">รูปภาพ</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileEdit" lang="th">
                <label class="custom-file-label edit" for="customFileEdit">เลือกไฟล์...</label>
              </div>
              <img id='edit-file-preview' class="img-thumbnail w-50 d-none" />
            </div>
          </div>
          <button id="cancel-edit-btn" class="btn btn-secondary" type="button">ยกเลิก</button>
          <button id="edit-btn" class="btn btn-primary" type="submit">แก้ไขข้อมูล</button>
        </form>
      </div>

      <!-- Delete Modal -->
      <div class="modal fade" id="deleteNotifyRepairDialog" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="deleteNotifyRepairDialogLabel">ยืนยันการลบข้อมูล</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ท่านต้องการลบข้อมูล ... หรือไม่
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
              <button type="button" class="btn btn-danger">ลบข้อมูล</button>
            </div>
          </div>
        </div>
      </div>
    </main>
    </div>
  </div>
  <?php include '../components/footer-script.php'; ?>
  <script src="../assets/js/notify-repair-script.js"></script>
</body>

</html>
