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
    <title>Inicio - Benja Lazarte</title>
    <link rel="icon" href="img/tienda/navaja.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body class="bg-dark">

<!--HEADER / INCLUDES -->
  <?php include("includes/header.php"); ?>

<!--SECTION / BANER --->
  <section class="section__inicio">
    <div class="bg-dark div-img">
      <img src="img/section-inicio.jpg" alt="BARBER SHOP" class="container-fluid">
    </div>
    <div class="section__inicio--div">
      <!-- Consumiendo api de wsp -->
      <a href="https://api.whatsapp.com/send?phone=541127088361"><i class="bi bi-whatsapp"></i> ¡Reserva tu turno! </a>
    </div>
  </section>
<!--ASIDE / CORTES -->
  <aside id="grilla__aside--principal" class="bg-dark">
    <div class="cortes__modernos">
      <div>
        <img src="img/Cortes modernos.jpg" alt="Cortes modernos">
      </div>
      <div>
        <h1>¡Cortes de pelo Modernos!</h1>
        <p>Tenemos variedades de cortes modernos para que el cliente se vaya con un buen corte de pelo, realizado por los mejores barberos, peluqueros y estilistas de toda Argentina.</p>
      </div>
    </div>
    <div class="cortes__clasicos">
      <div>
        <img src="img/Cortes clasicos.jpg" alt="Cortes clasicos">
      </div>
      <div>
          <h1>¡Cortes clasicos!</h1>
          <p>Realizamos cortes de pelo clasicos, hechos por peluqueros con amplia experiencia en este tipo de cortes.</p>
      </div>
    </div>
    <div class="cortes__niños">
      <div>
        <img src="img/Corte niños.jpg" alt="Cortes de niños">
      </div>
      <div>
          <h1>¡Cortes para niños!</h1>
          <p>Nos encontramos cortando el pelo a niños, con ayuda de profesionales en lo que es el area de Kids.</p>
    </div>
      </div>
      
    </div>
    <div class="cortes__estilistas">
      <div>
        <img src="img/estilistas profesionales.jpg" alt="estilistas profesionales">
      </div>
      <div>
          <h1>¡Cortes de estilistas!</h1>
          <p>En nuestra compania, contamos con los mejores estilistas que pueda haber en toda la Argentina, con mas de 10 años de experiencia, en lo que es lavado,secado, corte, etc.</p>
      </div>
    </div>
  </aside>

<!--FOOTER / INCLUDES-->
  <?php include("includes/footer.php"); ?>
  
<!-- JS / BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/ffb39b6180.js" crossorigin="anonymous"></script>
</body>
</html>