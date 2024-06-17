<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php">
      <i class="bi bi-house-fill"></i>
      <span>Inicio</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-heading">acciones</li>

<!--   <li class="nav-item">
    <a class="nav-link collapsed" href="reportes.php">
      <i class="bi bi-exclamation-diamond-fill"></i>
      <div class="d-flex justify-content-end">
        <span>Reportes</span> 
      </div>
    </a>
  </li> -->

<!--   <li class="nav-item">
    <a class="nav-link collapsed" href="informes.php">
      <i class="bi bi-info-circle-fill"></i>
      <span>Informes</span>
    </a>
  </li> -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-folder-fill"></i><span>Consultas</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="consultar_alumnos.php">
          <i class="bi bi-circle-fill"></i><span>Alumnos</span>
        </a>
      </li>
      <li>
        <a href="consultar_docente.php">
          <i class="bi bi-circle-fill"></i><span>Docentes</span>
        </a>
      </li>
      <li>
        <a href="consultar_secretario.php">
          <i class="bi bi-circle-fill"></i><span>Secretarios</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->

</ul>

</aside>