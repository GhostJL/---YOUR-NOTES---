<?php
include("conexion.php");

$id = $_GET['id_contacto'];

$eliminar = "DELETE FROM `contactos` WHERE id_contacto='$id'";

$result = mysqli_query($conexion, $eliminar);

if ($result) {
    echo "
    <script>
        window.location='/contacto.php';
    </script>
    ";
} else {
    echo "
    <script>
        window.location='/contacto.php';
    </script>
    ";
}
