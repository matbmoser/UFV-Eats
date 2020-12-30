<?php
    $host_db    = "localhost";
<<<<<<< HEAD
    $user_db    = "id11631880_matbmoser";
    $pass_db    = "a(dux>kqT%IMr(=7";
    $db_name    = "id11631880_hypetech";
=======
    $user_db    = "ufveats";
    $pass_db    = "NdVd4XxwoBfJ4Qx1";
    $db_name    = "ufveats";
>>>>>>> a92e3cee1f7cba607a3edf941326463e0e1da0d6
    $conexion   = new mysqli($host_db, $user_db, $pass_db, $db_name);
    $acentos    = $conexion->query("SET NAMES 'utf8'");
    if ($conexion->connect_error) {
        echo json_encode(array('success' => 0));
        die("La conexion falló: " . $conexion->connect_error);
    }
    ?>