<?php
// Establecer la zona horaria en CST para Monterrey
date_default_timezone_set('America/Monterrey');

function registrarAccionInicioSesion($nombreUsuario) {
    // Aquí puedes realizar la lógica para registrar la acción de inicio de sesión en el archivo de registro
    $area = "Vinculación";
    $nivel = "Admon";
    $accion = "Inicio de sesión";
    
    // Ruta del archivo de registro
    $archivoRegistro = '../scripts/logs/inicios_de_sesion/ses.log';


    // Obtiene la fecha y hora actual
    $fechaHora = date("Y-m-d H:i:s"); // Obtener la fecha y hora actual
    $fechaHora = date("Y-m-d H:i:s", strtotime($fechaHora . " -1 hour")); // Restar una hora si es necesario


    // Formatea el mensaje de registro
    $mensajeLog = $area ." - " . $nombreUsuario . " - " . $nivel. " - " . $accion. " - " . $fechaHora . PHP_EOL;
    
    // Obtener los datos del evento del cuerpo de la solicitud
    $datosEvento = file_get_contents("php://input");

    // Verificar si los datos son válidos (puedes agregar validaciones adicionales aquí)
    if ($datosEvento) {
        
    // Registra el mensaje en el archivo de registro
    file_put_contents($archivoRegistro, $mensajeLog, FILE_APPEND | LOCK_EX);

    
    } else {
        // Respuesta de error si no se reciben datos válidos
        http_response_code(400);
        echo 'Error: Datos de evento no válidos.';
    }
}
?>
