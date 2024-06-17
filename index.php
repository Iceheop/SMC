<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>smc / Login</title>
  <meta content="login del programa (smc)" name="description">
  <meta content="dappher studio" name="keywords">

  <!-- Favicons -->
  <link href="" rel="icon">
  

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="app/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="app/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="app/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="app/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="app/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="app/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="app/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="app/assets/css/style.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="node_modules/jquery/dist/jquery.js"></script>

  <!-- sweet alert -->
  <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-1">
              </div><!-- End Logo -->

              <div class="card mb-5">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Inicia seción con tu cuenta</h5>
                    <p class="text-center small">Inserta su matricula y tu contraseña para iniciar seción.</p>
                  </div>

                  <form class="row g-3" id="loginform">

                    <div class="col-12">
                      <label for="matricula" class="form-label">Matricula</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                        <input type="number" name="matricula" class="form-control" id="matricula" required>
                        <div class="invalid-feedback">Porfavor inserte su matricula.</div>
                      </div>
                    </div>

<!--                     <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@Example.com</span>
                        <input type="email" name="email" class="form-control" id="email" required>
                        <div class="invalid-feedback">Porfavor inserte su email.</div>
                      </div>
                    </div> -->

                    <div class="col-12">
                      <label for="password" class="form-label">Contraseña</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Porfavor inserte su contraseña!</div>
                    </div>

                    <input type="hidden" name="validation" id="validation" value="validation">

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Inisia seción</button>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main>
  <!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="app/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="app/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="app/assets/vendor/chart.js/chart.min.js"></script>
  <script src="app/assets/vendor/echarts/echarts.min.js"></script>
  <script src="app/assets/vendor/quill/quill.min.js"></script>
  <script src="app/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="app/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="app/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="app/assets/js/main.js"></script>

  <!-- me script -->
  <script src="app/validation/validation.js"></script>

</body>

</html>