<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario subida de archivos</title>
</head>



<body>

<form method="POST" action="upload.php" enctype="multipart/form-data"> 
    <!--para subir un doc debe estar siempre esta etiqueta "enctype" -->

    <span> upload a file</span>
    <input type="file" name="uploadedFile"/> <!--input específico para subir archivos-->

    <input type="submit" name="uploadBtn" value="Upload"/>

</form>

    
</body>

</html>