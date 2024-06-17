<?php 
include_once('../../other/session.php'); 
include_once('../../db/db.php');
include_once('../../coverage/coverage.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>smc [administrador] / Consultar Docente</title>
  <meta content="pagina principal del administrador" name="description">
  <meta content="dappher studio" name="keywords">

  <?php include('include/style.php')?>  

</head>

<body>

  <!-- preloader -->
  <?php /* include('../../include/preloader.php') */?>
  <!-- end preloader -->
  
  <!-- ======= Header ======= -->
  <?php include('include/header.php')?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include('include/sidebar.php')?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Inicio</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
          <li class="breadcrumb-item"><a href="consultar_alumnos.html">Consultar Docente</a></li>
<!--           <li class="breadcrumb-item active">Blank</li> -->
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- carta de bienvenida -->

        <div class="col-lg-12">

          <div class="card">

            <div class="col-md" style="padding-top: 15px; padding-left: 19px;">
              <button id="add_docente" class="btn btn-primary rounded-0"><i class="bi bi-plus-circle-fill"></i></button>
            </div>

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Area</h6>
                </li>

                <li><a class="dropdown-item" href="#" id="academica">Academica</a></li>
                <li><a class="dropdown-item" href="#" id="tecnica">Tecnica</a></li>
              </ul>
            </div>

            <div class="card-body pt-3 docente_academica">
                <!-- tabla de reportes -->
                <table id="table_docente_academico" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Matricula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Area</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        /* buscar la información de los docentes academicos */
                        $query_docente_academico = mysqli_query($db,"SELECT * FROM infogeneral 
                        INNER JOIN materia ON infogeneral.materia = materia.id
                        INNER JOIN area ON infogeneral.area = area.id WHERE infogeneral.id IN (SELECT matricula FROM usuarios WHERE rol_id = 2)");

                        while ($result_docente_academico = mysqli_fetch_array($query_docente_academico)){
                      ?>
                        <tr>
                            <td><?=$result_docente_academico['matricula']?></td>
                            <td><?=$result_docente_academico['nombre']?></td>
                            <td><?=$result_docente_academico['materia']?></td>
                            <td><?=$result_docente_academico['area']?></td>
                            <td>
                                <div class="btn-group d-flex justify-content-end">
                                    <button class="btn btn-success rounded-0" id="see_report"><i class="bi bi-pen-fill"></i></button>
                                    <button class="btn btn-danger rounded-0" id="delete_report"><i class="bi bi-trash-fill"></i></button>
                                </div>
                            </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                </table>
                <!-- fin tabla de reportes -->
            </div>

            <div class="card-body pt-3 docente_tecnica">
              <!-- tabla de reportes -->
              <table id="table_docente_tecnico" class="table table-striped">
                  <thead>
                      <tr>
                          <th scope="col">Matricula</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">tecnico</th>
                          <th scope="col">Accion</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        /* buscar la información de los docentes academicos */
                        $query_docente_tecnico = mysqli_query($db,"SELECT * FROM infogeneral 
                        INNER JOIN materia ON infogeneral.materia = materia.id
                        INNER JOIN tecnico ON infogeneral.tecnico = tecnico.id
                        INNER JOIN area ON infogeneral.area = area.id WHERE infogeneral.id IN (SELECT matricula FROM usuarios WHERE rol_id = 6)");

                        while ($result_docente_tecnico = mysqli_fetch_array($query_docente_tecnico)){
                      ?>
                      <tr>
                          <td><?=$result_docente_tecnico['matricula']?></td>
                          <td><?=$result_docente_tecnico['nombre']?></td>
                          <td><?=$result_docente_tecnico['tecnico']?></td>
                          <td>
                              <div class="btn-group d-flex justify-content-end">
                                  <button class="btn btn-primary rounded-0" id="see_report"><i class="bi bi-clipboard2-fill"></i></button>
                                  <button class="btn btn-success rounded-0" id="see_report"><i class="bi bi-pen-fill"></i></button>
                                  <button class="btn btn-danger rounded-0" id="delete_report"><i class="bi bi-trash-fill"></i></button>
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

    <section>

          <!-- Modal select add docente -->
          <div class="modal fade" id="select_add_docente_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content rounded-0">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar docente</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                  <h5>Hola! administrador [ <b class="text-primary"><?=$result['nombre']?></b> ].</h5>
                  <h5>¿Qué tipo de docente quiere agregar, docente academico o docente tecnico?</h5>
                </div>
                <div class="modal-footer">
                    <button id="add_docente_academico" class="btn btn-primary rounded-0">Docente academico</button>
                    <button id="add_docente_tecnico" class="btn btn-primary rounded-0">Docente tecnico</button>
                  </div>
              </div>
            </div>
          </div>
          <!-- End modal select add docente -->

          <!-- Modal add docente academico -->
          <div class="modal fade" id="add_docente_academico_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content rounded-0">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar docente academico</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="row g-3">
                  <!-- matricula -->
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="number" class="form-control" id="matricula_docente_academico" placeholder="Matricula">
                      <label for="matricula">Matricula</label>
                    </div>
                  </div>
                  <!-- nombre -->
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="nombre_docente_academico" placeholder="Nombre">
                      <label for="nombr_docente_academicoe">Nombre</label>
                    </div>
                  </div>
                  <!-- email -->
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input type="email" class="form-control" id="email_docente_academico" placeholder="Email">
                      <label for="email_docente_academico">Email</label>
                    </div>
                  </div>
                  <!-- contaseña -->
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input type="password" class="form-control" id="password_docente_academico" placeholder="Contraseña">
                      <label for="password_docente_academico">Contraseña</label>
                    </div>
                  </div>
                  <!-- materia -->
                  <div class="col-md-12">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" aria-label="State">
                        <option selected="">Academica</option>
                        <option value="1">Tecnica</option>
                      </select>
                      <label for="floatingSelect">Area</label>
                    </div>
                  </div>
                  <!-- area -->
                  <div class="col-md-12">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" aria-label="State">
                        <option selected="">Lengua española</option>
                        <option value="1">Matemática</option>
                        <option value="2">Ciencias sociales</option>
                        <option value="3">Ciencias naturales</option>
                      </select>
                      <label for="floatingSelect">Materia</label>
                    </div>
                  </div>

                  <div class="text-center">
                    <div class="row">
                      <div class="col-md">
                        <button type="reset" class="btn btn-danger rounded-0 form-control"><i class="bi bi-x-circle-fill"></i></button>
                      </div>
                      <div class="col-md">
                        <button id="send_add_docente_academico" class="btn btn-primary rounded-0 form-control"><i class="bi bi-send-fill"></i></button>
                      </div>
                    </div>
                  </div>
                </form>
                </div>

              </div>
            </div>
          </div>
          <!-- End modal add docente academico-->

          <!-- Modal add docente tecnico -->
          <div class="modal fade" id="add_docente_tecnico_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content rounded-0">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar docente tecnico</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="row g-3">
                  <!-- matricula -->
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="number" class="form-control" id="matricula_docente_academico" placeholder="Matricula">
                      <label for="matricula">Matricula</label>
                    </div>
                  </div>
                  <!-- nombre -->
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="nombre_docente_academico" placeholder="Nombre">
                      <label for="nombr_docente_academicoe">Nombre</label>
                    </div>
                  </div>
                  <!-- email -->
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input type="email" class="form-control" id="email_docente_academico" placeholder="Email">
                      <label for="email_docente_academico">Email</label>
                    </div>
                  </div>
                  <!-- contaseña -->
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input type="password" class="form-control" id="password_docente_academico" placeholder="Contraseña">
                      <label for="password_docente_academico">Contraseña</label>
                    </div>
                  </div>
                  <!-- tecnico -->
                  <div class="col-md-12">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" aria-label="State">
                        <option selected="">Informatica</option>
                        <option value="1">Enfermeria</option>
                        <option value="2">Mercadeo</option>
                        <option value="3">Tributaria</option>
                      </select>
                      <label for="floatingSelect">tecnico</label>
                    </div>
                  </div>
                  <!-- materia tecnica -->
                  <div class="col-md-12">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" aria-label="State">
                        <option selected="">Academica</option>
                        <option value="1">Tecnica</option>
                      </select>
                      <label for="floatingSelect">Area</label>
                    </div>
                  </div>
                  <!-- area -->
                  <div class="col-md-12">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" aria-label="State">
                        <option selected="">Lengua española</option>
                        <option value="1">Matemática</option>
                        <option value="2">Ciencias sociales</option>
                        <option value="3">Ciencias naturales</option>
                      </select>
                      <label for="floatingSelect">Materia tecnica</label>
                    </div>
                  </div>

                  <div class="text-center">
                    <div class="row">
                      <div class="col-md">
                        <button type="reset" class="btn btn-danger rounded-0 form-control"><i class="bi bi-x-circle-fill"></i></button>
                      </div>
                      <div class="col-md">
                        <button id="send_add_docente_tecnico" class="btn btn-primary rounded-0 form-control"><i class="bi bi-send-fill"></i></button>
                      </div>
                    </div>
                  </div>
                </form>
                </div>

              </div>
            </div>
          </div>
          <!-- End modal add docente academico-->

          <!-- Modal eliminar -->
          <div class="modal fade" id="amp_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content rounded-0">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Alumno</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>¿Seguro que quieres eliminar este alumno?</p>
                </div>
                <div class="modal-footer">
                    <button type="" class="btn btn-primary rounded-0" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="" class="btn btn-danger rounded-0" data-bs-dismiss="modal" aria-label="Close">Ok</button>
                  </div>
              </div>
            </div>
          </div>
          <!-- End modal Eliminar -->

          <!-- Modal eliminar -->
          <div class="modal fade" id="amp_materia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content rounded-0">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active" aria-current="true" disabled>
                      <center><h5>Notas</h5></center>
                      <center>Materias Academicas</center>
                    </button>
                    <button type="button" class="list-group-item list-group-item-action" id="nota_materias">Matematica</button>
                    <button type="button" class="list-group-item list-group-item-action">Lengua Española</button>
                    <button type="button" class="list-group-item list-group-item-action">Naturales</button>
                    <button type="button" class="list-group-item list-group-item-action">Sociales</button>
                  </div>

                  <div class="list-group pt-3">
                    <button type="button" class="btn btn-success rounded-0" aria-current="true" id="nota_general">
                      <center><h5>Notas</h5></center>
                      <center>Generales</center>
                    </button>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <!-- End modal Eliminar -->

          <!-- Modal eliminar -->
          <div class="modal fade" id="amp_notas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content rounded-0">
                          <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <h6>nabsdhagdhashdgashdbashd</h6>
                          </div>
                        </div>
                      </div>
          </div>
          <!-- End modal Eliminar -->

          <!-- Modal eliminar -->
          <div class="modal fade" id="amp_nota_materia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content rounded-0">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <form class="row g-3">
                    <div class="col-md-2 pt-2">
                      <button class="btn btn-primary rounded-0"><i class="bi bi-plus-circle-fill"></i></button>
                    </div>
                    <div class="col-md-10">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="Your Name" value="001-2023" disabled>
                        <label for="floatingName">Matricula</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">

                        <div class="form-floating">
                          <input type="email" class="form-control" id="floatingEmail" placeholder="Your Email" value="100" disabled>
                          <label for="floatingEmail">Nov-Ene</label>
                        </div>

                        <div class="pt-2">
                          <button class="btn btn-success rounded-0 form-control "><i class="bi bi-pen-fill"></i></button>
                        </div>

                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">

                        <div class="form-floating">
                          <input type="email" class="form-control" id="floatingEmail" placeholder="Your Email" value="97" disabled>
                          <label for="floatingEmail">Ene-Mar</label>
                        </div>

                        <div class="pt-2">
                          <button class="btn btn-success rounded-0 form-control "><i class="bi bi-pen-fill"></i></button>
                        </div>

                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">

                        <div class="form-floating">
                          <input type="email" class="form-control" id="floatingEmail" placeholder="Your Email" value="95" disabled>
                          <label for="floatingEmail">Mar-May</label>
                        </div>

                        <div class="pt-2">
                          <button class="btn btn-success rounded-0 form-control "><i class="bi bi-pen-fill"></i></button>
                        </div>

                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">

                        <div class="form-floating">
                          <input type="email" class="form-control" id="floatingEmail" placeholder="Your Email" value="100" disabled>
                          <label for="floatingEmail">May-Jul</label>
                        </div>

                        <div class="pt-2">
                          <button class="btn btn-success rounded-0 form-control "><i class="bi bi-pen-fill"></i></button>
                        </div>

                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">

                        <div class="form-floating">
                          <input type="email" class="form-control" id="floatingEmail" placeholder="Your Email" value="100" disabled>
                          <label for="floatingEmail">Calificacion Final</label>
                        </div>

                      </div>
                    </div>
                  </form>

                </div>
                <div class="modal-footer">
                  <div class="tex-center">
                    <button class="btn btn-danger form-control">reportar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End modal Eliminar -->

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('include/footer.php')?>
  <!-- End Footer -->

  <!-- script docente -->
  <script src="js/docente.js"></script>
  <?php include('include/script.php')?>

</body>

</html>