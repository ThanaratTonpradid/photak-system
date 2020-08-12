<?php include '../actions/session.php'; ?>
<?php
  if (!$matTypePage) {
    header("location: /photak-system/pages/no-permission.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>ประเภทวัสดุคอมพิวเตอร์ - ระบบแจ้งซ่อมครุภัณฑ์คอมพิวเตอร์</title>
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
          $record = mysqli_query($conn, "SELECT * FROM material_type WHERE id=$id");

          if (mysqli_num_rows($record) == 1 ) {
            $row = mysqli_fetch_array($record);
            $mtype_name = $row['mtype_name'];
          }
        }
      ?>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h3>รายการประเภทวัสดุคอมพิวเตอร์</h3>
        <a href="/photak-system/pages/material-type.php?create" type="button" class="btn btn-primary<?php if ($create || $update) echo ' d-none'; ?>">
          <span data-feather="plus"></span>
          เพิ่มข้อมูล
        </a>
      </div>
      <div class="table-responsive<?php if ($create || $update) echo ' d-none'; ?>">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>รหัส</th>
              <th>ชื่อประเภทวัสดุคอมพิวเตอร์</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $result = mysqli_query($conn,"SELECT * FROM material_type");
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
            ?>
            <tr id="<?php echo $row["id"]; ?>">
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["mtype_name"]; ?></td>
              <td class="d-flex">
                <a
                  href="/photak-system/pages/material-type.php?edit=<?php echo $row["id"]; ?>"
                  type="button"
                  class="btn btn-sm btn-info edit-btn"
                >
                  <span data-feather="edit-2">
                </a>
                <form method="POST" action="/photak-system/actions/material-type.php">
                  <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                  <input type="hidden" name="type" value="delete">
                  <button
                    type="submit"
                    class="btn btn-sm btn-danger"
                    onClick="javascript: return confirm('ยืนยันการลบข้อมูล <?php echo $row["mtype_name"]; ?>');"
                  >
                    <span data-feather="trash-2">
                  </button>
                </form>
              </td>
            </tr>
            <?php
                }
              } else {
            ?>
            <tr>
              <td colspan="3" class="text-center">
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
        <h4>เพิ่มประเภทวัสดุคอมพิวเตอร์</h4>
        <form method="POST" action="/photak-system/actions/material-type.php">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="mtype_name">ชื่อประเภทวัสดุคอมพิวเตอร์</label>
              <input type="text" class="form-control" name="mtype_name" required>
            </div>
          </div>
          <input type="hidden" value="create" name="type">
          <a href="/photak-system/pages/material-type.php" class="btn btn-secondary" type="button">ยกเลิก</a>
          <button id="save-btn" class="btn btn-primary" type="submit">เพิ่มข้อมูล</button>
        </form>
      </div>
      <!-- Update Form -->
      <div class="edit-form<?php if (!$update) echo ' d-none'; ?>">
        <h4>แก้ไขประเภทวัสดุคอมพิวเตอร์</h4>
        <form method="POST" action="/photak-system/actions/material-type.php">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="mtype_name">ชื่อประเภทวัสดุคอมพิวเตอร์</label>
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="text" class="form-control" name="mtype_name" value="<?php echo $mtype_name; ?>" required>
            </div>
          </div>
          <input type="hidden" value="update" name="type">
          <a href="/photak-system/pages/material-type.php" class="btn btn-secondary" type="button">ยกเลิก</a>
          <button id="edit-btn" class="btn btn-primary" type="submit">แก้ไขข้อมูล</button>
        </form>
      </div>
    </main>
    </div>
  </div>
  <?php include '../components/footer-script.php'; ?>
</body>

</html>
