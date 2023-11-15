<?php
  session_start();
  include("../con_bd.php");
  $nombre;
  $correo;

  if(isset($_SESSION['id'])){
      $id_usuario = $_SESSION['id'];
      $consulta = "SELECT * FROM registros WHERE id_user = '$id_usuario'";
      $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                while ($row = $resultado -> fetch_array()) {
                    //Obtenemos el nombre y correo del usuario que ha iniciado sesion
                    $nombre = $row['nombre'];
                    $correo = $row['correo'];
                }
            }
  }else{
    header("Location: ../vista.php");
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Benja Lazarte</title>
    <link rel="icon" href="img/tienda/navaja.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body class="bg-dark">
<!--HEADER / LOGO / NAVEGADOR-->
    <header>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
           <div class="container-fluid">

              <a class="navbar-brand logo__a" href="index.php">
                <img src="img/logo.png" alt="Logo"  class="d-inline-block align-text-top logo">
              </a>

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse header__item" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="tienda.php">Tienda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="sobremi.php">Sobre mí</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="contacto.php">Contacto</a>
                  </li>
                </ul>

                <div class="dropdown" id="dropdown-list">
                  <a class="btn btn-secondary dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-regular fa-user"></i>

                    <?php
                    echo $nombre;
                    ?>

                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    <li><a class="dropdown-item" href="#">Ayuda</a></li>
                    <li><a class="dropdown-item" href="../cerrarsesion.php">Cerrar sesión</a></li>
                  </ul>
                </div>

                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>
<main class="container">
    <div class="contacto-fondo">
      <div class="contacto-titulo">
        <h1>Contacto</h1>
      </div>
      
        <form method="post" id="grilla_contacto" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-floating contac_1">
                <input type="text" readonly name="nombre" class="form-control" placeholder="name" id="nombre floatingInput" value="<?php if(!$enviado && isset($nombre)) echo $nombre?>">
                <label for="floatingInput"><i class="bi bi-person"></i> Nombre</label>
            </div>
            
            <div class="form-floating contac_2">
                <input  type="email" readonly name="correo" class="form-control" id="correo floatingInput" placeholder="name@example.com" value="<?php if(!$enviado && isset($correo)) echo $correo?>" >
                <label for="floatingInput"><i class="bi bi-at"></i>Correo Electronico</label>
            </div>

            <div class="form-floating form-mensaje contac_3">
                <textarea class="form-control" name="mensaje" placeholder="Leave a comment here" id="mensaje floatingTextarea2" style="height: 300px"><?php if(!$enviado && isset($mensaje)) echo $mensaje?></textarea>
                <label for="floatingTextarea2">Mensaje</label>
              </div>
              <div class="form-boton contac_4">
                <input type="submit" value="Enviar" name="submit">
                <input type="reset" value="Limpiar">
              </div>

              <!-- Comprobar si hay errores o no  -->
              <?php if (!empty($errores)): ?>
                <div class="alert error" role="alert">
              <?php echo $errores; ?>
                </div>
              <?php elseif($enviado) : ?>
                <div class="alert success" role="alert">
              <?php echo 'Enviado Correctamente'; ?>
                </div>
              <?php endif; ?>
              
        </form>
    </div>
</main>
<!--FOOTER / REDES SOCIALES-->
<footer class="bg-dark footer-redes">
  <div class="footer__div--redes">
      <ul>
        <li><a href="#"><i class="fa-brands fa-whatsapp"></i><span> Whatsapp</span></a></li>
        <li><a href="https://www.facebook.com/BenjaCARP2"><i class="fa-brands fa-facebook-square"></i><span> Facebook</span></a></li>
        <li><a href="https://www.instagram.com/benja_laza"><i class="fa-brands fa-instagram"></i><span> Instagram</span></a></li>
        <li><a href="https://twitter.com/BenjaLaza1"><i class="fa-brands fa-twitter"></i><span> Twitter</span></a></li>
      </ul>
  </div>
  <div class="footer-copy">
    <p><i class="fa-solid fa-copyright"></i> Todos los derechos estan reservados 2022</p>
  </div>
  </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ffb39b6180.js" crossorigin="anonymous"></script>
  </body>
</html>