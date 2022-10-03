<?php 


include("funciones.php");

$conexion = conectar_bd();

$orden = $_GET["orden"];

$consulta = "SELECT * FROM movies ORDER BY Title $orden";

$resultado_consulta = $conexion->query($consulta);// hace la consulta

$resultado_consulta->fetch_assoc(); // convierte todo el resultado consulta en un array asociativo





foreach($resultado_consulta as $pelicula){
    echo '<tr>' .
             
            '<td>' . $pelicula["Title"] . '</td>' . //echo "Titulos: " . $pelicula["Title"] . "<br>";
            '<td>' . $pelicula["Rating"] . '</td>' . // echo "Rating: " . $pelicula["Rating"] . "<br>";
            '<td>' . $pelicula["Money"] . '</td>' . // echo "Recaudación: " . $pelicula["Money"] . "€ <br>";
            '<td>
            <a href="editar_pelicula.php?id_pelicula=' . $pelicula["Code"] . ' ">Editar</a>
              
            <a href="borrar_pelicula.php?id_pelicula=' . $pelicula["Code"] . ' ">Borrar</a> 
             </td>' .
            '</tr>';
   
}
//pintamos la tabla linea inferior pie de la tabla

?>