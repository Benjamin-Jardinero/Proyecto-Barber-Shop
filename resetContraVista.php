<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>

    <main class="main-container container">
      <div>
        <h1 class="titulo">Restablecer contraseña</h1>
      </div>
    </main>

    <section class="container seccion-container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

            <div class="mb-3 div-correo">
              <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-envelope i-color"></i> Correo Electronico</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@gmail.com" name="correoReset2">
            </div>

            <div class="mb-3 div-password">
              <label for="exampleInputPassword1" class="form-label"><i class="fa-solid fa-key i-color"></i> Contraseña nueva</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password" name="passwordNueva">
            </div>

            <div class="mb-3 div-password">
              <label for="exampleInputPassword1" class="form-label"><i class="fa-solid fa-key i-color"></i> Confirmar Contraseña</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password" name="passwordNew">
            </div>
    
            <div class="mb-3 div-btn">
              <button type="submit" class="btn btn-ingresar" name="resetPassword">Cambiar</button>
            </div>

          </form>
    </section>

    <script src="https://kit.fontawesome.com/ffb39b6180.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>

<?php
  include("resetContras.php");
?>