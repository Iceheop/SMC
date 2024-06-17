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

  <title>smc [administrador] / Consultar Secretario</title>
  <meta content="pagina principal del administrador" name="description">
  <meta content="dappher studio" name="keywords">

  <?php include('include/style.php')?>  

</head>

<body>

  <!-- preloader -->
  <?php include('../../include/preloader.php')?>
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
          <li class="breadcrumb-item"><a href="consultar_alumnos.html">Consultar Secretario</a></li>
<!--           <li class="breadcrumb-item active">Blank</li> -->
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- carta de bienvenida -->

        <div class="col-lg-12">

          <div class="card">
            <div class="col-lg-2 p-3">
              <button class="btn btn-primary rounded-0"><i class="bi bi-plus-circle-fill"></i></button>
            </div>
            <div class="card-body pt-3 academica">
                <!-- tabla de reportes -->
                <table id="table_academica" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Matricula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Grado Encargado</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          /* buscar la información de los docentes academicos */
                          $query_secretario = mysqli_query($db,"SELECT * FROM infogeneral 
                          INNER JOIN materia ON infogeneral.materia = materia.id
                          INNER JOIN tecnico ON infogeneral.tecnico = tecnico.id
                          INNER JOIN curso ON infogeneral.curso = curso.id
                          INNER JOIN grado ON infogeneral.grado = grado.id
                          INNER JOIN area ON infogeneral.area = area.id WHERE infogeneral.id IN (SELECT matricula FROM usuarios WHERE rol_id = 4)");

                          while ($result_secretario = mysqli_fetch_array($query_secretario)){
                        ?>
                        <tr>
                            <td><?=$result_secretario['matricula']?></td>
                            <td><?=$result_secretario['nombre']?></td>
                            <td><?=$result_secretario['grado']?></td>
                            <td>
                                <div class="btn-group d-flex justify-content-end">
                                    <button class="btn btn-primary rounded-0" id="list_materia"><i class="bi bi-clipboard2-fill"></i></button>
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
        <!-- modal para ampliar los reportes -->
        <div class="modal fade" id="amp_report" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content rounded-0">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
        
                      <!-- Floating Labels Form -->
                      <form class="row g-3">
                        <center><h5>Datos Del Alumno</h5></center>
                        <div class="col-md-12">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="floatingPassword" placeholder="Password" value="001-2023">
                            <label for="floatingPassword">Matricula</label>
                          </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-floating">
                              <input type="text" class="form-control" id="floatingName" placeholder="Your Name" value="Jose Eduardo">
                              <label for="floatingName">Nombre</label>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-floating">
                              <input type="text" class="form-control" id="floatingName" placeholder="Your Name" value="11">
                              <label for="floatingName">#</label>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-floating mb-3">
                              <select class="form-select" id="floatingSelect" aria-label="State">
                                <option selected="">A</option>
                                <option value="1">B</option>
                                <option value="2">C</option>
                              </select>
                              <label for="floatingSelect">Curso</label>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-floating mb-3">
                              <select class="form-select" id="floatingSelect" aria-label="State">
                                <option selected="">3ro</option>
                                <option value="1">4to</option>
                                <option value="2">5to</option>
                              </select>
                              <label for="floatingSelect">Grado</label>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-floating mb-3">
                              <select class="form-select" id="area_tecnica" aria-label="State">
                                <option selected="" value="academica">Academica</option>
                                <option value="tecnica">Tecnica</option>
                              </select>
                              <label for="floatingSelect">Area</label>
                            </div>
                          </div>
                          <div class="col-md-12" id="amp_area_tecnica">
                            <div class="form-floating mb-3">
                              <select class="form-select" id="floatingSelect" aria-label="State">
                                <option selected="" id="">Informatica</option>
                                <option value="1" id="">Mercadeo</option>
                                <option value="1" id="">Tributaria</option>
                                <option value="1" id="">Enfermeria</option>
                              </select>
                              <label for="floatingSelect">Tecnico</label>
                            </div>
                          </div>

                          <div class="amp_add_user" id="amp_add_user">
                            <center><h5>Datos Del Usuario</h5></center>

                            <div class="row g-3">

                              <div class="col-md-12">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="floatingPassword" placeholder="Password" value="001-2023" disabled>
                                  <label for="floatingPassword">Matricula</label>
                                </div>
                              </div>
  
                              <div class="col-md-6">
                                <div class="form-floating">
                                  <input type="email" class="form-control" id="floatingName" placeholder="Your Name" value="Jose Eduardo">
                                  <label for="floatingName">Email</label>
                                </div>
                              </div>
  
                              <div class="col-md-6">
                                <div class="form-floating">
                                  <input type="password" class="form-control" id="floatingName" placeholder="Your Name" value="123456789">
                                  <label for="floatingName">Password</label>
                                </div>
                              </div>

                              <div class="col-md-12">
                                <div class="form-floating mb-3">
                                  <select class="form-select" id="floatingSelect" aria-label="State" disabled>
                                    <option selected="">Alumno</option>
                                    <option value="1">Secretario</option>
                                    <option value="2">Docente</option>
                                  </select>
                                  <label for="floatingSelect">Rol</label>
                                </div>
                              </div>

                            </div>

                          </div>
                            <div class="col-md-12">
                              <button type="" class="btn btn-success rounded-0 form-control" type="submit">Submit</button>
                            </div>
                        </form>
                      <!-- End floating Labels Form -->
                </div>
                <div class="modal-footer">
                  <div class="btn-group">
                    <button type="" class="btn btn-primary rounded-0" id="add_user"><i class="bi bi-person-plus-fill"></i></button>
                    <button type="" class="btn btn-secondary rounded-0" id="dash_user"><i class="bi bi-person-dash-fill"></i></button>
                  </div>
                  </div>
              </div>
            </div>
          </div>
          <!-- End modal insert-->

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

  <?php include('include/script.php')?>

</body>

</html>