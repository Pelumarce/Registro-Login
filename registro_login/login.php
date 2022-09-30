<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST" id="formulario_login">

        Nombre de Usuario: <input name="nombre_usuario" type="text" required size="40">
        <br>
        <br>
        Password: <input name="password_usuario" type="password" required size="40">
        <br>
        <br>
        <input type="submit" value="enviar">

    </form>

    <?php

    if ($_POST) {

        $nombre_usuario = $_POST["nombre_usuario"];
        $password_usuario = $_POST["password_usuario"];

        // debo conectarme a la BD con mysql!!

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "propietarios_2";

        // Crear conexion
        $conexion = new mysqli($servername, $username, $password, $dbname);

        $sql = "SELECT * FROM propietarios_2 WHERE nombre_usuarios = '$nombre_usuario' 
        AND contrasenia = '$password_usuario' AND activo = 1";
        $resultado = $conexion->query($sql);

        $numero_resultados = $resultado->num_rows;

        if ($numero_resultados == 0) {
            echo "Hay un error";
        } else {

            echo "Bienvenido : $nombre_usuario";
        }
    }

    ?>

</body>

</html>