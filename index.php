<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SGC</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <style>
      body {
        background-color: #262626;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .login-card {
        max-width: 400px;
        width: 100%;
        padding: 30px;
        border-radius: 16px;
        background-color: #1f1f1f;
        box-shadow: 0 4px 20px rgba(0,0,0,0.5);
        color: #fff;
      }
      .login-card img {
        max-height: 120px;
        margin-bottom: 20px;
      }
      .btn-custom {
        background-color: #a90000;
        color: #fff;
      }
      .btn-custom:hover {
        background-color: #8c0000;
      }
    </style>
  </head>

  <body>
    <div class="login-card text-center">
      <h4 class="mb-4">INICIAR SESIÓN</h4>
      <form id="form-login">
        <img src="IMG/logo_nuevo.png" alt="Centro Médico Familiar" class="img-fluid">
        
        <div class="mb-3 mt-3">
          <input type="text" class="form-control" id="un" placeholder="Usuario" required autocomplete="off">
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" id="up" placeholder="Contraseña" required autocomplete="off">
        </div>
        <div class="mb-4">
          <select name="tipo" id="tipo" class="form-select">
            <option value="1">Doctor</option>
            <option value="2">Enfernera/o</option>
          </select>
        </div>

        <!-- Botón con ícono -->
        <div class="d-grid">
          <button type="submit" name="log" class="btn btn-custom">
            <i class="bi bi-box-arrow-in-right"></i> Ingresar
          </button>
        </div>

        <div class="mt-3">
          <a href="Indicaciones_para_contraseña_segura.php" class="text-info">¿Cómo crear contraseñas seguras?</a>
        </div>
      </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-1.12.3.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/regis.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="assets/js/Alertas_Animadas.js"></script>
  </body>
</html>