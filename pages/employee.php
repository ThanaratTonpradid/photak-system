<!DOCTYPE html>
<html lang="en">

<head>
  <title>จัดการผู้ใช้งาน - ระบบแจ้งซ่อมครุภัณฑ์คอมพิวเตอร์</title>
  <?php include '../components/head.php'; ?>
  <link rel="stylesheet" href="/photak-system/assets/css/dashboard.css">
</head>

<body>
  <?php include '../components/header.php'; ?>
  <div class="container-fluid">
    <div class="row">
      <?php include '../components/sidebar.php'; ?>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h3>รายการผู้ใช้งาน</h3>
        <button id="add-form-btn" type="button" class="btn btn-primary"><span data-feather="plus"></span>เพิ่มข้อมูล</button>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>ชื่อ</th>
              <th>นามสกุล</th>
              <th>ต่ำแหน่ง</th>
              <th>แผนก</th>
              <th>ชื่อเข้าใช้งาน</th>
              <th>รหัสผ่าน</th>
              <th>สถานะ</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>position</td>
              <td>department</td>
              <td>username</td>
              <td>password</td>
              <td>status</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteEmployeeDialog"><span data-feather="trash-2"></button>
              </td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>amet</td>
              <td>consectetur</td>
              <td>position</td>
              <td>department</td>
              <td>username</td>
              <td>password</td>
              <td>status</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteEmployeeDialog"><span data-feather="trash-2"></button>
              </td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>Integer</td>
              <td>nec</td>
              <td>position</td>
              <td>department</td>
              <td>username</td>
              <td>password</td>
              <td>status</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteEmployeeDialog"><span data-feather="trash-2"></button>
              </td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>libero</td>
              <td>Sed</td>
              <td>position</td>
              <td>department</td>
              <td>username</td>
              <td>password</td>
              <td>status</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteEmployeeDialog"><span data-feather="trash-2"></button>
              </td>
            </tr>
            <tr>
              <td>1,004</td>
              <td>dapibus</td>
              <td>diam</td>
              <td>position</td>
              <td>department</td>
              <td>username</td>
              <td>password</td>
              <td>status</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteEmployeeDialog"><span data-feather="trash-2"></button>
              </td>
            </tr>
            <tr>
              <td>1,005</td>
              <td>Nulla</td>
              <td>quis</td>
              <td>position</td>
              <td>department</td>
              <td>username</td>
              <td>password</td>
              <td>status</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteEmployeeDialog"><span data-feather="trash-2"></button>
              </td>
            </tr>
            <tr>
              <td>1,006</td>
              <td>nibh</td>
              <td>elementum</td>
              <td>position</td>
              <td>department</td>
              <td>username</td>
              <td>password</td>
              <td>status</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteEmployeeDialog"><span data-feather="trash-2"></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- Create Form -->
      <div class="create-employee-form d-none">
        <h4>เพิ่มผู้ใช้งาน</h4>
        <form>
        <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateName">ชื่อ</label>
              <input type="text" class="form-control" id="validateName" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateName">นามสกุล</label>
              <input type="text" class="form-control" id="validateName" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validatePosition">ต่ำแหน่ง</label>
              <select class="form-control" id="validatePosition" required>
                <option selected disabled value="">เลือกต่ำแหน่ง/photak-system.</option>
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
              <label for="validateDepartment">แผนก</label>
              <select class="form-control" id="validateDepartment" required>
                <option selected disabled value="">เลือกแผนก/photak-system.</option>
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
              <label for="validateUser">username</label>
              <input type="text" class="form-control" id="validateUser" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validatePass">password</label>
              <input type="text" class="form-control" id="validatePass" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="statusRadioOptions" id="statusRadio1" value="active" required>
                <label class="form-check-label" for="statusRadio1">ยังปฏิบัติหน้าที่</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="statusRadioOptions" id="statusRadio2" value="inactive" required>
                <label class="form-check-label" for="statusRadio2">ไม่ปฏิบัติหน้าที่</label>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validatePermission">สิทธิ์การใช้งาน</label>
              <select class="form-control" id="validatePermission" required>
                <option selected disabled value="">เลือกสิทธิ์การใช้งาน/photak-system.</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <button id="cancel-save-btn" class="btn btn-secondary" type="button">ยกเลิก</button>
          <button id="save-btn" class="btn btn-primary" type="submit">เพิ่มข้อมูล</button>
        </form>
      </div>
      <!-- Update Form -->
      <div class="edit-employee-form d-none">
        <h4>แก้ไขผู้ใช้งาน</h4>
        <form>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateName">ชื่อ</label>
              <input type="text" class="form-control" id="validateName" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateName">นามสกุล</label>
              <input type="text" class="form-control" id="validateName" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validatePosition">ต่ำแหน่ง</label>
              <select class="form-control" id="validatePosition" required>
                <option selected disabled value="">เลือกต่ำแหน่ง/photak-system.</option>
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
              <label for="validateDepartment">แผนก</label>
              <select class="form-control" id="validateDepartment" required>
                <option selected disabled value="">เลือกแผนก/photak-system.</option>
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
              <label for="validateUser">username</label>
              <input type="text" class="form-control" id="validateUser" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validatePass">password</label>
              <input type="text" class="form-control" id="validatePass" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="statusRadioOptions" id="statusRadio1" value="active" required>
                <label class="form-check-label" for="statusRadio1">ยังปฏิบัติหน้าที่</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="statusRadioOptions" id="statusRadio2" value="inactive" required>
                <label class="form-check-label" for="statusRadio2">ไม่ปฏิบัติหน้าที่</label>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validatePermission">สิทธิ์การใช้งาน</label>
              <select class="form-control" id="validatePermission" required>
                <option selected disabled value="">เลือกสิทธิ์การใช้งาน/photak-system.</option>
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

      <!-- Delete Modal -->
      <div class="modal fade" id="deleteEmployeeDialog" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="deleteEmployeeDialogLabel">ยืนยันการลบข้อมูล</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ท่านต้องการลบข้อมูล /photak-system. หรือไม่
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
  <script src="/photak-system/assets/js/employee-script.js"></script>
</body>

</html>
