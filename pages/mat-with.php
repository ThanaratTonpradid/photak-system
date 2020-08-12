<?php include '../actions/session.php'; ?>
<?php
  if (!$matWithPage) {
    header("location: /photak-system/pages/no-permission.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>ใบเบิกวัสดุ - ระบบแจ้งซ่อมครุภัณฑ์คอมพิวเตอร์</title>
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
        <h3>รายการใบเบิกวัสดุ</h3>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div id="search-form" class="btn-group mr-2">
            <input class="form-control" type="text" placeholder="ค้นหาใบเบิกวัสดุ" aria-label="ค้นหาใบเบิกวัสดุ">
            <button id="search-btn" type="button" class="btn btn-secondary"><span data-feather="search"></span></button>
          </div>
          <button id="add-form-btn" type="button" class="btn btn-primary"><span data-feather="plus"></span>เพิ่มใบเบิกวัสดุ</button>
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
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></span></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMatWithDialog"><span data-feather="trash-2"></span></button>
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
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></span></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMatWithDialog"><span data-feather="trash-2"></span></button>
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
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></span></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMatWithDialog"><span data-feather="trash-2"></span></button>
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
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></span></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMatWithDialog"><span data-feather="trash-2"></span></button>
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
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></span></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMatWithDialog"><span data-feather="trash-2"></span></button>
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
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></span></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMatWithDialog"><span data-feather="trash-2"></span></button>
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
                <button type="button" class="btn btn-sm btn-info" onclick="handleEditRow()"><span data-feather="edit-2"></span></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMatWithDialog"><span data-feather="trash-2"></span></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- Create Form -->
      <div class="create-mat-with-form d-none">
        <h4>เพิ่มใบเบิกวัสดุ</h4>
        <form>
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group row">
                <label for="dayStart" class="col-sm-2 col-form-label">วันที่เบิก</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="dayStart" name="dayStart" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="matWithStaff" class="col-sm-2 col-form-label">ผู้ขอเบิก</label>
                <div class="col-sm-10">
                  <select class="form-control" id="matWithStaff" required>
                    <option selected disabled value="">เลือกผู้ขอเบิก/photak-system.</option>
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
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="selectMat">รายการ</label>
                </div>
                <select class="custom-select" id="selectMat" required>
                  <option selected disabled value="">เลือกวัสดุคอมพิวเตอร์/photak-system.</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
                <div class="input-group-prepend">
                  <label class="input-group-text" for="matAmount">จำนวน</label>
                </div>
                <input type="number" class="form-control" id="matAmount" required>
                <div class="input-group-append" id="add-mat-btn">
                  <button class="btn btn-primary" type="button"><span data-feather="plus"></span></button>
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
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>วัสดุ1</td>
                    <td>1,234</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMatWithDialog"><span data-feather="trash-2"></span></button>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>วัสดุ2</td>
                    <td>1,234</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMatWithDialog"><span data-feather="trash-2"></span></button>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>วัสดุ3</td>
                    <td>1,234</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMatWithDialog"><span data-feather="trash-2"></span></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <button id="cancel-save-btn" class="btn btn-secondary" type="button">ยกเลิก</button>
          <button id="save-btn" class="btn btn-primary" type="submit">เพิ่มข้อมูล</button>
        </form>
      </div>
      <!-- Update Form -->
      <div class="edit-mat-with-form d-none">
        <h4>แก้ไขใบเบิกวัสดุ</h4>
        <form>
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group row">
                <label for="dayStart" class="col-sm-2 col-form-label">วันที่เบิก</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="dayStart" name="dayStart" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="matWithStaff" class="col-sm-2 col-form-label">ผู้ขอเบิก</label>
                <div class="col-sm-10">
                  <select class="form-control" id="matWithStaff" required>
                    <option selected disabled value="">เลือกผู้ขอเบิก/photak-system.</option>
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
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="selectMat">รายการ</label>
                </div>
                <select class="custom-select" id="selectMat" required>
                  <option selected disabled value="">เลือกวัสดุคอมพิวเตอร์/photak-system.</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
                <div class="input-group-prepend">
                  <label class="input-group-text" for="matAmount">จำนวน</label>
                </div>
                <input type="number" class="form-control" id="matAmount" required>
                <div class="input-group-append" id="add-mat-btn">
                  <button class="btn btn-primary" type="button"><span data-feather="plus"></span></button>
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
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>วัสดุ1</td>
                    <td>1,234</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMatWithDialog"><span data-feather="trash-2"></span></button>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>วัสดุ2</td>
                    <td>1,234</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMatWithDialog"><span data-feather="trash-2"></span></button>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>วัสดุ3</td>
                    <td>1,234</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMatWithDialog"><span data-feather="trash-2"></span></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <button id="cancel-edit-btn" class="btn btn-secondary" type="button">ยกเลิก</button>
          <button id="edit-btn" class="btn btn-primary" type="submit">แก้ไขข้อมูล</button>
        </form>
      </div>

      <!-- Delete Modal -->
      <div class="modal fade" id="deleteMatWithDialog" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="deleteMatWithDialogLabel">ยืนยันการลบข้อมูล</h4>
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
  <script src="/photak-system/assets/js/mat-with-script.js"></script>
</body>

</html>
