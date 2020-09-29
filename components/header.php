<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="/photak-system/index.php">ORNS</a>
  <ul class="nav px-3">
    <li class="nav-item dropdown">
      <a
        class="nav-link dropdown-toggle text-light"
        data-toggle="dropdown"
        href="#" role="button"
        aria-haspopup="true"
        aria-expanded="false"
      >
        <span data-feather="user"></span>
        <?php echo $login_session; ?>
      </a>
      <div class="dropdown-menu dropdown-menu-sm-right">
        <a class="dropdown-item" href="/photak-system/logout.php">ออกจากระบบ</a>
      </div>
    </li>
  </ul>
</nav>
