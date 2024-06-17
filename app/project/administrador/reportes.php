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

  <title>smc [administrador] / reportes</title>
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
          <li class="breadcrumb-item"><a href="reportes.html">Reportes</a></li>
<!--           <li class="breadcrumb-item active">Blank</li> -->
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- carta de bienvenida -->

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body pt-3">
                <!-- tabla de reportes -->
                <table id="table_reporte" class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">Roportante</th>
                            <th scope="col">Reportado</th>
                            <th scope="col">Asunto</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                              $query = mysqli_query($db,"SELECT * FROM reportes");
                              while ($result = mysqli_fetch_array($query)){
                            ?>
                              <tr>
                                  <td><?=$result['matricula_r']?></td>
                                  <td class="text-danger"><?=$result['matricula_d']?></td>
                                  <td><?=$result['reporte']?></td>
                                  <td><?=$result['fecha']?></td>
                                  <td>
                                      <div class="btn-group d-flex justify-content-end">
                                          <button class="btn btn-success rounded-0 edit_report" id="<?=$result['id']?>"><i class="bi bi-clipboard2-fill"></i></button>
                                          <button class="btn btn-danger rounded-0 delete_report" id="<?=$result['id']?>"><i class="bi bi-trash-fill"></i></button>
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
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Reporte</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
        
                      <!-- Floating Labels Form -->
                      <form class="row g-3">
                        <div class="col-md-6">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="matricula_r" placeholder="Your Email" value="" disabled>
                            <label for="matricula_r">Matricula del reportante</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="matricula_d" placeholder="Password" value="" disabled>
                            <label for="matricula_d">Matricula del reportado</label>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="matricula_a" placeholder="Password" value="" disabled>
                            <label for="matricula_a">Matricula del Alumno</label>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" id="nota" placeholder="Your Name" value="" disabled>
                              <label for="nota">Calificacion</label>
                            </div>
                          </div>
                        <div class="col-12">
                          <div class="form-floating">
                            <textarea class="form-control" placeholder="Address" id="reporte" style="height: 200px;" disabled>
                            </textarea>
                            <label for="floatingTextarea">Nota</label>
                          </div>
                        </div>
                      </form><!-- End floating Labels Form -->
                </div>
                <div class="modal-footer">
                    <button type="" class="btn btn-primary rounded-0" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-sticky-fill"></i></button>
                    <button type="" class="btn btn-success rounded-0" data-bs-dismiss="modal" aria-label="Close">Ok</button>
                  </div>
              </div>
            </div>
          </div>
          <!-- End modal insert-->

          <!-- Modal eliminar -->
          <div class="modal fade" id="amp_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Reporte</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>¿Seguro que quieres eliminar el reporte?</p>
                </div>
                <div class="modal-footer">
                    <button type="" class="btn btn-primary rounded-0" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="" class="btn btn-danger rounded-0 delete_report_button" data-bs-dismiss="modal" aria-label="Close" id="">Ok</button>
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