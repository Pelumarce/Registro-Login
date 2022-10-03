<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <!-- enlace copiado de la página de bootstrab para añadir css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="scripts.js"></script>
  <title>Document</title>
</head>

<body>

  <style>
    #titulo:hover {
      cursor: pointer;

    }
  </style>

  <!-- añadimos un <a> con enlace -->
  <a href="add_movie.php" class="btn btn-success">Añadir película</a>




  Ordenar Películas:

  <select name="ordenar" id="ordenar" onchange="ordenar();">
    <option value="asc">ASC</option>
    <option value="desc">DESC</option>
  </select>


  Filtrar: <input id="filtro" type="text" name="filtro" onkeyup="filtrar();">
  <?php


  // esta sentencia incluye o enlaza el archivo funciones con este
  include("funciones.php");
  // esta es la llamada a la función
  $conexion = conectar_bd();


  $consulta = "SELECT * FROM movies ORDER BY Title"; // definir consulta por hacer

  $resultado_consulta = $conexion->query($consulta); // hace la consulta

  $resultado_consulta->fetch_assoc(); // convierte todo el resultado consulta en un array asociativo

  //pintamos la tabla linea superior cabecera de la tabla



  echo "<table class='table table-striped table-hover'>";
  echo "<tr>
        
        <td id='titulo' onclick='reordenar_titulo()' data-orden='DESC'>Título</td>
        <td >Raiting</td>
        <td >Recaudación</td>
        <td> Acciones </td>
      </tr>";

  echo "<tbody id='tabla_cines'>";
  foreach ($resultado_consulta as $pelicula) {
    echo '<tr>' .

      '<td>' . $pelicula["Title"] . '</td>' . //echo "Titulos: " . $pelicula["Title"] . "<br>";
      '<td>' . $pelicula["Rating"] . '</td>' . // echo "Rating: " . $pelicula["Rating"] . "<br>";
      '<td>' . $pelicula["Money"] . '</td>' . // echo "Recaudación: " . $pelicula["Money"] . "€ <br>";
      '<td>
            <a href="editar_pelicula.php?id_pelicula=' . $pelicula["Code"] . ' ">Editar</a>
              - 
            <a href="borrar_pelicula.php?id_pelicula=' . $pelicula["Code"] . ' ">Borrar</a> 
             </td>' .
      '</tr>';
  }
  echo "</tbody>";
  //pintamos la tabla linea inferior pie de la tabla
  echo "<tr>
       
        <td> Título </td>
        <td> Raiting </td>
        <td> Recaudación  </td>
        <td> Acciones </td>
     </tr>";
  echo "</table>";
  ?>

</body>

</html>