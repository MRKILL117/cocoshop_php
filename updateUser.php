<?php
header('Access-Control-Allow-Origin: *');
require('base.php');

$idUsuario = '';

$status = '';
$respose = '';

if (isset($_POST['idUsuario'])) {
    $idUsuario = $_POST['idUsuario'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
}
if (isset($_POST['apellido'])) {
    $apellido = $_POST['apellido'];
}
if (isset($_POST['telefono'])) {
    $telefono = $_POST['telefono'];
}
if (isset($_POST['direccion'])) {
    $direccion = $_POST['direccion'];
}
if (isset($_POST['pais'])) {
    $pais = $_POST['pais'];
}
if (isset($_POST['estado'])) {
    $estado = $_POST['estado'];
}
if (isset($_POST['ciudad'])) {
    $ciudad = $_POST['ciudad'];
}
if (isset($_POST['codigoPostal'])) {
    $CP = $_POST['codigoPostal'];
}

if ($conn) {
    // Querys a la base de datos
    // Si el quey 
    $updateDatos = mysqli_query($conn, "UPDATE `usuarios` 
    SET `email` = '$email', `nombre` = '$nombre', `apellido` = '$apellido', `telefono` = '$telefono', `pais` = '$pais', `estado` = '$estado', `ciudad` = '$ciudad', `direccion` = '$direccion', `codigoPostal` = '$CP'
    WHERE `usuarios`.`idUsuario` = '$idUsuario'");
    if ($updateDatos){
        $status = "BIEN";
        $response = "Se ingresaron los datos correctamente";
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