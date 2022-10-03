<?php

function conectar_bd(){
    $servername = "localhost"; //servidor
    $username = "root";//usuario
    $password = "";//contraseña
    $dbname = "cines";//BD

    $conexion = new mysqli($servername, $username, $password, $dbname);

    return $conexion;

}


