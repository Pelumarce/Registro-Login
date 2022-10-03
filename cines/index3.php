<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartelera de cines</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>


<body>


    <a href="add_movie.php" class="btn btn-success">Añadir Película</a> <!-- coloco un a para poder poner un form es más sencillo que un button-->

    <?php

    include("funciones.php"); //se incluye el archivo de funciones

    $conexion = conectar_bd(); //en conexion solicito que se utilice la funcion conectar_bd

    $consulta = "SELECT * FROM movies LEFT JOIN movietheaters ON
    movietheaters.Movie = movies.Code"; 

    $resultado_consulta = $conexion->query($consulta); //se hace la consulta

    $resultado_consulta->fetch_assoc(); //me convierte la consulta en un array asociativo

    echo "<table class ='table table-striped table-hove table-bordered'>";
    echo "<tr>
            <td> Cine </td>
            <td> Título </td>
            <td> Rating </td>
            <td> Recaudación </td>
        </tr>";

    foreach ($resultado_consulta as $pelicula) {  //para recorrer el array

        echo '<tr>
                <td>' . $pelicula["Name"] . '</td>' .
                '<td>' . $pelicula["Title"] . '</td>' .
                '<td>' . $pelicula["Rating"] . '</td>' .
                '<td>' . $pelicula["Money"] . '</td>' .
            '</tr>';
    }

    echo "<tr>

            <td> Cine</td>
            <td> Título </td>
            <td> Rating </td>
             <td> Recaudación </td>

        </tr>";
    echo "</table>";


    ?>



</body>

</html>