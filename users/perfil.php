<?php
  session_start();
  include("../con_bd.php");

  //Variables globales
  $nombre;
  $apellido;
  $correo;
  $id_user;
  $nTelefono;
  $parrafo;

  if(isset($_SESSION['id'])){
      $id_usuario = $_SESSION['id'];
      $consulta = "SELECT * FROM registros WHERE id_user = '$id_usuario'";
      $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                while ($row = $resultado -> fetch_array()) {
                    //Obtenemos el nombre del usuario que ha iniciado sesion
                    $nombre = $row['nombre'];
                    $apellido = $row['apellido'];
                    $id_user = $row['id_user'];
                    $correo = $row['correo'];
                    $nTelefono = $row['telefono'];
                    $parrafo = $row['parrafo'];
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
    <title>Perfil - Benja Lazarte</title>
    <link rel="icon" href="img/tienda/navaja.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body class="bg-dark">
<!--HEADER / LOGO / NAVEGADOR-->
    <header class="header-nav">
          <nav class="navbar navbar-expand-lg bg-dark navbar-dark ">
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
                  <li class="nav-item dropdown" id="dropdown-list">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Yo
                      </a>
                      <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a href="perfil.php"><i class="fa-regular fa-user"></i> Perfil</a></li>
                        <li><a href="#"><i class="fa-solid fa-circle-info"></i> Ayuda</a></li>
                        <li><a href="../cerrarsesion.php"><i class="fa-solid fa-circle-xmark"></i> Cerrar sesión</a></li>
                      </ul>
                  </li>
                </ul>
                

                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>
<!-- SECCION / PERFIL -->
    <section class="container mb-3">
        <div class="card" style="width:100%; margin: auto;">
            <img src="../img/usuario.png" class="card-img-top" alt="Usuario">
            <div class="card-body titulo-perfil">
                <h5 class="card-title" style="text-align: center;"><?php echo $nombre." ".$apellido?></h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Correo: </strong><?php echo $correo?></li>
                <li class="list-group-item"><strong>Nº de usuario: </strong><?php echo $id_user?></li>
            </ul>
            <div class="card-body volver" style="text-align: center;">
                <a href="index.php" class="card-link">Volver</a>
            </div>
        </div>
    </section>
<!--FOOTER / REDES SOCIALES-->
    <footer class="bg-dark footer-redes">
      <div class="footer__div--redes">
        <ul>
          <li><a href="https://api.whatsapp.com/send?phone=541127088361"><i class="fa-brands fa-whatsapp"></i><span> Whatsapp</span></a></li>
          <li><a href="https://www.facebook.com/BenjaCARP2"><i class="fa-brands fa-facebook-square"></i><span> Facebook</span></a></li>
          <li><a href="https://www.instagram.com/benja_laza"><i class="fa-brands fa-instagram"></i><span> Instagram</span></a></li>
          <li><a href="https://twitter.com/BenjaLaza1"><i class="fa-brands fa-twitter"></i><span> Twitter</span></a></li>
        </ul>
      </div>
      <div class="footer-copy">
        <p><i class="fa-solid fa-copyright"></i> Todos los derechos estan reservados 2022</p>
      </div>
      </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ffb39b6180.js" crossorigin="anonymous"></script>
  </body>
</html>