<?php
require 'conexion.php';
session_start();

$user = $_POST['user'];
$pass = $_POST['pass'];

$sql = "SELECT COUNT(*) AS contar FROM usuarios WHERE usuario = '$user' AND password = '$pass'";

$sqlid = "SELECT id_usuario, nombre FROM usuarios WHERE usuario = '$user'";
$resultado = $conexion->query($sqlid);

$result = mysqli_query($conexion, $sql);
$array = mysqli_fetch_array($result);

if ($array['contar'] > 0) {
    $fila = $resultado->fetch_assoc();
    $nombreUsuario = $fila['nombre'];
    
    // Cierra la conexión a la base de datos
    $conexion->close();

    $_SESSION['usuario'] = $user;
    $_SESSION['nombre'] = $nombreUsuario;
    
    // Llama a la función de registro desde funciones.php
    //require_once('../scripts/funciones_de_guardar/save-log.php');
    //registrarAccionInicioSesion($nombreUsuario);

    header("location: ../your-notes.php");
    
} else {
    echo "
    <script>
        alert('Usuario y/o contraseña incorrectos');window.location='../login.php';
    </script>
    ";
}
