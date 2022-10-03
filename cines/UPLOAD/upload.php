<?php

if ($_POST) {

    if (isset($_FILES['uploadedFile'])) { //$_FILES almacena la info que se esta subiendo al arcivo.
        //dentro de $_FILES se pone el name del formulario.


        $fileTmpPath = $_FILES['uploadedFile']['tmp_name']; //carpeta temporal
        $fileName = $_FILES['uploadedFile']['name']; //nombre del archivo
        $fileSize = $_FILES['uploadedFile']['size']; //tamaño del archivo en bytes
        $fileType = $_FILES['uploadedFile']['type']; //tipo de archivo


        echo "Nombre temporal: $fileTmpPath <br>";
        echo "Nombre: $fileName<br>";
        echo "Tamaño: $fileSize <br>";
        echo "Tipo: $fileType <br>";


        $fileNameCmps = explode(".", $fileName); //descopone al archivo por el "."
        $fileExtension = strtolower(end($fileNameCmps)); //coge la extension final y la conbierte en minusculas



        $newFileName = md5(time() . $fileName) . '.' . $fileExtension; //sanitiza el file-name
        //esto sirve para que los archivos no se pisen entre si, con la hora y el nombre lo transforma
        //en una cadena y luego le pega la entension original. md5 lo encripta!!!!

        echo "Nuevo nombre :  $newFileName <br>";


        //array de extensiones permitidas

        $allowedfileExtensions = array('jpg', 'gif', 'png');


        if (in_array($fileExtension, $allowedfileExtensions)) { //verifica que la extension que ha subido
            //coincida con una que se permite en el array que se creo anteriormente!!!

            $uploadFileDir = './UPLOAD_files/'; //carpeta en la que colocamos el archivo
            $dest_path = $uploadFileDir . $newFileName; //aqui esta la carpte UPLOAD y el nombre del archivo
            //carpeta + nombre


            if (move_uploaded_file($fileTmpPath, $dest_path)) { //nueve el archivo temporal con (carpeta + nombre)
                //que yo cree antes

                header("Location: index.php"); //vuelve al index

            } else {

                echo "Algo ha salido mal";
            }
        } else {

            echo "Extension no permitida";
        }
    }
}
