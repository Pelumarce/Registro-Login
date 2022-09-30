<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>

<body>

    <form method="POST" id="formulario_registro">

        Nombre de Usuario: <input name="nombre_usuario" type="text" required size="40">
        <br>
        <br>
        Password: <input name="password_usuario" type="password" required size="40">
        <br>
        <br>
        <input type="submit" value="enviar">

    </form>

    <?php

    //esta funcion genera una cadena al azar

    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    function generate_string($input, $strength = 16)
    {
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }

    if ($_POST) {

        $nombre_usuario = $_POST["nombre_usuario"];
        $password_usuario = $_POST["password_usuario"];

        // 1º paso existe ya el usuario??
        // debo conectarme a la BD con mysql!!

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "propietarios_2";

        // Crear conexion
        $conexion = new mysqli($servername, $username, $password, $dbname);
        // Check conexion
        if ($conexion->connect_error) {
            die("Connection failed: " . $conexion->connect_error);
        }

        //hacemos la consulta y se guarda en $sql
        $sql = "SELECT * FROM propietarios_2 WHERE nombre_usuarios = '$nombre_usuario'";

        $resultado = $conexion->query($sql); //aqui se hace la consulta y recoge el resultado


        //$resultado->fetch_assoc();

        $numero_resultados = $resultado->num_rows;

        //echo "El número de resultados es " . $numero_resultados;

        //aqui verificamos si existe el usuario

        if ($numero_resultados > 0) {
            echo "Ya existe ese Usuario";
        } else {

            $cadena_verificar = generate_string($permitted_chars, 20);

            $sql = "INSERT INTO propietarios_2 (nombre_usuarios, contrasenia, verificar,activo)
            VALUES ('$nombre_usuario','$password_usuario', '$cadena_verificar', 0)";

            //echo $sql;

            $resultado = $conexion->query($sql);


            //enviar email de confimación con la url de verificación

            $url_verificacion = "http://localhost:8080/registro_login/verificar.php?nombre_usuario=$nombre_usuario&verificador=$cadena_verificar";

            echo $url_verificacion;
        }
    }

    ?>

</body>

</html>