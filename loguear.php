<?php
    include("con_bd.php");

    if (isset($_POST['iniciarsesion'])) {
        if (strlen($_POST['correoRegister']) > 1 && strlen($_POST['passwordRegister']) > 1) {
            $correoR  = $_POST['correoRegister'];
            $passR = $_POST['passwordRegister'];
            $correo = "Prueba@gmail.com";
            $pass;
            $nombre;
            

            $consulta = "Select * from registros";
            $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                while ($row = $resultado -> fetch_array()) {
                    $correo = $row['correo'];
                    $pass = $row['contraseña'];
                    
                    if ($correoR == $correo && $passR == $pass) {
                        $nombre = $row['nombre'];
                        break;
                    }
                }
                if ($correoR == $correo && $passR == $pass) {
                    //echo "<h3>¡Bienvenido/a $nombre!</h3>";
                    $pagina = "./users/index.php";
                    header("Location: ".$pagina);
                } else{
                    echo "<h3>Error el correo o contraseña es incorrecto</h3>";
                }
                
            }
        } else {
            ?>
            <h3>Complete los campos</h3>
            <?php
        }
    }
?>