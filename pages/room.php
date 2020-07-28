<!DOCTYPE html>
<html lang="en">

<head>
  <title>จัดการห้อง - ระบบแจ้งซ่อมครุภัณฑ์คอมพิวเตอร์</title>
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
        <h3>รายการห้อง</h3>
        <button id="add-form-btn" type="button" class="btn btn-primary"><span data-feather="plus"></span>เพิ่มข้อมูล</button>
      </div>
      <div class="table-responsive">
        <?php include  '../actions/db-connection.php'; ?>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>รหัส</th>
              <th>ชื่อห้อง</th>
              <th>เบอร์โทร</th>
              <th>อาคาร</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $result = mysqli_query($conn,"SELECT * FROM room");
              $i=1;
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
            ?>
            <tr id="<?php echo $row["id"]; ?>">
              <td><?php echo $i; ?></td>
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["room_name"]; ?></td>
              <td><?php echo $row["room_phone"]; ?></td>
              <td><?php echo $row["buil_id"]; ?></td>
              <td>
                <button
                  type="button"
                  class="btn btn-sm btn-info edit-btn"
                  data-id="<?php echo $row["id"]; ?>"
                  data-room-name="<?php echo $row["room_name"]; ?>"
                  data-room-phone="<?php echo $row["room_phone"]; ?>"
                  data-buil-id="<?php echo $row["buil_id"]; ?>"
                >
                  <span data-feather="edit-2">
                </button>
                <button
                  type="button"
                  class="btn btn-sm btn-danger delete-btn"
                  data-toggle="modal"
                  data-target="#deleteDialog"
                  data-id="<?php echo $row["id"]; ?>"
                  data-room-name="<?php echo $row["room_name"]; ?>"
                  data-room-phone="<?php echo $row["room_phone"]; ?>"
                  data-buil-id="<?php echo $row["buil_id"]; ?>"
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
              <td colspan="6" class="text-center">
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
        <h4>เพิ่มห้อง</h4>
        <form id="create-form">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="room_name">ชื่อห้อง</label>
              <input type="text" class="form-control" id="room_name" name="room_name" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="room_phone">เบอร์โทร</label>
              <input type="text" class="form-control" id="room_phone" name="room_phone" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="buil_id">อาคาร</label>
              <select class="form-control" id="buil_id" name="buil_id" required>
                <option selected disabled value="">เลือกอาคาร</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM building");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>"><?php echo $row["buil_name"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <input type="hidden" value="create" name="type">
          <button id="cancel-save-btn" class="btn btn-secondary" type="button">ยกเลิก</button>
          <button id="save-btn" class="btn btn-primary" type="button">เพิ่มข้อมูล</button>
        </form>
      </div>
      <!-- Update Form -->
      <div class="edit-form d-none">
        <h4>แก้ไขห้อง</h4>
        <form id="edit-form">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="room_name">ชื่อห้อง</label>
              <input type="hidden" id="room_id_u" name="id" class="form-control" required>
              <input type="text" class="form-control" id="room_name_u" name="room_name" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="room_phone">เบอร์โทร</label>
              <input type="text" class="form-control" id="room_phone_u" name="room_phone" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="buil_id">อาคาร</label>
              <select class="form-control" id="buil_id_u" name="buil_id" required>
                <option selected disabled value="">เลือกอาคาร</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM building");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>"><?php echo $row["buil_name"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
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
              ท่านต้องการลบข้อมูล <span id="room_name_d"></span> หรือไม่
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
  <script src="/photak-system/assets/js/room-script.js"></script>
</body>

</html>
