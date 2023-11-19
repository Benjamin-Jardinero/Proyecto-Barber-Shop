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
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@gmail.com" name="correoReset">
            </div>
    
            <div class="mb-3 div-btn">
              <button type="submit" class="btn btn-ingresar" name="resetPassword">Enviar</button>
            </div>

            <div class="mb-3 div-registrarse">
              <span>¿Ya te acordaste?</span>
              <a href="vista.php">Iniciar Sesión</a>
            </div>
            
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong class="strong-titulo">Se ha enviado el correo exitosamente</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <script>
            // Espera 3 segundos y luego cierra la ventana
            setTimeout(function() {
                window.close();
            }, 3000);
            </script>
            
          </form>
    </section>

    <script src="https://kit.fontawesome.com/ffb39b6180.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>

<?php
  include("resetPassword.php");
?>