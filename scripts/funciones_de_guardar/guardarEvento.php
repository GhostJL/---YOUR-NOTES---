<?php
session_start();

// Establecer la zona horaria en CST para Monterrey
date_default_timezone_set('America/Monterrey');

// Ruta del archivo de registro
$archivoRegistro = '../scripts/logs/division_de_estudios/eventos_division_de_estudios.log';

// Obtener los datos del evento del cuerpo de la solicitud
$datosEvento = file_get_contents("php://input");

// Verificar si los datos son válidos (puedes agregar validaciones adicionales aquí)
if ($datosEvento) {
    // Decodificar los datos JSON
    $evento = json_decode($datosEvento, true);

    // Verificar si la decodificación JSON fue exitosa
    if ($evento !== null) {
        // Obtener las variables de área, usuario y nivel del evento
        $area = "Area";
        $nombreUsuario = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'UsuarioDesconocido';
        $nivel = "Nivel";
        // Obtener la acción y la hora del evento
        $accion = $evento['tipo'];

        // Obtiene la fecha y hora actual
        $fechaHora = date("Y-m-d H:i:s"); // Obtener la fecha y hora actual
        $fechaHora = date("Y-m-d H:i:s", strtotime($fechaHora . " -1 hour")); // Restar una hora si es necesario

        // Incorporar los datos adicionales del script en el registro de evento
        $registroEvento = "{$area} - {$nombreUsuario} - {$nivel} - {$accion} - {$fechaHora} " . PHP_EOL;

        // Verificar si el archivo de registro existe
        if (file_exists($archivoRegistro)) {
            // Agregar el registro de evento al archivo existente
   //         file_put_contents($archivoRegistro, $registroEvento, FILE_APPEND | LOCK_EX);
            console_log('Evento registrado con éxito en el servidor.');
        } else {
            // El archivo no existe, crearlo y agregar encabezado
            $encabezado = "Area, Usuario, Nivel, Acción, Fecha y Hora" . PHP_EOL;
     //       file_put_contents($archivoRegistro, $encabezado . $registroEvento, LOCK_EX);
            console_log('Evento registrado por primera vez con éxito en el servidor.');
        }
        
        // Respuesta al cliente
        http_response_code(200);
    } else {
        // Error de decodificación JSON
        http_response_code(400);
        console_log('Error: Datos de evento JSON no válidos.');
        echo 'Error: Datos de evento JSON no válidos.';
    }
} else {
    // Respuesta de error si no se reciben datos válidos
    http_response_code(400);
    console_log('Error: Datos de evento no válidos.');
    echo 'Error: Datos de evento no válidos.';
}
?>
