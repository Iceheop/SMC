<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <img src="" alt="">
    <span class="d-none d-lg-block">smc</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div>

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
    <!-- <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-exclamation-diamond-fill"></i>
        <span class="badge bg-primary badge-number">4</span>
      </a>

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
          You have 4 new notifications
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-exclamation-circle text-warning"></i>
          <div>
            <h4>Lorem Ipsum</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>30 min. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-x-circle text-danger"></i>
          <div>
            <h4>Atque rerum nesciunt</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>1 hr. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-check-circle text-success"></i>
          <div>
            <h4>Sit rerum fuga</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>2 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-info-circle text-primary"></i>
          <div>
            <h4>Dicta reprehenderit</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>4 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>
        <li class="dropdown-footer">
          <a href="#">Show all notifications</a>
        </li>

      </ul>


    </li> -->


    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
<!--         <img src="../../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
        <span class="d-none d-md-block dropdown-toggle ps-2"><?=$result['nombre']?></span>
        
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?=$result['nombre']?></h6>
          <span class="d-none d-md-block">Matricula: [ <?=$result['matricula']?> ]</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

<!--         <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-person-fill"></i>
            <span>perfil</span>
          </a>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li> -->

<!--         <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-gear-fill"></i>
            <span>Configuración</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li> -->

        <li>
          <a class="dropdown-item d-flex align-items-center" href="../../other/closet.php">
            <i class="bi bi-backspace-fill"></i>
            <span>Cerrar sección</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header>