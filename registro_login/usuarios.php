<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
// debo conectarme a la BD con mysql!!

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "propietarios_2";

// Crear conexion
$conexion = new mysqli($servername, $username, $password, $dbname);

$sql="SELECT * FROM propietarios_2";

$resultado = $conexion->query($sql);

$resultado->fetch_assoc(); //esto sirve para mostrar los campos de la BD

foreach ($resultado as $usuario){
    echo "Nombre de usuarios:" .$usuario["nombre_usuarios"]."<br>";
    echo "Password:".$usuario["contrasenia"]."<br>";
    echo "Activo".$usuario["activo"]."<br>";
    echo "<hr>";

    //los alias puede utilizarse como etiquetas! 
}


?>
    
</body>
</html>