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
    header("Location: ../index.php");
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
<!--HEADER / INCLUDES-->
  <?php include("includes/header.php"); ?>
<!-- CONTACTO / MAIN / PHP -->
  <main class="container">
    <div class="contacto-fondo">
      <div class="contacto-titulo">
        <h1>Contacto</h1>
      </div>
      <div class="img-contacto">
        <img src="img/contacto-logo.jpg" alt="logo-imagen">
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
          
            <div class="form-floating form-boton contac_4">
              <input type="submit" value="Enviar" name="submit">
              <input type="reset" value="Limpiar">
            </div>

            <!-- Comprobar si envia o no  -->
            <?php if($enviado) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong class="strong-titulo">Se ha enviado el correo exitosamente</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>
      </form>
    </div>
  </main>

<!--FOOTER / INCLUDES-->
  <?php include("includes/footer.php"); ?>

<!-- JS / BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/ffb39b6180.js" crossorigin="anonymous"></script>
</body>
</html>