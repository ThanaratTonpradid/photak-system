<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" id="home-menu" href="/index.php">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="setting-menu" role="button" data-toggle="collapse" data-target="#setting-submenu" aria-expanded="true" aria-controls="setting-submenu">
          <span data-feather="settings"></span>
          ตั้งค่าระบบ
        </a>
        <ul class="nav flex-column ml-5 collapse" id="setting-submenu" aria-labelledby="setting-menu" data-parent="#sidebarMenu">
          <li class="nav-item">
            <a id="position-page" class="nav-link" href="/pages/position.php">
              จัดการต่ำแหน่งผู้ใช้งาน
            </a>
          </li>
          <li class="nav-item">
            <a id="department-page" class="nav-link" href="/pages/department.php">
              จัดการแผนก
            </a>
          </li>
          <li class="nav-item">
            <a id="employee-page" class="nav-link" href="/pages/employee.php">
              จัดการผู้ใช้งาน
            </a>
          </li>
          <li class="nav-item">
            <a id="building-page" class="nav-link" href="/pages/building.php">
              จัดการอาคาร
            </a>
          </li>
          <li class="nav-item">
            <a id="room-page" class="nav-link" href="/pages/room.php">
              จัดการห้อง
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="product-menu" role="button" data-toggle="collapse" data-target="#product-submenu" aria-expanded="false" aria-controls="product-submenu">
          <span data-feather="shopping-cart"></span>
          ระบบจัดการวัสดุ-ครุภัณฑ์
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="repair-menu" role="button" data-toggle="collapse" data-target="#repair-submenu" aria-expanded="false" aria-controls="repair-submenu">
          <span data-feather="users"></span>
          ระบบแจ้งซ่อม
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="material-menu" role="button" data-toggle="collapse" data-target="#material-submenu" aria-expanded="false" aria-controls="material-submenu">
          <span data-feather="bar-chart-2"></span>
          ระบบเบิกวัสดุ
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="report-menu" role="button" data-toggle="collapse" data-target="#report-submenu" aria-expanded="false" aria-controls="report-submenu">
          <span data-feather="layers"></span>
          ระบบรายงาน
        </a>
      </li>
    </ul>
  </div>
</nav>
