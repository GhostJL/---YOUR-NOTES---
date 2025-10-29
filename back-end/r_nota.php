<?php
include("conexion.php");
$titulo = $_POST["titulo"];
$contenido = $_POST["contenido"];
$fecha = $_POST["fecha"];
$user = $_POST["id_usuario"];

$oid_usuario = "SELECT id_usuario FROM usuarios WHERE usuario = '$user'";
$result = mysqli_query($conexion, $oid_usuario);


while ($consulta = mysqli_fetch_array($result)) {

    $sql = "INSERT INTO `notas`(`titulo`, `contenido`, `fecha_creacion`, `fk_usuario`) 
VALUES ('" . $titulo . "','" . $contenido . "','" . $fecha . "','" . $consulta['id_usuario'] . "')";

    if (mysqli_query($conexion, $sql)) {
        echo "
    <script>
        window.location='../notas.php';
    </script>
    ";
    } else {
        echo "
    <script>
        alert('Error al insertar nota'" . $sql . "<br>" . mysqli_error($conexion);
        "'window.location='../notas.php';
    </script>
    ";
    }
}
?>