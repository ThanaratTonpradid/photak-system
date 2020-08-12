<?php include '../actions/session.php'; ?>
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
      <?php include  '../actions/db-connection.php'; ?>
      <?php
        if (isset($_GET['create'])) {
          $create = true;
          $update = false;
        }
      ?>
      <?php
        if (isset($_GET['edit'])) {
          $id = $_GET['edit'];
          $update = true;
          $record = mysqli_query($conn, "SELECT * FROM employee WHERE id=$id");

          if (mysqli_num_rows($record) == 1 ) {
            $row = mysqli_fetch_array($record);
            $em_fname = $row["em_fname"];
            $em_lname = $row["em_lname"];
            $posi_id = $row["posi_id"];
            $d_id = $row["d_id"];
            $em_user = $row["em_user"];
            $em_pass = $row["em_pass"];
            $em_status = $row["em_status"];
            $em_group = $row["em_group"];
          }
        }
      ?>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h3>รายการผู้ใช้งาน</h3>
        <a href="/photak-system/pages/employee.php?create" type="button" class="btn btn-primary<?php if ($create || $update) echo ' d-none'; ?>">
          <span data-feather="plus"></span>
          เพิ่มข้อมูล
        </a>
      </div>
      <div class="table-responsive<?php if ($create || $update) echo ' d-none'; ?>">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>รหัสผู้ใช้งาน</th>
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
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["em_fname"]; ?></td>
              <td><?php echo $row["em_lname"]; ?></td>
              <td><?php echo $row["posi_id"]; ?></td>
              <td><?php echo $row["d_id"]; ?></td>
              <td><?php echo $row["em_user"]; ?></td>
              <td><?php echo $row["em_pass"]; ?></td>
              <td><?php echo $row["em_status"]; ?></td>
              <td class="d-flex">
                <a
                  href="/photak-system/pages/employee.php?edit=<?php echo $row["id"]; ?>"
                  type="button"
                  class="btn btn-sm btn-info edit-btn"
                >
                  <span data-feather="edit-2">
                </a>
                <form method="POST" action="/photak-system/actions/employee.php">
                  <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                  <input type="hidden" name="type" value="delete">
                  <button
                    type="submit"
                    class="btn btn-sm btn-danger"
                    onClick="javascript: return confirm('ยืนยันการลบข้อมูล <?php echo $row["d_name"]; ?>');"
                  >
                    <span data-feather="trash-2">
                  </button>
                </form>
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
      <div class="create-form<?php if (!$create) echo ' d-none'; ?>">
        <h4>เพิ่มผู้ใช้งาน</h4>
        <form method="POST" action="/photak-system/actions/employee.php">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_fname">ชื่อ</label>
              <input type="text" class="form-control" name="em_fname" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_lname">นามสกุล</label>
              <input type="text" class="form-control" name="em_lname" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="posi_id">ต่ำแหน่ง</label>
              <select class="form-control" name="posi_id" required>
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
              <select class="form-control" name="d_id" required>
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
              <input type="text" class="form-control" name="em_user" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_pass">password</label>
              <input type="text" class="form-control" name="em_pass" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="em_status" value="active" checked="checked" required>
                <label class="form-check-label" for="em_status">ยังปฏิบัติหน้าที่</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="em_status" value="inactive" required>
                <label class="form-check-label" for="em_status">ไม่ปฏิบัติหน้าที่</label>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_group">สิทธิ์การใช้งาน</label>
              <select class="form-control" name="em_group" required>
                <option selected disabled value="">เลือกสิทธิ์การใช้งาน</option>
                <option value="admin">ผู้ดูแลระบบ</option>
                <option value="manager">หัวหน้างาน</option>
                <option value="maintainer">ช่างซ่อมบำรุง</option>
                <option value="user">ผู้ใช้งาน</option>
              </select>
            </div>
          </div>
          <input type="hidden" value="create" name="type">
          <a href="/photak-system/pages/employee.php" class="btn btn-secondary" type="button">ยกเลิก</a>
          <button id="save-btn" class="btn btn-primary" type="submit">เพิ่มข้อมูล</button>
        </form>
      </div>
      <!-- Update Form -->
      <div class="edit-form<?php if (!$update) echo ' d-none'; ?>">
        <h4>แก้ไขผู้ใช้งาน</h4>
        <form method="POST" action="/photak-system/actions/employee.php">
        <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_fname">ชื่อ</label>
              <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>" required>
              <input type="text" class="form-control" name="em_fname" value="<?php echo $em_fname; ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_lname">นามสกุล</label>
              <input type="text" class="form-control" name="em_lname" value="<?php echo $em_lname; ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="posi_id">ต่ำแหน่ง</label>
              <select class="form-control" name="posi_id" required>
                <option disabled value="">เลือกตำแหน่ง</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM position");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>" <?php if ($posi_id == $row["id"]) echo 'selected="selected"'; ?>><?php echo $row["posi_name"]; ?></option>
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
              <select class="form-control" name="d_id" required>
                <option disabled value="">เลือกแผนก</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM department");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>" <?php if ($d_id == $row["id"]) echo 'selected="selected"'; ?>><?php echo $row["d_name"]; ?></option>
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
              <input type="text" class="form-control" name="em_user" value="<?php echo $em_user; ?>" required readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_pass">password</label>
              <input type="text" class="form-control" name="em_pass" value="<?php echo $em_pass; ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="em_status" value="active" <?php if ($em_status == 'active') echo 'checked="checked"' ?> required>
                <label class="form-check-label" for="em_status">ยังปฏิบัติหน้าที่</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="em_status" value="inactive" <?php if ($em_status == 'inactive') echo 'checked="checked"' ?> required>
                <label class="form-check-label" for="em_status">ไม่ปฏิบัติหน้าที่</label>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_group">สิทธิ์การใช้งาน</label>
              <select class="form-control" name="em_group" required readonly disabled>
                <option disabled value="">เลือกสิทธิ์การใช้งาน</option>
                <option value="admin" <?php if($em_group == 'admin') echo 'selected="selected"'; ?>>ผู้ดูแลระบบ</option>
                <option value="manager" <?php if($em_group == 'manager') echo 'selected="selected"'; ?>>หัวหน้างาน</option>
                <option value="maintainer" <?php if($em_group == 'maintainer') echo 'selected="selected"'; ?>>ช่างซ่อมบำรุง</option>
                <option value="user" <?php if($em_group == 'user') echo 'selected="selected"'; ?>>ผู้ใช้งาน</option>
              </select>
            </div>
          </div>
          <input type="hidden" value="update" name="type">
          <a href="/photak-system/pages/employee.php" class="btn btn-secondary" type="button">ยกเลิก</a>
          <button id="edit-btn" class="btn btn-primary" type="submit">แก้ไขข้อมูล</button>
        </form>
      </div>
    </main>
    </div>
  </div>
  <?php include '../components/footer-script.php'; ?>
</body>

</html>
