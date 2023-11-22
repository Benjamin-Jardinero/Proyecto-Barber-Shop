<?php
  session_start();
  include("../con_bd.php");
  $nombre;

  if(isset($_SESSION['id'])){
      $id_usuario = $_SESSION['id'];
      $consulta = "SELECT * FROM registros WHERE id_user = '$id_usuario'";
      $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                while ($row = $resultado -> fetch_array()) {
                    //Obtenemos el nombre del usuario que ha iniciado sesion
                    $nombre = $row['nombre'];
                }
            }
  }else{
    header("Location: ../index.php");
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - Benja Lazarte</title>
    <link rel="icon" href="img/tienda/navaja.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>
<body class="bg-dark">

<!--HEADER / LOGO / NAVEGADOR-->
  <?php include("includes/header.php"); ?>

<!-- SECTION / CAROUSEL / TIENDA -->
  <section class="container">
    <div id="carouselExampleDark" class="carousel carousel-dark slide " data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner carrusel-tienda carusel-border">
        <div class="carousel-item active" data-bs-interval="5000">
          <img src="img/tienda/carusel.webp" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>¡Aprovecha nuestros super descuentos hasta el 50%!</h5>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <img src="img/tienda/gorras-carusel.webp" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Venta de gorras Adidas, Nike y Billabong</h5>
            <p>Gorra Billabong<span> $5.200</span> Ahora $4.100</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <img src="img/tienda/curso.webp" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Curso Profesional de Barbero</h5>
            <p>2 Meses<span> $8.200</span> ahora con el 70% de descuento $2.460</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

<!-- SECCION / TIENDA / JS -->
  <section class="tienda bg-dark" id="tienda-online"></section>

<!--FOOTER / INCLUDES-->
  <?php include("includes/footer.php"); ?>

<!-- JS / PRODUCTOS -->
  <script src="js/stock.js"></script>
  <script src="js/main.js"></script>
<!-- JS / BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/ffb39b6180.js" crossorigin="anonymous"></script>
</body>
</html>