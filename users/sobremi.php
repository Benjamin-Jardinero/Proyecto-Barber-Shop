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
    <title>Sobre mí - Benja Lazarte</title>
    <link rel="icon" href="img/tienda/navaja.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body class="bg-dark">

<!--HEADER / LOGO / NAVEGADOR-->
  <?php include("includes/header.php"); ?>

<!--SECTION / SOBRE MI-->
  <section class="container">
      <div class="titulo-sobremi">
        <h2>Sobre mí</h2>
      </div>
      <div class="img-sobremi">
        <img src="img/Sobre mi/Barbero-quien-soy.jpg" alt="Barbero-Foto">
      </div>
      <div class="parrafo-sobremi">
        <h2>”Un cambio de look es un energizante de la autoestima”</h2>
        <p>Barber Shop nace como respuesta a la necesidad creciente de hombres cuidar su imagen y a la vez optimizar su tiempo. El servicio que brinda el equipo se ajusta a las necesidades del hombre moderno, sin descuidar todos los aspectos que conforman su respuesta única de servicio. Un diagnóstico profesional, tratamientos específicos para cada tipo de cabello y barba (afeitado tradicional con navaja).</p>
        <p>Esta Barberia es sinónimo de innovación, diseño, profesionalismo, estilo y por sobre todo sinónimo de calidad. Porque cada hombre es diferente, cada estilo lo es también y esa es la razón que nos moviliza para estar detrás del cambio que cada uno elija.</p>
        <p>Nuestra trayectoria nos avala hace más de treinta años, con tres generaciones de profesionales en el rubro de la peluquería y mediante la creación de la exitosa cadena de peluquerías Paulino Acosta. La misma ha sido la cadena de peluquerías más grande de la Argentina, consolidada en belleza capilar del hombre y la mujer.</p>
      </div>
      <div class="mapa-sobremi">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5511.4246175493!2d-58.48000832514369!3d-34.777938424409705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcd1ee935caa7f%3A0x18f737b2c21d05fd!2sSan%20Nicol%C3%A1s%203557%2C%20B1839GVO%209%20de%20Abril%2C%20Buenos%20Aires%2C%20Argentina!5e0!3m2!1ses-419!2sar!4v1657932025764!5m2!1ses-419!2sar" width="100%" height="500" style="border:2px solid orange;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <button>
          <a href="https://goo.gl/maps/NjqH4KPzCriYkYQR7">Abrir mapa</a>
        </button>
      </div>
  </section>

<!--FOOTER / INCLUDES-->
  <?php include("includes/footer.php"); ?>

<!-- JS / BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/ffb39b6180.js" crossorigin="anonymous"></script>
</body>
</html>