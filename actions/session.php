<?php
   include 'db-connection.php';
   session_start();

   $user_check = $_SESSION['login_user'];
   $permission = $_SESSION['permission'];

   $sql = "SELECT `em_user`, `em_group` FROM `employee` WHERE `em_user`='$user_check'";
   $ses_sql = mysqli_query($conn,$sql);

   $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

   $login_session = $row['em_user'];
   $permission = $row['em_group'];

   if(!isset($_SESSION['login_user'])){
      header("location: /photak-system/login.php");
      die();
   }
?>
<?php
  $positionPage = false;
  $departmentPage = false;
  $employeePage = false;
  $buildingPage = false;
  $roomPage = false;

  $matTypePage = false;
  $matPage = false;
  $proTypePage = false;
  $proPage = false;

  $notiRepairPage = false;
  $approveRepairPage = false;
  $assignRepairPage = false;
  $finishRepairPage = false;

  $matWithPage = false;
  $matWithApprovePage = false;

  $productReportPage = false;
  $productHistoryReportPage = false;
  $productRepairReportPage = false;
  $productInactiveReportPage = false;
  $matWithReportPage = false;
  $matUseReportPage = false;
  $matWithApproveReportPage = false;

  if ($permission === 'dev') {
    $positionPage = true;
    $departmentPage = true;
    $employeePage = true;
    $buildingPage = true;
    $roomPage = true;

    $matTypePage = true;
    $matPage = true;
    $proTypePage = true;
    $proPage = true;

    $notiRepairPage = true;
    $approveRepairPage = true;
    $assignRepairPage = true;
    $finishRepairPage = true;

    $matWithPage = true;
    $matWithApprovePage = true;

    $productReportPage = false;
    $productHistoryReportPage = false;
    $productRepairReportPage = false;
    $productInactiveReportPage = false;
    $matWithReportPage = false;
    $matUseReportPage = false;
    $matWithApproveReportPage = false;
  }

  if ($permission === 'admin') {
    $positionPage = true;
    $departmentPage = true;
    $employeePage = true;
    $buildingPage = true;
    $roomPage = true;
  }
  if ($permission === 'user') {
    $employeePage = true;
    $notiRepairPage = true;
  }
  if ($permission === 'manager') {
    $matTypePage = true;
    $matPage = true;
    $proTypePage = true;
    $proPage = true;

    $notiRepairPage = true;
    $approveRepairPage = true;
    $assignRepairPage = true;

    $matWithPage = true;
    $matWithApprovePage = true;
  }
  if ($permission === 'maintainer') {
    $notiRepairPage = true;
    $finishRepairPage = true;

    $matWithPage = true;
    $matWithApprovePage = true;
  }
?>
