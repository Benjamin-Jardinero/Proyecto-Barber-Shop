<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barber Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>

    <main class="main-container container">
        <h1 class="titulo">Barber Shop</h1>
    </main>

    <section class="container seccion-container">
    
        <form method="post">
            
            <div class="mb-3 div-name">
                <div class="row">
                    <div class="col">
                        <label for="name" class="form-label"><i class="fa-solid fa-user i-color"></i> Nombre</label>
                        <input type="text" class="form-control" placeholder="First name" aria-label="First name" id="name" name="nombre">
                    </div>

                    <div class="col">
                        <label for="lastName" class="form-label"><i class="fa-solid fa-user i-color"></i> Apellido</label>
                        <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" id="lastName" name="apellido">
                    </div>
                </div>
            </div>

            <div class="mb-3 div-correo">
              <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-envelope i-color"></i> Correo Electronico</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@gmail.com" name="correo">
            </div>
    
            <div class="mb-3 div-password">
              <label for="exampleInputPassword1" class="form-label"><i class="fa-solid fa-lock i-color"></i> Contraseña</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password" name="password">
            </div>

            <div class="mb-3 div-password">
              <label for="exampleInputPassword1" class="form-label"><i class="fa-solid fa-lock i-color"></i> Confirmar Contraseña</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password" name="passwordConfirm">
            </div>

            <div class="mb-3 div-btn">
              <button type="submit" class="btn btn-ingresar" name="registrar">Registrarse</button>
            </div>

            <div class="mb-3 div-registrarse">
              <span>¿Ya tenes cuenta?</span>
              <a href="index.php">Iniciar Sesión</a>
            </div>

            <!-- VALIDACIONES -->
            <?php 
            if($registroOk){
              // SI EL REGISTRO ES EXITOSO
              include("includes/exito.php");
            } else if($registroNoCoincide){
              // SI EL REGISTRO NO COINCIDEN
              include("includes/errorRegistro.php");
            } else if($registroExiste){
              // SI EL REGISTRO YA EXISTE
              include("includes/errorRegistro2.php");
            } else if($registroIncompleto){
              // SI EL REGISTRO ESTA INCOMPLETO
              include("includes/error2.php");
            }
            ?>

          </form>
    </section>

    <script src="https://kit.fontawesome.com/ffb39b6180.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>