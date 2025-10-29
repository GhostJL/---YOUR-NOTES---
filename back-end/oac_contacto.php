<?php
include("conexion.php");
$id = $_POST["id_contacto"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$fecha_importante = $_POST["fecha_importante"];


$actualizar = "UPDATE contactos SET nombre='$nombre', apellidos='$apellidos', telefono='$telefono', email='$email', fecha_importante='$fecha_importante' WHERE id_contacto ='$id'";

$result = mysqli_query($conexion, $actualizar);

if ($result) {
    echo "
    <script>
        alert('Se han actualizado los datos');window.location='/contacto.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('No se han actualizado los datos');window.location='/contacto.php';
    </script>
    ";
}
?>