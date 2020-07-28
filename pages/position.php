<!DOCTYPE html>
<html lang="en">

<head>
  <title>จัดการตำแหน่งผู้ใช้งาน - ระบบแจ้งซ่อมครุภัณฑ์คอมพิวเตอร์</title>
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
        <h3>รายการตำแหน่งผู้ใช้งาน</h3>
        <button id="add-form-btn" type="button" class="btn btn-primary"><span data-feather="plus"></span>เพิ่มข้อมูล</button>
      </div>
      <div class="table-responsive">
        <?php include  '../actions/db-connection.php'; ?>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>รหัส</th>
              <th>ชื่อตำแหน่งผู้ใช้งาน</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $result = mysqli_query($conn,"SELECT * FROM position");
              $i=1;
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
            ?>
            <tr id="<?php echo $row["id"]; ?>">
              <td><?php echo $i; ?></td>
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["posi_name"]; ?></td>
              <td>
                <button
                  type="button"
                  class="btn btn-sm btn-info edit-btn"
                  data-id="<?php echo $row["id"]; ?>"
                  data-posi-name="<?php echo $row["posi_name"]; ?>"
                >
                  <span data-feather="edit-2">
                </button>
                <button
                  type="button"
                  class="btn btn-sm btn-danger delete-btn"
                  data-toggle="modal"
                  data-target="#deletePositionDialog"
                  data-id="<?php echo $row["id"]; ?>"
                  data-posi-name="<?php echo $row["posi_name"]; ?>"
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
        <h4>เพิ่มตำแหน่งผู้ใช้งาน</h4>
        <form id="create-form">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="posi_name">ชื่อตำแหน่งผู้ใช้งาน</label>
              <input type="text" class="form-control" id="posi_name" name="posi_name" required>
            </div>
          </div>
          <input type="hidden" value="create" name="type">
          <button id="cancel-save-btn" class="btn btn-secondary" type="button">ยกเลิก</button>
          <button id="save-btn" class="btn btn-primary" type="button">เพิ่มข้อมูล</button>
        </form>
      </div>
      <!-- Update Form -->
      <div class="edit-form d-none">
        <h4>แก้ไขตำแหน่งผู้ใช้งาน</h4>
        <form id="edit-from">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="posi_name">ชื่อตำแหน่งผู้ใช้งาน</label>
              <input type="hidden" id="posi_id_u" name="id" class="form-control" required>
              <input type="text" class="form-control" id="posi_name_u" name="posi_name" required>
            </div>
          </div>
          <input type="hidden" value="update" name="type">
          <button id="cancel-edit-btn" class="btn btn-secondary" type="button">ยกเลิก</button>
          <button id="edit-btn" class="btn btn-primary" type="button">แก้ไขข้อมูล</button>
        </form>
      </div>

      <!-- Delete Modal -->
      <div class="modal fade" id="deletePositionDialog" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="deletePositionDialogLabel">ยืนยันการลบข้อมูล</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" id="id_d" name="id" class="form-control">
              ท่านต้องการลบข้อมูล <span id="posi_name_d"></span> หรือไม่
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
              <button type="button" class="btn btn-danger" id="delete-btn">ลบข้อมูล</button>
            </div>
          </div>
        </div>
      </div>
    </main>
    </div>
  </div>
  <?php include '../components/footer-script.php'; ?>
  <script src="/photak-system/assets/js/position-script.js"></script>
</body>

</html>
