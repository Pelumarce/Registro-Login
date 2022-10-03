<?php

// esta sentencia incluye o enlaza el archivo funciones con este
include("funciones.php");
// esta es la llamada a la función
$conexion = conectar_bd();

$id_pelicula = $_GET["id_pelicula"]; // para coger los datos que nos llegan por $_GET

$consulta = "DELETE FROM movies WHERE Code = $id_pelicula";// nuestra consulta

$resultado_consulta = $conexion->query($consulta);// hace la consulta

header("Location: index6.php");



?>