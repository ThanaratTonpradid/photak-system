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
        <?php include  '../actions/db-connection.php'; ?>
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
            <?php
              $result = mysqli_query($conn,"SELECT * FROM employee");
              $i=1;
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
            ?>
            <tr id="<?php echo $row["id"]; ?>">
              <td><?php echo $i; ?></td>
              <td><?php echo $row["em_fname"]; ?></td>
              <td><?php echo $row["em_lname"]; ?></td>
              <td><?php echo $row["posi_id"]; ?></td>
              <td><?php echo $row["d_id"]; ?></td>
              <td><?php echo $row["em_user"]; ?></td>
              <td><?php echo $row["em_pass"]; ?></td>
              <td><?php echo $row["em_status"]; ?></td>
              <td>
                <button
                  type="button"
                  class="btn btn-sm btn-info edit-btn"
                  data-id="<?php echo $row["id"]; ?>"
                  data-em-fname="<?php echo $row["em_fname"]; ?>"
                  data-em-lname="<?php echo $row["em_lname"]; ?>"
                  data-em-user="<?php echo $row["em_user"]; ?>"
                  data-em-pass="<?php echo $row["em_pass"]; ?>"
                  data-em-status="<?php echo $row["em_status"]; ?>"
                  data-em-group="<?php echo $row["em_group"]; ?>"
                  data-posi-id="<?php echo $row["posi_id"]; ?>"
                  data-d-id="<?php echo $row["d_id"]; ?>"
                >
                  <span data-feather="edit-2">
                </button>
                <button
                  type="button"
                  class="btn btn-sm btn-danger delete-btn"
                  data-toggle="modal"
                  data-target="#deleteDialog"
                  data-id="<?php echo $row["id"]; ?>"
                  data-em-fname="<?php echo $row["em_fname"]; ?>"
                  data-em-lname="<?php echo $row["em_lname"]; ?>"
                  data-em-user="<?php echo $row["em_user"]; ?>"
                  data-em-pass="<?php echo $row["em_pass"]; ?>"
                  data-em-status="<?php echo $row["em_status"]; ?>"
                  data-em-group="<?php echo $row["em_group"]; ?>"
                  data-posi-id="<?php echo $row["posi_id"]; ?>"
                  data-d-id="<?php echo $row["d_id"]; ?>"
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
              <td colspan="9" class="text-center">
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
        <h4>เพิ่มผู้ใช้งาน</h4>
        <form id="create-form">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_fname">ชื่อ</label>
              <input type="text" class="form-control" id="em_fname" name="em_fname" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_lname">นามสกุล</label>
              <input type="text" class="form-control" id="em_lname" name="em_lname" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="posi_id">ต่ำแหน่ง</label>
              <select class="form-control" id="posi_id" name="posi_id" required>
                <option selected disabled value="">เลือกตำแหน่ง</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM position");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>"><?php echo $row["posi_name"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="d_id">แผนก</label>
              <select class="form-control" id="d_id" name="d_id" required>
                <option selected disabled value="">เลือกแผนก</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM department");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>"><?php echo $row["d_name"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_user">username</label>
              <input type="text" class="form-control" id="em_user" name="em_user" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_pass">password</label>
              <input type="text" class="form-control" id="em_pass" name="em_pass" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="em_status" id="em_status" value="active" checked="checked" required>
                <label class="form-check-label" for="em_status">ยังปฏิบัติหน้าที่</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="em_status" id="em_status" value="inactive" required>
                <label class="form-check-label" for="em_status">ไม่ปฏิบัติหน้าที่</label>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_group">สิทธิ์การใช้งาน</label>
              <select class="form-control" id="em_group" name="em_group" required>
                <option selected disabled value="">เลือกสิทธิ์การใช้งาน</option>
                <option value="admin">ผู้ดูแลระบบ</option>
                <option value="manager">หัวหน้างาน</option>
                <option value="maintainer">ช่างซ่อมบำรุง</option>
                <option value="user">ผู้ใช้งาน</option>
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
        <h4>แก้ไขผู้ใช้งาน</h4>
        <form id="edit-form">
        <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_fname">ชื่อ</label>
              <input type="hidden" id="em_id_u" name="id" class="form-control" required>
              <input type="text" class="form-control" id="em_fname_u" name="em_fname" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_lname">นามสกุล</label>
              <input type="text" class="form-control" id="em_lname_u" name="em_lname" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="posi_id">ต่ำแหน่ง</label>
              <select class="form-control" id="posi_id_u" name="posi_id" required>
                <option disabled value="">เลือกตำแหน่ง</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM position");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>"><?php echo $row["posi_name"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="d_id">แผนก</label>
              <select class="form-control" id="d_id_u" name="d_id" required>
                <option disabled value="">เลือกแผนก</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM department");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>"><?php echo $row["d_name"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_user">username</label>
              <input type="text" class="form-control" id="em_user_u" name="em_user" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_pass">password</label>
              <input type="text" class="form-control" id="em_pass_u" name="em_pass" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="em_status" id="em_status_u" value="active" required>
                <label class="form-check-label" for="em_status">ยังปฏิบัติหน้าที่</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="em_status" id="em_status_u" value="inactive" required>
                <label class="form-check-label" for="em_status">ไม่ปฏิบัติหน้าที่</label>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_group">สิทธิ์การใช้งาน</label>
              <select class="form-control" id="em_group_u" name="em_group" required>
                <option disabled value="">เลือกสิทธิ์การใช้งาน</option>
                <option value="admin">ผู้ดูแลระบบ</option>
                <option value="manager">หัวหน้างาน</option>
                <option value="maintainer">ช่างซ่อมบำรุง</option>
                <option value="user">ผู้ใช้งาน</option>
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
              ท่านต้องการลบข้อมูล <span id="em_fname_d"></span><span id="em_lname_d"></span> หรือไม่
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
  <script src="/photak-system/assets/js/employee-script.js"></script>
</body>

</html>
