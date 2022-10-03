<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- enlace copiado de la página de bootstrab para añadir css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
// esta sentencia incluye o enlaza el archivo funciones con este
include("funciones.php");
// esta es la llamada a la función
$conexion = conectar_bd();

$id_pelicula = $_GET["id_pelicula"]; // para coger los datos que nos llegan por $_GET

$consulta = "SELECT * FROM movies WHERE Code = $id_pelicula";

$resultado_consulta = $conexion->query($consulta);

$resultado_consulta->fetch_assoc();

foreach($resultado_consulta as $pelicula){
    $titulo = $pelicula["Title"];
    $rating = $pelicula["Rating"];
    $recaudacion = $pelicula["Money"];
}


?>
<div class="container">

<form  method="POST">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" name="titulo" class="form-control" value="<?php echo $titulo; ?>">

        <br>

        <label for="rating" class="form-label">Rating</label>
        <select name="rating">
            <option value="-1">Seleccione una opción</option>
            <option value="PG"<?php if($rating == "PG"){ echo "selected";} ?>>PG</option>
            <option value="G" <?php if($rating == "G"){ echo "selected";} ?>>G</option>
            <option value="NC-17" <?php if($rating == "NC-17"){ echo "selected";} ?>>NC-17</option>
            <option value="PG-13" <?php if($rating == "PG-13"){ echo "selected";} ?>>PG-13</option>
        </select>

        <br>

        <label for="money" class="form-label">Money</label>
        <input type="text" name="money" class="form-control" value="<?php echo $recaudacion; ?>">

        <br>

        <input type="submit" class="btn btn-primary" value="Añadir película">

</form>

</div>

<?php

    if($_POST){
        $titulo_nuevo = $_POST["titulo"];
        $rating_nuevo =  $_POST["rating"];
        $recaudacion_nueva = $_POST["money"];

    $consulta = "UPDATE movies 
    SET Title = '$titulo_nuevo',
    Rating = '$rating_nuevo',
    Money = $recaudacion_nueva
    WHERE Code = $id_pelicula";
    // $recaudacion no lleva comillas por estar puesto en la tabla 
    //como un entero INT
    
    $resultado_consulta = $conexion->query($consulta);

    header("Location: index6.php"); // esto es para redirigirnos al index tras hacer la entrada
    }   
    ?>
</body>
</html>