<?php
include("conexion.php");

// Obtener los datos del evento del cuerpo de la solicitud POST
$data = json_decode(file_get_contents("php://input"), true);

// Insertar el evento en la base de datos
$descripcion = $data['descripcion'];
$tipoEvento = $data['tipo_evento'];

$sql = "INSERT INTO eventos (descripcion, tipo_evento) VALUES ('$descripcion', '$tipoEvento')";

if ($conn->query($sql) === TRUE) {
    echo "Evento registrado con éxito.";
} else {
    echo "Error al registrar el evento: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
