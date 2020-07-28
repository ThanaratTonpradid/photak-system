<!DOCTYPE html>
<html lang="en">

<head>
  <title>จัดการแผนก - ระบบแจ้งซ่อมครุภัณฑ์คอมพิวเตอร์</title>
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
        <h3>รายการแผนก</h3>
        <button id="add-form-btn" type="button" class="btn btn-primary"><span data-feather="plus"></span>เพิ่มข้อมูล</button>
      </div>
      <div class="table-responsive">
        <?php include  '../actions/db-connection.php'; ?>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>รหัส</th>
              <th>ชื่อแผนก</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $result = mysqli_query($conn,"SELECT * FROM department");
              $i=1;
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
            ?>
            <tr id="<?php echo $row["id"]; ?>">
              <td><?php echo $i; ?></td>
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["d_name"]; ?></td>
              <td>
                <button
                  type="button"
                  class="btn btn-sm btn-info edit-btn"
                  data-id="<?php echo $row["id"]; ?>"
                  data-d-name="<?php echo $row["d_name"]; ?>"
                >
                  <span data-feather="edit-2">
                </button>
                <button
                  type="button"
                  class="btn btn-sm btn-danger delete-btn"
                  data-toggle="modal"
                  data-target="#deleteDialog"
                  data-id="<?php echo $row["id"]; ?>"
                  data-d-name="<?php echo $row["d_name"]; ?>"
                >
                    <span data-feather="trash-2">
                  </button>
              </td>
            </tr>
            <?php
                  $i++;
                }
              } else {
            ?>
            <tr>
              <td colspan="4" class="text-center">
                <span>ไม่พบข้อมูล</span>
              </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
      <!-- Create Form -->
      <div class="create-form d-none">
        <h4>เพิ่มแผนก</h4>
        <form id="create-form">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="d_name">ชื่อแผนก</label>
              <input type="text" class="form-control" id="d_name" name="d_name" required>
            </div>
          </div>
          <input type="hidden" value="create" name="type">
          <button id="cancel-save-btn" class="btn btn-secondary" type="button">ยกเลิก</button>
          <button id="save-btn" class="btn btn-primary" type="button">เพิ่มข้อมูล</button>
        </form>
      </div>
      <!-- Update Form -->
      <div class="edit-form d-none">
        <h4>แก้ไขแผนก</h4>
        <form id="edit-from">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="d_name_u">ชื่อแผนก</label>
              <input type="hidden" id="d_id_u" name="id" class="form-control" required>
              <input type="text" class="form-control" id="d_name_u" name="d_name" required>
            </div>
          </div>
          <input type="hidden" value="update" name="type">
          <button id="cancel-edit-btn" class="btn btn-secondary" type="button">ยกเลิก</button>
          <button id="edit-btn" class="btn btn-primary" type="button">แก้ไขข้อมูล</button>
        </form>
      </div>

      <!-- Delete Modal -->
      <div class="modal fade" id="deleteDialog" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="deleteDialogLabel">ยืนยันการลบข้อมูล</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" id="id_d" name="id" class="form-control">
              ท่านต้องการลบข้อมูล <span id="d_name_d"></span> หรือไม่
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
  <script src="/photak-system/assets/js/department-script.js"></script>
</body>

</html>
