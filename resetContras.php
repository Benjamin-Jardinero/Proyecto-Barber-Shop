<?php
    include("con_bd.php");
    session_start();
    $correoVerificar;
    $errorContraseñas="";
    $errorCampoVacio="";

    if(isset($_SESSION['correo'])){
      $mail = $_SESSION['correo'];
      $consulta = "SELECT * FROM registros WHERE correo = '$mail'";
      $resultado = mysqli_query($conex, $consulta);
    
          if ($resultado) {
            while ($row = $resultado -> fetch_array()) {
              //Obtenemos el correo del usuario que ha pedido cambiar su contraseña
              $correoVerificar = $row['correo'];
            }
          }
    } else{
          header("index.php");
    }

    if (isset($_POST['resetPassword']) && isset($_SESSION['correo'])) {    
        $correoVerificar = $_SESSION['correo'];
        $passNew = $_POST['passwordNueva'];
        $passConf = $_POST['passwordNew'];

        $consulta = "SELECT * FROM registros WHERE correo = '$correoVerificar'";
        $resultado = mysqli_query($conex, $consulta);

        if($resultado){
            while ($row = $resultado -> fetch_array()) {
                if (strlen($passNew) > 1 && strlen($passConf) > 1){
                    if ($passNew == $passConf) {
                        $passwordHasheada = password_hash($passNew, PASSWORD_DEFAULT);
                        $consulta2 = "UPDATE registros SET contraseña = '$passwordHasheada' WHERE correo = '$correoVerificar'";
                        $result = mysqli_query($conex, $consulta2);
                        if ($result) {
                                session_destroy();
                                $pagina = "index.php";
                                header("Location: ".$pagina);
                        }
                    } else {
                        $errorContraseñas = 'true';
                    }
                } else{
                    $errorCampoVacio = 'true';
                }
            }
        }
    }
    include("resetContraVista.php");
?>