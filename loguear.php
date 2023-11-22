<?php
    include("con_bd.php");
    session_start();
    
    $errorLogin = "";
    $errorLoginIncompleto = "";

    if (isset($_POST['iniciarsesion'])) {
        if (strlen($_POST['correoRegister']) > 1 && strlen($_POST['passwordRegister']) > 1) {
            $correoR  = $_POST['correoRegister'];
            $passR = $_POST['passwordRegister'];
            $correo = "Prueba@gmail.com";
            $stored_hash;
            $nombre;
            $id;

            $consulta = "SELECT * FROM registros";
            $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                while ($row = $resultado -> fetch_array()) {
                    //Obtenemos todos los resultados de la base de datos
                    $correo = $row['correo'];
                    $stored_hash = $row['contraseña'];

                    //Verificamos que sea el mismo correo y contraseña
                    if ($correoR == $correo) {
                        if(password_verify($passR, $stored_hash)){
                            $nombre = $row['nombre'];
                            $id = $row['id_user'];
                            $_SESSION['id'] = $id;
                            break;
                        }
                    }
                }
                if ($correoR == $correo) {
                    if (password_verify($passR,$stored_hash)) {
                        header("Location: ./users/index.php");
                        exit();
                    }
                } else{
                    $errorLogin = 'true';
                }
            }
        } else {
            $errorLoginIncompleto = 'true';
        }
    }

    include("loguearVista.php");
?>