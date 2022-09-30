<?php

//cojo con GET la cadena y el nombre de usuario
$nombre_usuario = $_GET["nombre_usuario"];

$verificador = $_GET["verificador"];

// 1º paso existe ya el usuario??
// debo conectarme a la BD con mysql!!

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "propietarios_2";

// Crear conexion
$conexion = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM propietarios_2 WHERE nombre_usuarios='$nombre_usuario'
AND verificar = '$verificador'";

$resultado = $conexion->query($sql);

$numero_resultados = $resultado->num_rows; //me devuelve el numero de filas 

if ($numero_resultados == 0) {
    echo "Algo ha ido mal";
} 
else {
    $sql = "UPDATE propietarios_2 SET activo = 1 WHERE nombre_usuarios = '$nombre_usuario'";
    $resultado = $conexion->query($sql);
    header("location:login.php"); //con esto va directo al login!!
}
