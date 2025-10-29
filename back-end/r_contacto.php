<?php
include("conexion.php");
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$fecha = $_POST["fecha"];
$user = $_POST["id_usuario"];

$oid_usuario = "SELECT id_usuario FROM usuarios WHERE usuario = '$user'";
$result = mysqli_query($conexion, $oid_usuario);

while ($consulta = mysqli_fetch_array($result)) {

$sql = "INSERT INTO `contactos`(`nombre`, `apellidos`, `telefono`, `email`, `fecha_importante`, `fk_usuario`) 
VALUES ('" . $nombre . "','" . $apellido . "','" . $telefono . "','" . $email . "','" . $fecha . "','" . $consulta['id_usuario'] .  "')";

if (mysqli_query($conexion, $sql)) {
    echo "
    <script>
        alert('Se registrado el contacto');window.location='/contacto.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Error al insertar contacto'".$sql."<br>". mysqli_error($conexion);"'window.location='/proyecto/crear_cuenta.php';
    </script>
    ";
}
}

?>