<?php
include("conexion.php");

$id = $_GET['id_nota'];

$eliminar = "DELETE FROM `notas` WHERE id_nota='$id'";

$result = mysqli_query($conexion, $eliminar);

if ($result) {
    echo "
    <script>
        window.location='/notas.php';
    </script>
    ";
} else {
    echo "
    <script>
        window.location='/notas.php';
    </script>
    ";
}
