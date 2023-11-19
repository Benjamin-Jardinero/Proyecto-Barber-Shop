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
            //$resultado = $conex -> query($consulta);
            $bandera = true;
            //verificar si hay registros
            //if ($resultado -> num_rows > 0){
            if($resultado){
                //while($row = $resultado -> fetch_assoc()){
                while($row = $resultado -> fetch_array()){
                    $correoRegistros = $row['correo'];
                    if ($correo == $correoRegistros ) {
                        $bandera = false;
                    }
                }
                //$conex -> close();
                if($bandera){
                    if ($pass == $passConfirm) {
                        //Encriptamos la contraseña del usuario para almacenarla a la base de datos
                        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
                        $consulta = "INSERT INTO registros(nombre, apellido, correo, contraseña) VALUES ('$nombre', '$apellido','$correo','$hashed_password')";
                        $resultado = mysqli_query($conex, $consulta);
                        if($resultado){
                        //if ($conex -> query($consulta)=== true) {
                            header("Location: sucessRegistrar.php");
                            exit();
                        }
                    }  else {
                        /*Las contraseñas no coinciden*/
                        header("Location: errorRegistrar3.php");
                        exit();
                    }
                } else{
                    /*El usuario ya existe*/
                    header("Location: errorRegistrar2.php");
                    exit();
                }
            }
        } else {
            /*Completar los campos vacios*/
            header("Location: errorRegistrar.php");
            exit();
        }
    }
?>