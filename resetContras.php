<?php
    require("con_bd.php");
    $correoConf;

    if (isset($_POST['resetPassword']) && isset($_SESSION['correo'])) {    
        $correoConf = $_SESSION['correo'];
        $passNew = $_POST['passwordNueva'];
        $passConf = $_POST['passwordNew'];

        $consulta = "SELECT * FROM registros WHERE correo = '$correoConf'";
        $resultado = mysqli_query($conex, $consulta);

        if($resultado){
            while ($row = $resultado -> fetch_array()) {
                if ($passNew == $passConf) {
                    $passwordHasheada = password_hash($passNew, PASSWORD_DEFAULT);
                    $consulta2 = "UPDATE registros SET contraseña = '$passwordHasheada' WHERE correo = '$correoConf'";
                    $result = mysqli_query($conex, $consulta2);
                    if ($result) {
                            session_destroy();
                            $pagina = "vista.php";
                            header("Location: ".$pagina);
                    }
                } else {
                        ?>
                        <h3>Las contraseñas no coinciden</h3>
                        <?php
                }
            }
        }
    }
?>