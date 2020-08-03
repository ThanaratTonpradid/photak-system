<!DOCTYPE html>
<html lang="en">

<head>
  <title>จัดการครุภัณฑ์คอมพิวเตอร์ - ระบบแจ้งซ่อมครุภัณฑ์คอมพิวเตอร์</title>
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
          $record = mysqli_query($conn, "SELECT * FROM product WHERE id=$id");

          if (mysqli_num_rows($record) == 1 ) {
            $row = mysqli_fetch_array($record);
            $p_name = $row['p_name'];
            $p_number = $row['p_number'];
            $p_serie = $row['p_serie'];
            $p_band = $row['p_band'];
            $p_status = $row['p_status'];
            $p_image = $row['p_image'];
            $p_detail = $row['p_detail'];
            // $p_datein = $row['p_datein'];
            // $p_dateout = $row['p_dateout'];
            $p_datein = date('Y-m-d',strtotime($row['p_datein']));
            $p_dateout = date('Y-m-d',strtotime($row['p_dateout']));
            $ptype_id = $row['ptype_id'];
            $room_id = $row['room_id'];
            $em_id = $row['em_id'];
          }
        }
      ?>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h3>รายการครุภัณฑ์คอมพิวเตอร์</h3>
        <a href="/photak-system/pages/product.php?create" type="button" class="btn btn-primary<?php if ($create || $update) echo ' d-none'; ?>">
          <span data-feather="plus"></span>
          เพิ่มข้อมูล
        </a>
      </div>
      <div class="table-responsive<?php if ($create || $update) echo ' d-none'; ?>">
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
            <?php
              $result = mysqli_query($conn,"SELECT * FROM product");
              $i=1;
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
            ?>
            <tr id="<?php echo $row["id"]; ?>">
              <td><?php echo $i; ?></td>
              <td><?php echo $row["p_number"]; ?></td>
              <td><?php echo $row["p_name"]; ?></td>
              <td><?php echo $row["p_band"]; ?></td>
              <td><?php echo $row["p_serie"]; ?></td>
              <td><?php echo $row["p_detail"]; ?></td>
              <td><?php echo $row["p_datein"]; ?></td>
              <td><?php echo $row["p_dateout"]; ?></td>
              <td><?php echo $row["ptype_id"]; ?></td>
              <td><?php echo $row["em_id"]; ?></td>
              <td><?php echo $row["p_status"]; ?></td>
              <td><?php echo $row["p_image"]; ?></td>
              <td class="d-flex">
                <a
                  href="/photak-system/pages/product.php?edit=<?php echo $row["id"]; ?>"
                  type="button"
                  class="btn btn-sm btn-info edit-btn"
                >
                  <span data-feather="edit-2">
                </a>
                <form method="POST" action="/photak-system/actions/product.php">
                  <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                  <input type="hidden" name="type" value="delete">
                  <button
                    type="submit"
                    class="btn btn-sm btn-danger"
                    onClick="javascript: return confirm('ยืนยันการลบข้อมูล <?php echo $row["p_name"]; ?>');"
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
              <td colspan="13" class="text-center">
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
        <h4>เพิ่มครุภัณฑ์คอมพิวเตอร์</h4>
        <form method="POST" action="/photak-system/actions/product.php">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_number">หมายเลขครุภัณฑ์</label>
              <input type="text" class="form-control" name="p_number" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_name">ชื่อครุภัณฑ์</label>
              <input type="text" class="form-control" name="p_name" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_band">ยี่ห้อ</label>
              <input type="text" class="form-control" name="p_band" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_serie">รุ่น</label>
              <input type="text" class="form-control" name="p_serie" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_detail">รายละเอียด</label>
              <input type="text" class="form-control" name="p_detail" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_datein">วันที่รับเข้า</label>
              <input type="date" class="form-control" name="p_datein" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_dateout">วันที่จำหน่ายออก</label>
              <input type="date" class="form-control" name="p_dateout" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="ptype_id">ประเภทครุภัณฑ์</label>
              <select class="form-control" name="ptype_id" required>
                <option selected disabled value="">เลือกประเภทครุภัณฑ์</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM product_type");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>"><?php echo $row["ptype_name"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="room_id">ห้อง</label>
              <select class="form-control" name="room_id" required>
                <option selected disabled value="">เลือกห้อง</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM room");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>"><?php echo $row["room_name"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_id">รหัสผู้รับผิดชอบ</label>
              <select class="form-control" name="em_id" required>
                <option selected disabled value="">เลือกรหัสผู้รับผิดชอบ</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM employee");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>"><?php echo $row["em_fname"]; ?> <?php echo $row["em_lname"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label class="pt-0">สถานะ</label>
              <div class="d-flex">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="p_status" value="active" checked="checked" required>
                  <label class="form-check-label" for="statusRadio1">ใช้งาน</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="p_status" value="inactive" required>
                  <label class="form-check-label" for="statusRadio2">จำหน่ายออก</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label class="pt-0">รูป</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileCreate" name="p_image" lang="th">
                <label class="custom-file-label create" for="customFileCreate">เลือกไฟล์</label>
              </div>
              <img id='create-file-preview' class="img-thumbnail w-50 d-none" />
            </div>
          </div>
          <input type="hidden" value="create" name="type">
          <a href="/photak-system/pages/product.php" class="btn btn-secondary" type="button">ยกเลิก</a>
          <button id="save-btn" class="btn btn-primary" type="submit">เพิ่มข้อมูล</button>
        </form>
      </div>
      <!-- Update Form -->
      <div class="edit-form<?php if (!$update) echo ' d-none'; ?>">
        <h4>แก้ไขครุภัณฑ์คอมพิวเตอร์</h4>
        <form method="POST" action="/photak-system/actions/product.php">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_number">หมายเลขครุภัณฑ์</label>
              <input type="text" class="form-control" name="p_number" value="<?php echo $p_number; ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_name">ชื่อครุภัณฑ์</label>
              <input type="text" class="form-control" name="p_name" value="<?php echo $p_name; ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_band">ยี่ห้อ</label>
              <input type="text" class="form-control" name="p_band" value="<?php echo $p_band; ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_serie">รุ่น</label>
              <input type="text" class="form-control" name="p_serie" value="<?php echo $p_serie; ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_detail">รายละเอียด</label>
              <input type="text" class="form-control" name="p_detail" value="<?php echo $p_detail; ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_datein">วันที่รับเข้า</label>
              <input type="date" class="form-control" name="p_datein" value="<?php echo $p_datein; ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_dateout">วันที่จำหน่ายออก</label>
              <input type="date" class="form-control" name="p_dateout" value="<?php echo $p_dateout; ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="ptype_id">ประเภทครุภัณฑ์</label>
              <select class="form-control" name="ptype_id" required>
                <option disabled value="">เลือกประเภทครุภัณฑ์</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM product_type");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>" <?php if ($room_id == $row["id"]) echo 'selected="selected"'; ?>><?php echo $row["ptype_name"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="room_id">ห้อง</label>
              <select class="form-control" name="room_id" required>
                <option disabled value="">เลือกห้อง</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM room");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>" <?php if ($room_id == $row["id"]) echo 'selected="selected"'; ?>><?php echo $row["room_name"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_id">รหัสผู้รับผิดชอบ</label>
              <select class="form-control" name="em_id" required>
                <option disabled value="">เลือกรหัสผู้รับผิดชอบ</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM employee");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>" <?php if ($room_id == $row["id"]) echo 'selected="selected"'; ?>><?php echo $row["em_fname"]; ?> <?php echo $row["em_lname"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label class="pt-0">สถานะ</label>
              <div class="d-flex">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="p_status" value="active" <?php if ($p_status == 'active') echo 'checked="checked"' ?> required>
                  <label class="form-check-label" for="statusRadio1">ใช้งาน</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="p_status" value="inactive" <?php if ($p_status == 'inactive') echo 'checked="checked"' ?> required>
                  <label class="form-check-label" for="statusRadio2">จำหน่ายออก</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label class="pt-0">รูป</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileEdit" name="p_image" value="<?php echo $p_image; ?>" lang="th">
                <label class="custom-file-label edit" for="customFileEdit">เลือกไฟล์</label>
              </div>
              <img id='edit-file-preview' class="img-thumbnail w-50 d-none" src="<?php echo $p_image; ?>" />
            </div>
          </div>
          <input type="hidden" value="update" name="type">
          <a href="/photak-system/pages/product.php" class="btn btn-secondary" type="button">ยกเลิก</a>
          <button id="edit-btn" class="btn btn-primary" type="submit">แก้ไขข้อมูล</button>
        </form>
      </div>
    </main>
    </div>
  </div>
  <?php include '../components/footer-script.php'; ?>
  <script src="/photak-system/assets/js/product-script.js"></script>
</body>

</html>
