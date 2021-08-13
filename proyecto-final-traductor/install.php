<?php

    if($_POST){

        
        $con = mysqli_connect($_POST['DB_HOST'], $_POST['DB_USER'], $_POST['DB_PASS']) or die(
            "<script>
                alert('Conexion invalida');
                window.location = 'install.php';
                
            </script>"
        );
         mysqli_query($con, "drop '{$_POST['DB_DATABASE']}'");
         mysqli_query($con, "CREATE DATABASE {$_POST['DB_DATABASE']}");
         mysqli_query($con, "USE '{$_POST['DB_DATABASE']}'");
         mysqli_query($con, "CREATE TABLE `idiomas` (
            `id` int(3) NOT NULL,
            `idioma` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
            `composicion_prosa` varchar(255) COLLATE utf8_spanish_ci NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
        $archivo = <<<ARCHIVO

       
        $lineas[] = "<?php\n";
        $lineas[] = "\tdefine('DB_HOST','$hostName');\n";
        $lineas[] = "\tdefine('APP_USERNAME', '$userName');\n";
        $lineas[] = "\tdefine('APP_PASSWORD', '$password');\n";
        $lineas[] = "\tdefine('APP_DATABASE', '$dataBase');";
        $lineas[] = "\n?>";

        define('DB_HOST','{$_POST['DB_HOST']}');
	    define('DB_USER', '{$_POST['DB_USER']}');
	    define('DB_PASS', '{$_POST['DB_PASS']}');
	    define('DB_DATABASE', '{$_POST['DB_DATABASE']}');

        //define('IS_DEBUG', true);
        ARCHIVO;

            file_put_contents();
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Public/css/normalize.css">
    <link rel="stylesheet" href="./Public/css/styles.css">
    <link rel="stylesheet" href="./Public/css/animate.min.css">
</head>
<body>
    
    <div class="card">

        <h3>Instalador</h3>

        <p>Llena estos datos para configurar la APP</p>

        <form action="index.php" method="post">

            <div class="form-element">
                    <input type="text" name="DB_HOST" placeholder="servidor " autocomplete="off">
            </div>
            
            <div class="form-element">
                    <input type="text" name="DB_USER" placeholder="Usuario " autocomplete="off">
            </div>
            
            <div class="form-element">
                    <input type="text" name="DB_PASS" placeholder="Contraseña " autocomplete="off">
            </div>
            
            <div class="form-element">
                    <input type="text" name="DB_DATABASE" placeholder="Nombre de la BD " autocomplete="off">
            </div>

            <div class="form-element">
                <input class="btn btn-azul" type="submit" value="Guardar">
            </div>

        </form>

    </div>
</body>
</html>