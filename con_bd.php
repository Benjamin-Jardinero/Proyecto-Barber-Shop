<?php
    /*Conexion a server infinityFree
    $serverName = "sql101.byetcluster.com";
    $userName = "if0_35440238";
    $password = "ssBSfldXawyMlzY";
    $bdName = "if0_35440238_barbershop";

    $conex = new mysqli($serverName, $userName, $password, $bdName);

    if ($conex -> connect_error) {
        die("Conexion fallida: " . $conex -> connect_error);
    }
    */

    $conex = mysqli_connect("localhost","root","","barbershop");
?>