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
      <?php include  '../actions/db-connection.php'; ?>
      <?php
        if (isset($_GET['create'])) {
          $create = true;
          $update = false;
          $add_item = false;
          $edit_item = false;
          if (isset($_GET['add'])) {
            $create = false;
            $update = false;
            $add_item = true;
          }
        }
      ?>
      <?php
        if (isset($_GET['edit'])) {
          $id = $_GET['edit'];
          $update = true;
          $add_item = false;
          $edit_item = true;
          $record = mysqli_query($conn, "SELECT * FROM mat_with WHERE id=$id");

          if (mysqli_num_rows($record) == 1 ) {
            $row = mysqli_fetch_array($record);
            $em_take = $row['em_take'];
            $date_take = date('Y-m-d',strtotime($row['date_take']));
            $mat_with_name = $row['mat_with_name'];
          }
        }
      ?>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h3>รายการใบเบิกวัสดุ</h3>
        <div class="btn-toolbar mb-2 mb-md-0<?php if ($create || $update || $add_item) echo ' d-none'; ?>">
          <form action="/photak-system/pages/mat-with.php?search" method="GET" id="search-form">
            <div class="btn-group mr-2">
              <select class="custom-select" name="type">
                <option selected value="id">รหัส</option>
                <option value="mat_with_name">ชื่อรายการ</option>
                <option value="approve_mw">สถานะ</option>
              </select>
              <input class="form-control" type="text" name="search" placeholder="ค้นหาใบเบิกวัสดุ" aria-label="ค้นหาใบเบิกวัสดุ">
              <button id="search-btn" type="submit" class="btn btn-secondary" form="search-form"><span data-feather="search"></span></button>
            </div>
          </form>
          <a href="/photak-system/pages/mat-with.php?create" type="button" class="btn btn-primary">
            <span data-feather="plus"></span>
            เพิ่มใบเบิกวัสดุ
          </a>
        </div>
      </div>
      <div class="table-responsive<?php if ($create || $update || $add_item || $edit_item) echo ' d-none'; ?>">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>รหัส</th>
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
            <?php
              if (isset($_GET['search'])) {
                $s_type = $_GET['type'];
                $value = $_GET['search'];
                $s_sql = "SELECT *, mat_with.id FROM mat_with WHERE $s_type LIKE '%$value%'";
                $s_result = mysqli_query($conn, $s_sql);
                if (mysqli_num_rows($s_result) > 0) {
                  while($s_row = mysqli_fetch_array($s_result)) {
            ?>
              <tr id="<?php echo $s_row["id"]; ?>">
                <td><?php echo $s_row["id"]; ?></td>
                <td>
                <?php
                  $em_id = $s_row["em_take"];
                  $emt_record = mysqli_query($conn, "SELECT * FROM employee WHERE id=$em_id");

                  if (mysqli_num_rows($emt_record) == 1 ) {
                    $rowEm = mysqli_fetch_array($emt_record);
                    $em_fname = $rowEm['em_fname'];
                    $em_lname = $rowEm['em_lname'];
                  }
                  echo $em_fname." ".$em_lname;
                ?>
                </td>
                <td><?php echo $s_row["date_take"]; ?></td>
                <td><?php echo $s_row["mat_with_name"]; ?></td>
                <td>
                <?php
                  $ema_id = $s_row["em_approver"];
                  if ($ema_id) {
                    $ema_record = mysqli_query($conn, "SELECT * FROM employee WHERE id=$ema_id");

                    if (mysqli_num_rows($ema_record) == 1 ) {
                      $rowEma = mysqli_fetch_array($ema_record);
                      $ema_fname = $rowEma['em_fname'];
                      $ema_lname = $rowEma['em_lname'];
                    }
                    echo $ema_fname." ".$ema_lname;
                  }
                ?>
                </td>
                <td><?php echo $s_row["date_approve"]; ?></td>
                <td><?php echo $s_row["approve_mw"]; ?></td>
                <td class="d-flex">
                  <a
                    href="/photak-system/pages/mat-with.php?edit=<?php echo $s_row["id"]; ?>"
                    type="button"
                    class="btn btn-sm btn-info edit-btn<?php if($s_row["approve_mw"]) echo ' d-none'; ?>"
                  >
                    <span data-feather="edit-2"></span>
                  </a>
                  <form method="POST" action="/photak-system/actions/mat-with.php" class="<?php if($s_row["approve_mw"]) echo ' d-none'; ?>">
                    <input type="hidden" name="id" value="<?php echo $s_row["id"]; ?>">
                    <input type="hidden" name="type" value="delete">
                    <button
                      type="submit"
                      class="btn btn-sm btn-danger"
                      onClick="javascript: return confirm('ยืนยันการลบข้อมูล <?php echo $s_row["posi_name"]; ?>');"
                    >
                      <span data-feather="trash-2"></span>
                    </button>
                  </form>
                </td>
              </tr>
              <?php
                  }
                } else {
              ?>
              <tr>
                <td colspan="8" class="text-center">
                  <span>ไม่พบข้อมูล</span>
                </td>
              </tr>
              <?php
                }
              } else {
            ?>
            <?php
              $result = mysqli_query($conn,"SELECT * FROM mat_with");
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
            ?>
            <tr id="<?php echo $row["id"]; ?>">
              <td><?php echo $row["id"]; ?></td>
              <td>
              <?php
                $em_id = $row["em_take"];
                $emt_record = mysqli_query($conn, "SELECT * FROM employee WHERE id=$em_id");

                if (mysqli_num_rows($emt_record) == 1 ) {
                  $rowEm = mysqli_fetch_array($emt_record);
                  $em_fname = $rowEm['em_fname'];
                  $em_lname = $rowEm['em_lname'];
                }
                echo $em_fname." ".$em_lname;
              ?>
              </td>
              <td><?php echo $row["date_take"]; ?></td>
              <td><?php echo $row["mat_with_name"]; ?></td>
              <td>
              <?php
                $ema_id = $row["em_approver"];
                if ($ema_id) {
                  $ema_record = mysqli_query($conn, "SELECT * FROM employee WHERE id=$ema_id");

                  if (mysqli_num_rows($ema_record) == 1 ) {
                    $rowEma = mysqli_fetch_array($ema_record);
                    $ema_fname = $rowEma['em_fname'];
                    $ema_lname = $rowEma['em_lname'];
                  }
                  echo $ema_fname." ".$ema_lname;
                }
              ?>
              </td>
              <td><?php echo $row["date_approve"]; ?></td>
              <td><?php echo $row["approve_mw"]; ?></td>
              <td class="d-flex">
                <a
                  href="/photak-system/pages/mat-with.php?edit=<?php echo $row["id"]; ?>"
                  type="button"
                  class="btn btn-sm btn-info edit-btn<?php if($row["approve_mw"]) echo ' d-none'; ?>"
                >
                  <span data-feather="edit-2"></span>
                </a>
                <form method="POST" action="/photak-system/actions/mat-with.php" class="<?php if($row["approve_mw"]) echo ' d-none'; ?>">
                  <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                  <input type="hidden" name="type" value="delete">
                  <button
                    type="submit"
                    class="btn btn-sm btn-danger"
                    onClick="javascript: return confirm('ยืนยันการลบข้อมูล <?php echo $row["posi_name"]; ?>');"
                  >
                    <span data-feather="trash-2"></span>
                  </button>
                </form>
              </td>
            </tr>
            <?php
                }
              } else {
            ?>
            <tr>
              <td colspan="8" class="text-center">
                <span>ไม่พบข้อมูล</span>
              </td>
            </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- Create Form -->
      <div class="create-form">
        <h4 class="<?php if (!$create) echo 'd-none'; ?>">เพิ่มใบเบิกวัสดุ</h4>
        <h4 class="<?php if (!$add_item) echo 'd-none'; ?>">เพิ่มวัสดุ</h4>
        <form method="POST" action="/photak-system/actions/mat-with.php" id="create" class="<?php if (!$create) echo 'd-none'; ?>">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group row">
                <label for="mat_with_name" class="col-sm-2 col-form-label">รายการ</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="mat_with_name" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="date_take" class="col-sm-2 col-form-label">วันที่แจ้ง</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="date_take" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="em_take" class="col-sm-2 col-form-label">ผู้ขอเบิก</label>
                <div class="col-sm-10">
                  <select class="form-control" name="em_take"required>
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
            </div>
          </div>
          <input type="hidden" name="type" value="create">
          <a href="/photak-system/pages/mat-with.php" class="btn btn-secondary" type="button">ยกเลิก</a>
          <button id="save-btn" class="btn btn-primary" type="submit" from="create">ถัดไป</button>
        </form>
        <form action="/photak-system/actions/mat-with-detail.php" method="POST" id="add-item" class="<?php if (!$add_item) echo 'd-none'; ?>">
          <div class="form-row">
            <div class="col">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="mat_id">รายการ</label>
                </div>
                <select class="custom-select" name="mat_id" required>
                  <option selected disabled value="">เลือกวัสดุคอมพิวเตอร์</option>
                  <?php
                    $result = mysqli_query($conn,"SELECT * FROM material");
                    if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php echo $row["id"]; ?>"><?php echo $row["mat_name"]; ?></option>
                  <?php
                      }
                    }
                  ?>
                </select>
                <div class="input-group-prepend">
                  <label class="input-group-text" for="quantity">จำนวน</label>
                </div>
                <input type="number" class="form-control" name="quantity" required>
                <div class="input-group-append" id="add-mat-btn">
                  <?php $mat_wit_id =(int)$_GET['add']; ?>
                  <input type="hidden" name="mat_with_id" value="<?php echo $mat_wit_id; ?>">
                  <input type="hidden" name="type" value="add-item">
                  <button class="btn btn-primary" type="submit" from="add-item"><span data-feather="plus"></span></button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="form-row<?php if (!$add_item) echo ' d-none'; ?>">
          <div class="col">
            <a href="/photak-system/pages/mat-with.php" class="btn btn-primary" type="button">ตกลง</a>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>รายการ</th>
                  <th>จำนวน</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php

                  $result = mysqli_query($conn,"SELECT *, mat_with_detail.id FROM mat_with_detail INNER JOIN material ON mat_with_detail.mat_id=material.id WHERE mat_with_detail.mat_with_id=$mat_wit_id");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <tr id="<?php echo $row["id"]; ?>">
                  <td><?php echo $row["mat_name"]; ?></td>
                  <td><?php echo $row["quantity"]; ?></td>
                  <td class="d-flex">
                    <form method="POST" action="/photak-system/actions/mat-with-detail.php">
                      <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                      <input type="hidden" name="mat_wit_id" value="<?php echo $mat_wit_id; ?>">
                      <input type="hidden" name="type" value="delete">
                      <button
                        type="submit"
                        class="btn btn-sm btn-danger"
                        onClick="javascript: return confirm('ยืนยันการลบข้อมูล <?php echo $row["posi_name"]; ?>');"
                      >
                        <span data-feather="trash-2"></span>
                      </button>
                    </form>
                  </td>
                </tr>
                <?php
                    }
                  } else {
                ?>
                <tr>
                  <td colspan="8" class="text-center">
                    <span>ไม่พบข้อมูล</span>
                  </td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Update Form -->
      <div class="edit-mat-with-form<?php if (!$update) echo ' d-none'; ?>">
        <h4>แก้ไขใบเบิกวัสดุ</h4>
        <form method="POST" action="/photak-system/actions/mat-with.php" id="update" class="<?php if (!$update) echo 'd-none'; ?>">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group row">
                <label for="mat_with_name" class="col-sm-2 col-form-label">รายการ</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="mat_with_name" value="<?php echo $mat_with_name; ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="date_take" class="col-sm-2 col-form-label">วันที่แจ้ง</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="date_take" value="<?php echo $date_take; ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="em_take" class="col-sm-2 col-form-label">ผู้ขอเบิก</label>
                <div class="col-sm-10">
                  <select class="form-control" name="em_take"required>
                    <option selected value="">เลือกผู้ขอเบิก</option>
                    <?php
                      $result = mysqli_query($conn,"SELECT * FROM employee");
                      if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row["id"]; ?>" <?php if ($em_take == $row["id"]) echo 'selected="selected"'; ?>><?php echo $row["em_fname"]; ?></option>
                    <?php
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="type" value="update">
          <a href="/photak-system/pages/mat-with.php" class="btn btn-secondary" type="button">ยกเลิก</a>
          <button id="save-btn" class="btn btn-primary" type="submit" from="update">แก้ไขข้อมูล</button>
        </form>
        <form action="/photak-system/actions/mat-with-detail.php" method="POST" id="edit-item">
          <div class="form-row">
            <div class="col">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="mat_id">รายการ</label>
                </div>
                <select class="custom-select" name="mat_id" required>
                  <option selected disabled value="">เลือกวัสดุคอมพิวเตอร์</option>
                  <?php
                    $result = mysqli_query($conn,"SELECT * FROM material");
                    if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php echo $row["id"]; ?>"><?php echo $row["mat_name"]; ?></option>
                  <?php
                      }
                    }
                  ?>
                </select>
                <div class="input-group-prepend">
                  <label class="input-group-text" for="quantity">จำนวน</label>
                </div>
                <input type="number" class="form-control" name="quantity" required>
                <div class="input-group-append" id="add-mat-btn">
                  <?php $mat_wit_id =(int)$_GET['edit']; ?>
                  <input type="hidden" name="mat_with_id" value="<?php echo $mat_wit_id; ?>">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <input type="hidden" name="type" value="edit-item">
                  <button class="btn btn-primary" type="submit" from="edit-item"><span data-feather="plus"></span></button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="form-row">
          <div class="col">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>รายการ</th>
                  <th>จำนวน</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php

                  $result = mysqli_query($conn,"SELECT *, mat_with_detail.id FROM mat_with_detail INNER JOIN material ON mat_with_detail.mat_id=material.id WHERE mat_with_detail.mat_with_id=$mat_wit_id");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <tr id="<?php echo $row["id"]; ?>">
                  <td><?php echo $row["mat_name"]; ?></td>
                  <td><?php echo $row["quantity"]; ?></td>
                  <td class="d-flex">
                    <form method="POST" action="/photak-system/actions/mat-with-detail.php">
                      <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                      <input type="hidden" name="mat_wit_id" value="<?php echo $mat_wit_id; ?>">
                      <input type="hidden" name="table" value="edit">
                      <input type="hidden" name="type" value="delete">
                      <button
                        type="submit"
                        class="btn btn-sm btn-danger"
                        onClick="javascript: return confirm('ยืนยันการลบข้อมูล <?php echo $row["posi_name"]; ?>');"
                      >
                        <span data-feather="trash-2"></span>
                      </button>
                    </form>
                  </td>
                </tr>
                <?php
                    }
                  } else {
                ?>
                <tr>
                  <td colspan="8" class="text-center">
                    <span>ไม่พบข้อมูล</span>
                  </td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
    </div>
  </div>
  <?php include '../components/footer-script.php'; ?>
</body>

</html>
