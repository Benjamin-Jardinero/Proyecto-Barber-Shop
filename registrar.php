<?php
    include("con_bd.php");
    
    if (isset($_POST['registrar'])) {
        if (strlen($_POST['nombre']) > 1 && strlen($_POST['apellido'] > 1) &&
            strlen($_POST['correo']) > 1 && strlen($_POST['password']) > 1 &&
            strlen($_POST['passwordConfirm']) > 1) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo  = $_POST['correo'];
            $pass = $_POST['password'];
            $passConfirm = $_POST['passwordConfirm'];
            $correoTabla = "Prueba@gmail.com";

            //Comprobar que el correo no exista, para crearlo
            $consulta = "SELECT * FROM registros";
            $resultado = mysqli_query($conex, $consulta);
            $bandera = true;

            if ($resultado){
                while($row = $resultado -> fetch_array()){
                    $correoRegistros = $row['correo'];
                    if ($correo == $correoRegistros ) {
                        $bandera = false;
                    }
                }

                if($bandera){
                    if ($pass == $passConfirm) {
                        $consulta = "INSERT INTO registros(nombre, apellido, correo, contraseña) VALUES ('$nombre', '$apellido','$correo','$pass')";
                        $resultado = mysqli_query($conex, $consulta);
                        if ($resultado) {
                            ?>
                            <h3>Te has registrado correctamente</h3>
                            <?php
                        }
                    }  else {
                        ?>
                        <h3>Las contraseñas no coinciden</h3>
                        <?php
                    }
                } else{
                    ?>
                    <h3>El usuario ya existe</h3>
                    <?php 
                }
            }
        } else {
            ?>
            <h3>Complete los campos</h3>
            <?php
        }
    }
?>