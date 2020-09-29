<?php include '../actions/session.php'; ?>
<?php
  if (!$notiRepairPage) {
    header("location: /photak-system/pages/no-permission.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>จัดการใบแจ้งซ่อม - ระบบแจ้งซ่อมครุภัณฑ์คอมพิวเตอร์</title>
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
          $record = mysqli_query($conn, "SELECT * FROM notify_repair WHERE id=$id");

          if (mysqli_num_rows($record) == 1 ) {
            $row = mysqli_fetch_array($record);
            $p_id = $row['p_id'];
            $nr_datenotifi = date('Y-m-d',strtotime($row['nr_datenotifi']));
            $nr_detail1 = $row['nr_detail1'];
            $em_order = $row['em_order'];
            $nr_images = $row['nr_images'];
          }
        }
      ?>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h3>รายการใบแจ้งซ่อม</h3>
        <div class="btn-toolbar mb-2 mb-md-0<?php if ($create || $update) echo ' d-none'; ?>">
          <div id="search-form" class="btn-group mr-2">
            <input class="form-control" type="text" placeholder="ค้นหาใบแจ้งซ่อม" aria-label="ค้นหาใบแจ้งซ่อม">
            <button id="search-btn" type="button" class="btn btn-secondary"><span data-feather="search"></span></button>
          </div>
          <a href="/photak-system/pages/notify-repair.php?create" type="button" class="btn btn-primary<?php if ($create || $update) echo ' d-none'; ?>">
            <span data-feather="plus"></span>
            เพิ่มข้อมูล
          </a>
        </div>
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
              <td class="d-flex">
                <a
                  href="/photak-system/pages/notify-repair.php?edit=<?php echo $row["id"]; ?>"
                  type="button"
                  class="btn btn-sm btn-info edit-btn"
                >
                  <span data-feather="edit-2"></span>แก้ไข
                </a>
                <form method="POST" action="/photak-system/actions/notify-repair.php" class="<?php echo $approveRepairPage ? '' : 'd-none'; ?>">
                  <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                  <input type="hidden" name="type" value="delete">
                  <button
                    type="submit"
                    class="btn btn-sm btn-danger"
                    onClick="javascript: return confirm('ยืนยันการลบข้อมูล');"
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
              <td colspan="7" class="text-center">
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
        <h4>เพิ่มใบแจ้งซ่อม</h4>
        <form method="POST" action="/photak-system/actions/notify-repair.php">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="p_id">หมายเลขครุภัณฑ์</label>
              <select class="form-control" name="p_id" required>
                <option selected disabled value="">เลือกครุภัณฑ์</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM product");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>"><?php echo $row["p_number"]; ?></option>
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
              <input type="date" class="form-control" name="nr_datenotifi" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="detailStart">รายละเอียด</label>
              <textarea class="form-control" rows="3" name="nr_detail1" required></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_order">ผู้แจ้ง</label>
              <select class="form-control" name="em_order" required>
                <option selected disabled value="">เลือกผู้แจ้ง</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM employee");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>"><?php echo $row["em_fname"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label class="pt-0">รูปภาพ</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="nr_images" name="nr_images" lang="th">
                <label class="custom-file-label create" for="nr_images">เลือกไฟล์</label>
              </div>
              <img id='create-file-preview' class="img-thumbnail w-50 d-none" />
            </div>
          </div>
          <input type="hidden" value="create" name="type">
          <a href="/photak-system/pages/notify-repair.php" class="btn btn-secondary" type="button">ยกเลิก</a>
          <button id="save-btn" class="btn btn-primary" type="submit">เพิ่มข้อมูล</button>
        </form>
      </div>
      <!-- Update Form -->
      <div class="edit-form<?php if (!$update) echo ' d-none'; ?>">
        <h4>แก้ไขใบแจ้งซ่อม</h4>
        <form method="POST" action="/photak-system/actions/notify-repair.php">
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="p_id">หมายเลขครุภัณฑ์</label>
            <select class="form-control" name="p_id" required>
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
              <input type="date" class="form-control" name="nr_datenotifi" value="<?php echo $nr_datenotifi; ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="nr_detail1">รายละเอียด</label>
              <textarea class="form-control" name="nr_detail1" rows="3" required><?php echo $nr_detail1; ?></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="em_order">ผู้แจ้ง</label>
              <select class="form-control" name="em_order" required>
                <option selected value="">เลือกผู้แจ้ง</option>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM employee");
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["id"]; ?>" <?php if ($em_order == $row["id"]) echo 'selected="selected"'; ?>><?php echo $row["em_fname"]; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label class="pt-0">รูปภาพ</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileEdit" name="nr_images" value="<?php echo $nr_images; ?>" lang="th">
                <label class="custom-file-label edit" for="customFileEdit">เลือกไฟล์</label>
              </div>
              <img id='edit-file-preview' class="img-thumbnail w-50 d-none" />
            </div>
          </div>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" value="update" name="type">
          <a href="/photak-system/pages/notify-repair.php" class="btn btn-secondary" type="button">ยกเลิก</a>
          <button id="edit-btn" class="btn btn-primary" type="submit">แก้ไขข้อมูล</button>
        </form>
      </div>
    </main>
    </div>
  </div>
  <?php include '../components/footer-script.php'; ?>
  <script src="/photak-system/assets/js/notify-repair-script.js"></script>
</body>

</html>
