<?php
/* Includes Principales */
include_once('../../other/session.php');
include_once('../../db/db.php');
include_once('../../coverage/coverage.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>[administrador]</title>
  <meta content="pagina principal del administrador" name="description">
  <meta content="dappher studio" name="keywords">
  <!-- estilos -->
  <?php include('include/style.php') ?>
</head>
<body>
  <!-- preloader -->
  <?php include('../../include/preloader.php') ?>
  <!-- end preloader -->
  <!-- ======= Header ======= -->
  <?php include('include/header.php') ?>
  <!-- End Header -->
  <!-- ======= Sidebar ======= -->
  <?php include('include/sidebar.php') ?>
  <!-- End Sidebar-->
  <!-- Funcion select -->
  <?php include_once('function/select.php') ?>

  <main id="main" class="main">

    <!-- Page Title -->
    <div class="pagetitle">
      <h1>Inicio</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active"><a href="consultar_alumnos.php">Consultar Alumnos</a></li>
          <!--           <li class="breadcrumb-item active">Blank</li> -->
        </ol>
      </nav>
    </div>

    <!-- tabla Alumno -->
    <section class="section dashboard">
      <div class="row">
        <!-- carta de bienvenida -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body pt-3 academica">
              <div class="col-md pb-4">
                <button id="add_alumno" class="add_alumno btn btn-primary btn-sm rounded-1">
                  <i class="bi bi-plus-lg"></i> Añadir Alumno
                </button>
              </div>
              <!-- tabla de reportes -->
              <table id="table_academica" class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Matricula</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Curso</th>
                    <th scope="col">tecnico</th>
                    <th scope="col">Accion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  /* buscar la información de los docentes academicos */
                  $query_alumno_tecnico = mysqli_query($db, "SELECT *,infogeneral.id AS infoId FROM infogeneral 
                          INNER JOIN materia ON infogeneral.materia = materia.id
                          INNER JOIN tecnico ON infogeneral.tecnico = tecnico.id
                          INNER JOIN curso ON infogeneral.curso = curso.id
                          INNER JOIN grado ON infogeneral.grado = grado.id
                          INNER JOIN area ON infogeneral.area = area.id WHERE infogeneral.id IN (SELECT matricula FROM usuarios WHERE rol_id = 3)");

                  while ($result_alumno_tecnico = mysqli_fetch_array($query_alumno_tecnico)) {
                  ?>
                    <tr>
                      <th scope="col"><?= $result_alumno_tecnico['no_orden'] ?></th>
                      <td><?= $result_alumno_tecnico['matricula'] ?></td>
                      <td><?= $result_alumno_tecnico['nombre'] ?></td>
                      <td><?= $result_alumno_tecnico['grado'] . " " . $result_alumno_tecnico['curso'] ?></td>
                      <td><?= $result_alumno_tecnico['tecnico'] ?></td>
                      <td>
                        <div class="btn-group rounded-1 d-flex justify-content-evenly">
                          <button class="edit_alumno btn btn-success" id="<?= $result_alumno_tecnico['infoId'] ?>"><i class="bi bi-pen-fill"></i></button>
                          <button class="see_alumno btn btn-primary" id="<?= $result_alumno_tecnico['infoId'] ?>"><i class="bi bi-clipboard2-fill"></i></button>
                          <button class="delete_alumno btn btn-danger" id="<?= $result_alumno_tecnico['infoId'] ?>"><i class="bi bi-trash-fill"></i></button>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- fin tabla de reportes -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- toast notification añadir -->
    <div class="toast-container position-fixed bottom-0 end-0 p-4">

      <div id="notification" class="toast align-items-center border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body">
            <i class="bi bi-check-circle-fill text-success pe-2"></i> Accion realizada con éxito
          </div>
          <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>

    </div>

    <!-- Modal añadir alumno-->
    <div class="modal fade" id="añadirAlumnoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header border border-0">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Añadir Alumno</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="formAñadirAlumno" class="row g-3">
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="Nombre" name="nombre" placeholder="Nombre" required>
                  <label for="Nombre">Nombre</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="number" class="form-control" id="Matricula" name="matricula" placeholder="Matricula" required>
                  <label for="Matricula">Matricula</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="password" class="form-control" id="Password" name="password" placeholder="Contraseña" required>
                  <label for="Password">Contraseña</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="number" class="form-control" id="Numero" name="numero" placeholder="Matricula" required>
                  <label for="Numero">Numero de orden</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating mb-3">
                  <select class="form-select" id="Area" name="area" aria-label="State">
                    <?php obtenerOpciones("area", "area", "DESC") ?>
                  </select>
                  <label for="Aria">Area</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating mb-3">
                  <select class="form-select" id="Curso" name="curso" aria-label="State">
                    <?php obtenerOpciones("curso", "curso", "ASC") ?>
                  </select>
                  <label for="Curso">Curso</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating mb-3">
                  <select class="form-select" id="Grado" name="grado" aria-label="State">
                    <?php obtenerOpciones("grado", "grado", "ASC") ?>
                  </select>
                  <label for="Grado">Grado</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating mb-3">
                  <select class="form-select" id="Tecnico" name="tecnico" aria-label="State">
                    <?php obtenerOpciones("tecnico", "tecnico", "ASC") ?>
                  </select>
                  <label for="Tecnico">Tecnico</label>
                </div>
              </div>
              <div class="modal-footer border border-0 text-end">
                <button type="submit" class="btn btn-primary rounded-1 btn-delete-alumno">Enviar formulario</button>
                <button type="reset" class="btn btn-secondary rounded-1">Limpiar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Editar alumno-->
    <div class="modal fade" id="editarAlumnoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Añadir Alumno</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="formAñadirAlumno" class="row g-3">
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="Nombre" name="nombre" placeholder="Nombre" required>
                  <label for="Nombre">Nombre</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="number" class="form-control" id="Matricula" name="matricula" placeholder="Matricula" required>
                  <label for="Matricula">Matricula</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="password" class="form-control" id="Password" name="password" placeholder="Contraseña" required>
                  <label for="Password">Contraseña</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="number" class="form-control" id="Numero" name="numero" placeholder="Matricula" required>
                  <label for="Numero">Numero de orden</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating mb-3">
                  <select class="form-select" id="Area" name="area" aria-label="State">
                    <?php obtenerOpciones("area", "area", "DESC") ?>
                  </select>
                  <label for="Aria">Area</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating mb-3">
                  <select class="form-select" id="Curso" name="curso" aria-label="State">
                    <?php obtenerOpciones("curso", "curso", "ASC") ?>
                  </select>
                  <label for="Curso">Curso</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating mb-3">
                  <select class="form-select" id="Grado" name="grado" aria-label="State">
                    <?php obtenerOpciones("grado", "grado", "ASC") ?>
                  </select>
                  <label for="Grado">Grado</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating mb-3">
                  <select class="form-select" id="Tecnico" name="tecnico" aria-label="State">
                    <?php obtenerOpciones("tecnico", "tecnico", "ASC") ?>
                  </select>
                  <label for="Tecnico">Tecnico</label>
                </div>
              </div>
              <div class="text-end">
                <button type="submit" class="btn btn-primary btn-delete-alumno">Enviar formulario</button>
                <button type="reset" class="btn btn-secondary">Limpiar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal elimnianr alumno-->
    <div class="modal fade" id="eliminarAlumnoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content rounded-1 border border-0">
          <div class="modal-header border border-0">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar Alumno</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>¿Esta seguro que quiere eliminar al alumno?</p>
          </div>
          <div class="modal-footer border border-0">
            <button type="button" class="btn btn-secondary btn-sm rounded-1" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary btn-sm rounded-1 btn-delete-alumno">Sí, acepto</button>
          </div>
        </div>
      </div>
    </div>


  </main>

  <!-- footer -->
  <?php include('include/footer.php') ?>
  <!-- Scripts generales -->
  <?php include('include/script.php') ?>
  <!-- Action Script js -->
  <script src="./js/action.js"></script>

</body>

</html>