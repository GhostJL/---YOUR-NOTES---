<?php
include("conexion.php");
$id = $_POST["id_nota"];
$titulo = $_POST["titulo"];
$contenido = $_POST["contenido"];
$fecha = $_POST["fecha"];


$actualizar = "UPDATE notas SET titulo='$titulo', contenido='$contenido', fecha_creacion='$fecha' WHERE id_nota='$id'";

$result = mysqli_query($conexion, $actualizar);

if ($result) {
    echo "
    <script>
        alert('Se han actualizado los datos');window.location='/notas.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('No se han actualizado los datos');window.location='/notas.php';
    </script>
    ";
}
?>