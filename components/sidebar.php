<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" id="home-menu" href="/photak-system/index.php">
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
            <a id="position-page" class="nav-link" href="/photak-system/pages/position.php">
              จัดการต่ำแหน่งผู้ใช้งาน
            </a>
          </li>
          <li class="nav-item">
            <a id="department-page" class="nav-link" href="/photak-system/pages/department.php">
              จัดการแผนก
            </a>
          </li>
          <li class="nav-item">
            <a id="employee-page" class="nav-link" href="/photak-system/pages/employee.php">
              จัดการผู้ใช้งาน
            </a>
          </li>
          <li class="nav-item">
            <a id="building-page" class="nav-link" href="/photak-system/pages/building.php">
              จัดการอาคาร
            </a>
          </li>
          <li class="nav-item">
            <a id="room-page" class="nav-link" href="/photak-system/pages/room.php">
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
        <ul class="nav flex-column ml-5 collapse" id="product-submenu" aria-labelledby="product-menu" data-parent="#sidebarMenu">
          <li class="nav-item">
            <a id="material-type-page" class="nav-link" href="/photak-system/pages/material-type.php">
              ประเภทวัสดุคอมพิวเตอร์
            </a>
          </li>
          <li class="nav-item">
            <a id="product-type-page" class="nav-link" href="/photak-system/pages/product-type.php">
              ประเภทครุภัณฑ์คอมพิวเตอร์
            </a>
          </li>
          <li class="nav-item">
            <a id="material-page" class="nav-link" href="/photak-system/pages/material.php">
              จัดการวัสดุคอมพิวเตอร์
            </a>
          </li>
          <li class="nav-item">
            <a id="product-page" class="nav-link" href="/photak-system/pages/product.php">
              จัดการครุภัณฑ์คอมพิวเตอร์
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="repair-menu" role="button" data-toggle="collapse" data-target="#repair-submenu" aria-expanded="false" aria-controls="repair-submenu">
          <span data-feather="users"></span>
          ระบบแจ้งซ่อม
        </a>
        <ul class="nav flex-column ml-5 collapse" id="repair-submenu" aria-labelledby="repair-menu" data-parent="#sidebarMenu">
          <li class="nav-item">
            <a id="notify-repair-page" class="nav-link" href="/photak-system/pages/notify-repair.php">
              จัดการใบแจ้งซ่อม
            </a>
          </li>
          <li class="nav-item">
            <a id="approve-repair-page" class="nav-link" href="/photak-system/pages/approve-repair.php">
              อนุมัติใบแจ้งซ่อม
            </a>
          </li>
          <li class="nav-item">
            <a id="assign-repair-page" class="nav-link" href="/photak-system/pages/assign-repair.php">
              กำหนดผู้รับผิดชอบใบแจ้งซ่อม
            </a>
          </li>
          <li class="nav-item">
            <a id="finish-repair-page" class="nav-link" href="/photak-system/pages/finish-repair.php">
              บันทึกใบแจ้งซ่อม
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="material-menu" role="button" data-toggle="collapse" data-target="#material-submenu" aria-expanded="false" aria-controls="material-submenu">
          <span data-feather="bar-chart-2"></span>
          ระบบเบิกวัสดุ
        </a>
        <ul class="nav flex-column ml-5 collapse" id="material-submenu" aria-labelledby="material-menu" data-parent="#sidebarMenu">
          <li class="nav-item">
            <a id="mat-with-page" class="nav-link" href="/photak-system/pages/mat-with.php">
              ใบเบิกวัสดุ
            </a>
          </li>
          <li class="nav-item">
            <a id="mat-with-approve-page" class="nav-link" href="/photak-system/pages/mat-with-approve.php">
              อนุมัติใบเบิกวัสดุ
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="report-menu" role="button" data-toggle="collapse" data-target="#report-submenu" aria-expanded="false" aria-controls="report-submenu">
          <span data-feather="layers"></span>
          ระบบรายงาน
        </a>
        <ul class="nav flex-column ml-5 collapse" id="report-submenu" aria-labelledby="report-menu" data-parent="#sidebarMenu">
          <li class="nav-item">
            <a id="product-report-page" class="nav-link" href="/photak-system/pages/product-report.php">
              รายงานทะเบียนครุภัณฑ์
            </a>
          </li>
          <li class="nav-item">
            <a id="product-history-report-page" class="nav-link" href="/photak-system/pages/product-history-report.php">
              รายงานประวัติครุภัณฑ์
            </a>
          </li>
          <li class="nav-item">
            <a id="product-repair-report-page" class="nav-link" href="/photak-system/pages/product-repair-report.php">
              รายงานแจ้งซ่อมครุภัณฑ์
            </a>
          </li>
          <li class="nav-item">
            <a id="product-inactive-report-page" class="nav-link" href="/photak-system/pages/product-inactive-report.php">
              รายงานจำหน่ายซ่อมครุภัณฑ์
            </a>
          </li>
          <li class="nav-item">
            <a id="mat-with-report-page" class="nav-link" href="/photak-system/pages/mat-with-report.php">
              รายงานการเบิกวัสดุ
            </a>
          </li>
          <li class="nav-item">
            <a id="mat-use-report-page" class="nav-link" href="/photak-system/pages/mat-use-report.php">
              รายงานใช้วัสดุ
            </a>
          </li>
          <li class="nav-item">
            <a id="mat-with-approve-report-page" class="nav-link" href="/photak-system/pages/mat-with-approve-report.php">
              รายงานอนุมัติการเบิกวัสดุ
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
