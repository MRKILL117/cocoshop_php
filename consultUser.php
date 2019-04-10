<?php
    header('Access-Control-Allow-Origin: *');
    require('base.php');
    $usuarios = [];

    if (isset($_POST['idUsuario'])) {
        $idUsuario = $_POST['idUsuario'];
    }

    if ($conn) {
        // Querys a la base de datos
        // Si el quey 
        $ingDatos = mysqli_query($conn, "SELECT *FROM getUserData WHERE idUsuario='$idUsuario'");
        if ($ingDatos){
            $status = "BIEN";
            $response = "Se ingresaron los datos correctamente";

            while ($aux = mysqli_fetch_assoc($ingDatos)) {
                $usuarios[] = $aux;
            }

        } else {
            $status = "MAL";
            $response = "No se pudieron ingresar los datos";
        }
    } else {
        $status = "MAL";
        $response = "No se pudo hacer la conexion con el servidor";
    }
    echo json_encode($usuarios[0]);
?>