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

  <title>smc [administrador] / Inicio</title>
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
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- carta de bienvenida -->

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <br><br><br>
              <center>
                <h4 class=""><b>Bienvenid@ administrador [ <span class="text-primary"><?=$result['nombre']?></span> ]</b></h4>
                <p>al [smc] Sistema De Manejo De Calificaciones.</p>
              </center>
              <br><br>
            </div>
          </div>

        </div>

        <!-- contadores de alumnos, docentes, secretarios -->

        <?php include_once('function/count.php')?>
        <?php include_once('function/porcentage.php')?>

        <div class="col-md-4">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Estudiates <span>| Totales</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-person-fill"></i>
                </div>
                <div class="ps-3">
                  <h6><?php contar("infogeneral","3")?></h6>
                  <span class="text-success small pt-1 fw-bold"><?php porcent(contar("infogeneral","3"))?>%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-md-4">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Docentes <span>| Totales</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-person-fill"></i>
                </div>
                <div class="ps-3">
                  <h6><?php contar("infogeneral","2")?></h6>
                  <span class="text-success small pt-1 fw-bold"><?php porcent(contar("infogeneral","2"))?>%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-md-4">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">secretarios <span>| Totales</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-person-fill"></i>
                </div>
                <div class="ps-3">
                  <h6><?php contar("infogeneral","4")?></h6>
                  <span class="text-success small pt-1 fw-bold"><?php porcent(contar("infogeneral","4"))?>%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Graficos -->
        <div class="col-md-12">
          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">Alumnos resagados <span>| Generales</span></h5>

                <!-- grafico general -->
                  <div id="trafficChart" style="min-height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" class="echart" _echarts_instance_="ec_1680916138044"><div style="position: relative; width: 462px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="462" height="400" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; transition: opacity 0.2s cubic-bezier(0.23, 1, 0.32, 1) 0s, visibility 0.2s cubic-bezier(0.23, 1, 0.32, 1) 0s, transform 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgb(255, 255, 255); border-width: 1px; border-radius: 4px; color: rgb(102, 102, 102); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 10px; top: 0px; left: 0px; transform: translate3d(-78px, 128px, 0px); border-color: rgb(84, 112, 198); pointer-events: none; visibility: hidden; opacity: 0;">
                    <div style="margin: 0px 0 0;line-height:1;">
                      <div style="font-size:14px;color:#666;font-weight:400;line-height:1;">Access From</div>
                        <div style="margin: 10px 0 0;line-height:1;"><div style="margin: 0px 0 0;line-height:1;">
                          <span style="display:inline-block;margin-right:4px;border-radius:10px;width:10px;height:10px;background-color:#5470c6;"></span>
                            <span style="font-size:14px;color:#666;font-weight:400;margin-left:2px">Search Engine</span>
                              <span style="float:right;margin-left:20px;font-size:14px;color:#666;font-weight:900">1,048</span>
                                <div style="clear:both"></div></div><div style="clear:both">
                              </div>
                            </div>
                          <div style="clear:both">
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- End grafico general -->

            </div>
          </div>
        </div>
        
      </div>
    </section>

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('include/footer.php')?>
  <!-- End Footer -->

  <?php include('include/script.php')?>

</body>

</html>