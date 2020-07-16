<!DOCTYPE html>
<html lang="en">

<head>
  <title>จัดการครุภัณฑ์คอมพิวเตอร์ - ระบบแจ้งซ่อมครุภัณฑ์คอมพิวเตอร์</title>
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
        <h3>รายการครุภัณฑ์คอมพิวเตอร์</h3>
        <button id="add-form-btn" type="button" class="btn btn-primary"><span data-feather="plus"></span>เพิ่มข้อมูล</button>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>หมายเลขครุภัณฑ์</th>
              <th>ชื่อครุภัณฑ์</th>
              <th>ยี่ห้อ</th>
              <th>รุ่น</th>
              <th>รายละเอียด</th>
              <th>วันที่รับเข้า</th>
              <th>วันที่จำหน่ายออก</th>
              <th>ประเภทครุภัณฑ์</th>
              <th>รหัสผู้รับผิดชอบ</th>
              <th>สถานะ</th>
              <th>รูป</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProductDialog"><span data-feather="trash-2"></button>
              </td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>amet</td>
              <td>consectetur</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProductDialog"><span data-feather="trash-2"></button>
              </td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>Integer</td>
              <td>nec</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProductDialog"><span data-feather="trash-2"></button>
              </td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>libero</td>
              <td>Sed</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProductDialog"><span data-feather="trash-2"></button>
              </td>
            </tr>
            <tr>
              <td>1,004</td>
              <td>dapibus</td>
              <td>diam</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProductDialog"><span data-feather="trash-2"></button>
              </td>
            </tr>
            <tr>
              <td>1,005</td>
              <td>Nulla</td>
              <td>quis</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProductDialog"><span data-feather="trash-2"></button>
              </td>
            </tr>
            <tr>
              <td>1,006</td>
              <td>nibh</td>
              <td>elementum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>Lorem</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProductDialog"><span data-feather="trash-2"></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- Create Form -->
      <div class="create-product-form d-none">
        <h4>เพิ่มครุภัณฑ์คอมพิวเตอร์</h4>
        <form>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateNumber">หมายเลขครุภัณฑ์</label>
              <input type="text" class="form-control" id="validateNumber" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateName">ชื่อครุภัณฑ์</label>
              <input type="text" class="form-control" id="validateName" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateBrand">ยี่ห้อ</label>
              <input type="text" class="form-control" id="validateBrand" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateSeries">รุ่น</label>
              <input type="text" class="form-control" id="validateSeries" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateDetail">รายละเอียด</label>
              <input type="text" class="form-control" id="validateDetail" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="dateIn">วันที่รับเข้า</label>
              <input type="date" class="form-control" id="dateIn" name="dateIn" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="dateOut">วันที่จำหน่ายออก</label>
              <input type="date" class="form-control" id="dateOut" name="dateOut" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateType">ประเภทครุภัณฑ์</label>
              <select class="form-control" id="validateType" required>
                <option selected disabled value="">เลือกประเภทครุภัณฑ์...</option>
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
              <label for="validateStaff">รหัสผู้รับผิดชอบ</label>
              <select class="form-control" id="validateStaff" required>
                <option selected disabled value="">เลือกรหัสผู้รับผิดชอบ...</option>
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
              <label class="pt-0">สถานะ</label>
              <div class="d-flex">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="statusRadioOptions" id="statusRadio1" value="active" required>
                  <label class="form-check-label" for="statusRadio1">ใช้งาน</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="statusRadioOptions" id="statusRadio2" value="inactive" required>
                  <label class="form-check-label" for="statusRadio2">จำหน่ายออก</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label class="pt-0">รูป</label>
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
      <div class="edit-product-form d-none">
        <h4>แก้ไขครุภัณฑ์คอมพิวเตอร์</h4>
        <form>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateNumber">หมายเลขครุภัณฑ์</label>
              <input type="text" class="form-control" id="validateNumber" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateName">ชื่อครุภัณฑ์</label>
              <input type="text" class="form-control" id="validateName" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateBrand">ยี่ห้อ</label>
              <input type="text" class="form-control" id="validateBrand" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateSeries">รุ่น</label>
              <input type="text" class="form-control" id="validateSeries" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateDetail">รายละเอียด</label>
              <input type="text" class="form-control" id="validateDetail" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="dateIn">วันที่รับเข้า</label>
              <input type="date" class="form-control" id="dateIn" name="dateIn" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="dateOut">วันที่จำหน่ายออก</label>
              <input type="date" class="form-control" id="dateOut" name="dateOut" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validateType">ประเภทครุภัณฑ์</label>
              <select class="form-control" id="validateType" required>
                <option selected disabled value="">เลือกประเภทครุภัณฑ์...</option>
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
              <label for="validateStaff">รหัสผู้รับผิดชอบ</label>
              <select class="form-control" id="validateStaff" required>
                <option selected disabled value="">เลือกรหัสผู้รับผิดชอบ...</option>
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
              <label class="pt-0">สถานะ</label>
              <div class="d-flex">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="statusRadioOptions" id="statusRadio1" value="active" required>
                  <label class="form-check-label" for="statusRadio1">ใช้งาน</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="statusRadioOptions" id="statusRadio2" value="inactive" required>
                  <label class="form-check-label" for="statusRadio2">จำหน่ายออก</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label class="pt-0">รูป</label>
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
      <div class="modal fade" id="deleteProductDialog" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="deleteProductDialogLabel">ยืนยันการลบข้อมูล</h4>
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
  <script src="../assets/js/product-script.js"></script>
</body>

</html>
