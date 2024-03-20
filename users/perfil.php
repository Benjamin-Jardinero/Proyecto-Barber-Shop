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
    header("Location: ../index.php");
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

<!--HEADER / INCLUDES-->
  <?php include("includes/header.php"); ?>

<!-- SECCION / PERFIL -->
  <section class="container mb-3">
      <div class="card card-perfil">
          <img src="../img/usuario.png" class="card-img-top img-perfil" alt="Usuario">
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

<!--FOOTER / INCLUDES-->
  <?php include("includes/footer.php"); ?>
  
<!-- JS / BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/ffb39b6180.js" crossorigin="anonymous"></script>
</body>
</html>