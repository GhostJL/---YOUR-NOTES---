<?php
include("conexion.php");

$id = $_GET['id_usuario'];
$existe = 0;

if ($id == "") {
    echo "El numero de control es un campo oblgatorio";
} else {
    $result = mysqli_query($conexion, "SELECT * FROM `usuarios` WHERE id_usuario='$id'");
    while ($consulta = mysqli_fetch_array($result)) {
        $existe++;
    }
    if ($existe == 0) {
        echo "El numero de control solicitado no existe";
    } else {        
        $_DELETE_SQL = mysqli_query($conexion, "DELETE FROM `usuarios` WHERE id_usuario='$id'");
    
    }
}

session_start();
session_unset();
session_destroy();

header("location: ../index.php");
exit();
?>