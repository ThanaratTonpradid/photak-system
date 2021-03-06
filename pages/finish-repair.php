<?php include '../actions/session.php'; ?>
<?php
  if (!$finishRepairPage) {
    header("location: /photak-system/pages/no-permission.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>บันทึกใบแจ้งซ่อม - ระบบแจ้งซ่อมครุภัณฑ์คอมพิวเตอร์</title>
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

          $id = $_GET['create'];
          $record = mysqli_query($conn, "SELECT * FROM notify_repair WHERE id=$id");

          if (mysqli_num_rows($record) == 1 ) {
            $row = mysqli_fetch_array($record);
            $p_id = $row['p_id'];
            $nr_datenotifi = date('Y-m-d',strtotime($row['nr_datenotifi']));
            $nr_detail1 = $row['nr_detail1'];
            $nr_approve = $row['nr_approve'];
            $em_order = $row['em_order'];
            $em_approver = $row['em_approver'];
            $em_repair = $row['em_repair'];
          }
        }
      ?>
      <?php
        if (isset($_GET['edit'])) {
          $id = $_GET['edit'];
          $update = true;
          $record = mysqli_query($conn, "SELECT * FROM notify_repair WHERE id=$id");

          if (mysqli_num_rows($record) == 1 ) {
            $row = mysqli_fetch_array($record);
            $p_id = $row['p_id'];
            $nr_datenotifi = date('Y-m-d',strtotime($row['nr_datenotifi']));
            $nr_detail1 = $row['nr_detail1'];
            $nr_approve = $row['nr_approve'];
            $em_order = $row['em_order'];
            $em_approver = $row['em_approver'];
            $em_repair = $row['em_repair'];
            $nr_detail3 = $row['nr_detail3'];
            $nr_successfull = date('Y-m-d',strtotime($row['nr_successfull']));
          }
        }
      ?>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h3>รายการใบแจ้งซ่อม</h3>
      </div>
      <div class="table-responsive<?php if ($create || $update) echo ' d-none'; ?>">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>รหัส</th>
              <th>หมายเลขครุภัณฑ์</th>
              <th>รายละเอียดแจ้งซ่อม</th>
              <th>วันที่แจ้ง</th>
              <th>ผู้แจ้ง</th>
              <th>สถานะการซ่อม</th>
              <th>ผลการอนุมัติ</th>
              <th>ผู้อนุมัติ</th>
              <th>ผู้รับผิดชอบ</th>
              <th>รายละเอียดแจ้งซ่อม</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $result = mysqli_query($conn,"SELECT *, notify_repair.id FROM notify_repair INNER JOIN product ON notify_repair.p_id=product.id INNER JOIN employee ON notify_repair.em_order=employee.id");
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
            ?>
            <tr id="<?php echo $row["id"]; ?>">
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["p_number"]; ?></td>
              <td><?php echo $row["nr_detail1"]; ?></td>
              <td><?php echo $row["nr_datenotifi"]; ?></td>
              <td><?php echo $row["em_fname"]; ?> <?php echo $row["em_lname"]; ?></td>
              <td><?php echo $row["nr_status"]; ?></td>
              <td><?php echo $row["nr_approve"]; ?></td>
              <td>
              <?php
                if ($row["em_approver"]) {
                  $em_id = $row["em_approver"];
                  $emt_record = mysqli_query($conn, "SELECT * FROM employee WHERE id=$em_id");

                  if (mysqli_num_rows($emt_record) == 1 ) {
                    $rowEm = mysqli_fetch_array($emt_record);
                    $em_fname = $rowEm['em_fname'];
                    $em_lname = $rowEm['em_lname'];
                  }
                  echo $em_fname." ".$em_lname;
                }
              ?>
              </td>
              <td>
              <?php
                if ($row["em_repair"]) {
                  $emr_id = $row["em_repair"];
                  $emr_record = mysqli_query($conn, "SELECT * FROM employee WHERE id=$emr_id");

                  if (mysqli_num_rows($emr_record) == 1 ) {
                    $rowEmr = mysqli_fetch_array($emr_record);
                    $emr_fname = $rowEmr['em_fname'];
                    $emr_lname = $rowEmr['em_lname'];
                  }
                  echo $emr_fname." ".$emr_lname;
                }
              ?>
              </td>
              <td><?php echo $row["nr_detail3"]; ?></td>
              <td class="d-flex">
                <a
                  href="/photak-system/pages/finish-repair.php?edit=<?php echo $row["id"]; ?>"
                  type="button"
                  class="btn btn-sm btn-info edit-btn"
                >
                  <span data-feather="edit-2"></span>แก้ไข
                </a>
                <a
                  href="/photak-system/pages/finish-repair.php?create=<?php echo $row["id"]; ?>"
                  type="button"
                  class="btn btn-sm btn-primary edit-btn<?php echo $row['nr_status'] !== 'สำเร็จ' ? '' : ' d-none';?>"
                >
                  <span data-feather="check"></span>บันทึกการซ่อม
                </a>
              </td>
            </tr>
            <?php
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
        <h4>บันทึกใบแจ้งซ่อม</h4>
        <form method="POST" action="/photak-system/actions/finish-repair.php">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_id">หมายเลขครุภัณฑ์</label>
              <select class="form-control" name="p_id" disabled readonly>
                <option disabled value="">เลือกครุภัณฑ์</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM product");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>" <?php if ($p_id == $row["id"]) echo 'selected="selected"'; ?>><?php echo $row["p_number"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="nr_datenotifi">วันที่แจ้ง</label>
              <input type="date" class="form-control" name="nr_datenotifi" value="<?php echo $nr_datenotifi; ?>" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="nr_detail1">รายละเอียด</label>
              <textarea class="form-control" name="nr_detail1" rows="3" readonly><?php echo $nr_detail1; ?></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_order">ผู้แจ้ง</label>
              <select class="form-control" name="em_order" disabled readonly>
                <option selected value="">เลือกผู้แจ้ง</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM employee");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>" <?php if ($em_order == $row["id"]) echo 'selected="selected"'; ?>><?php echo $row["em_fname"]; ?> <?php echo $row["em_lname"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="nr_approve" value="อนุมัติ" <?php if ($nr_approve == 'อนุมัติ') echo 'checked="checked"' ?> disabled readonly>
                <label class="form-check-label" for="nr_approve">อนุมัติ</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="nr_approve" value="ไม่อนุมัติ" <?php if ($nr_approve == 'ไม่อนุมัติ') echo 'checked="checked"' ?> disabled readonly>
                <label class="form-check-label" for="nr_approve">ไม่อนุมัติ</label>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_approver">ผู้อนุมัติ</label>
              <select class="form-control" name="em_approver" disabled readonly>
                <option selected value="">เลือกผู้อนุมัติ</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM employee");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>" <?php if ($em_approver == $row["id"]) echo 'selected="selected"'; ?>><?php echo $row["em_fname"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_repair">ผู้ซ่อม</label>
              <select class="form-control" name="em_repair" disabled readonly>
                <option selected value="">เลือกผู้ซ่อม</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM employee");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>" <?php if ($em_repair == $row["id"]) echo 'selected="selected"'; ?>><?php echo $row["em_fname"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="nr_detail3">รายละเอียดการซ่อม</label>
              <textarea class="form-control" name="nr_detail3" rows="3" required></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="nr_successfull">วันที่ซ่อม</label>
              <input type="date" class="form-control" name="nr_successfull" required>
            </div>
          </div>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" value="complete" name="type">
          <a href="/photak-system/pages/finish-repair.php" class="btn btn-secondary" type="button">ยกเลิก</a>
          <button id="save-btn" class="btn btn-primary" type="submit">บันทึก</button>
        </form>
      </div>
      <!-- Update Form -->
      <div class="edit-form<?php if (!$update) echo ' d-none'; ?>">
        <h4>แก้ไขการบันทึกใบแจ้งซ่อม</h4>
        <form method="POST" action="/photak-system/actions/finish-repair.php">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_id">หมายเลขครุภัณฑ์</label>
              <select class="form-control" name="p_id" disabled readonly>
                <option disabled value="">เลือกครุภัณฑ์</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM product");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>" <?php if ($p_id == $row["id"]) echo 'selected="selected"'; ?>><?php echo $row["p_number"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="nr_datenotifi">วันที่แจ้ง</label>
              <input type="date" class="form-control" name="nr_datenotifi" value="<?php echo $nr_datenotifi; ?>" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="nr_detail1">รายละเอียด</label>
              <textarea class="form-control" name="nr_detail1" rows="3" readonly><?php echo $nr_detail1; ?></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_order">ผู้แจ้ง</label>
              <select class="form-control" name="em_order" disabled readonly>
                <option selected value="">เลือกผู้แจ้ง</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM employee");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>" <?php if ($em_order == $row["id"]) echo 'selected="selected"'; ?>><?php echo $row["em_fname"]; ?> <?php echo $row["em_lname"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="nr_approve" value="อนุมัติ" <?php if ($nr_approve == 'อนุมัติ') echo 'checked="checked"' ?> disabled readonly>
                <label class="form-check-label" for="nr_approve">อนุมัติ</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="nr_approve" value="ไม่อนุมัติ" <?php if ($nr_approve == 'ไม่อนุมัติ') echo 'checked="checked"' ?> disabled readonly>
                <label class="form-check-label" for="nr_approve">ไม่อนุมัติ</label>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_approver">ผู้อนุมัติ</label>
              <select class="form-control" name="em_approver" disabled readonly>
                <option selected value="">เลือกผู้อนุมัติ</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM employee");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>" <?php if ($em_approver == $row["id"]) echo 'selected="selected"'; ?>><?php echo $row["em_fname"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_repair">ผู้ซ่อม</label>
              <select class="form-control" name="em_repair" disabled readonly>
                <option selected value="">เลือกผู้ซ่อม</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM employee");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>" <?php if ($em_repair == $row["id"]) echo 'selected="selected"'; ?>><?php echo $row["em_fname"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="nr_detail3">รายละเอียดการซ่อม</label>
              <textarea class="form-control" name="nr_detail3" rows="3" required><?php echo $nr_detail3; ?></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="nr_successfull">วันที่ซ่อม</label>
              <input type="date" class="form-control" name="nr_successfull" value="<?php echo $nr_successfull; ?>" required>
            </div>
          </div>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" value="update" name="type">
          <a href="/photak-system/pages/finish-repair.php" class="btn btn-secondary" type="button">ยกเลิก</a>
          <button id="edit-btn" class="btn btn-primary" type="submit">แก้ไขข้อมูล</button>
        </form>
      </div>
    </main>
    </div>
  </div>
  <?php include '../components/footer-script.php'; ?>
</body>

</html>
