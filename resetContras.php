<?php
    require("con_bd.php");
  
    if (isset($_POST['resetPassword'])) {
        $correoUser = $_POST['correoReset2'];
        $passNew = $_POST['passwordNueva'];
        $passConf = $_POST['passwordNew'];

        $consulta = "SELECT * FROM registros";
        $resultado = mysqli_query($conex, $consulta);

        if($resultado){
            while ($row = $resultado -> fetch_array()) {
                $correoConf = $row['correo'];
                if ($correoUser == $correoConf) {
                    
                    if ($passNew == $passConf) {
                        echo $correoConf;

                        $consulta2 = "UPDATE registros SET contraseña = '$passNew' WHERE correo = '$correoConf'";
                        $result = mysqli_query($conex, $consulta2);
                        if ($result) {
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
    }
?>