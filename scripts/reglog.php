<?php
session_start();

date_default_timezone_set('America/Monterrey');

$user = $_SESSION['nombre'];
$date = date("Y-m-d");
$hour = date("H:i:s", strtotime("-1 hour"));
$ip = $_SERVER['REMOTE_ADDR'];
$eventLogFile = '';

function logError($message)
{
    global $errorLogFile;
    $dateTime = date("Y-m-d H:i:s", strtotime("-1 hour"));
    $errorRecord = "Error - {$dateTime}: {$message}" . PHP_EOL;
    file_put_contents($errorLogFile, $errorRecord, FILE_APPEND | LOCK_EX);
}



if (!isset($_SESSION['nombre'])) {
    http_response_code(401);
    logError('Error: User not authenticated.');
    echo 'Error: User not authenticated.';
    exit;
}

$eventData = file_get_contents("php://input");

if (!$eventData) {
    http_response_code(400);
    logError('Error: Invalid event data.');
    echo 'Error: Invalid event data.';
    exit;
}

$event = json_decode($eventData, true);

if ($event === null) {
    http_response_code(400);
    logError('Error: Invalid JSON event data.');
    echo 'Error: Invalid JSON event data.';
    exit;
}

if (isset($event['area'])) {
    $area = $event['area'];

    // Obtén la ruta del archivo según el área
    $areaLogFile = '';

    if ($area === 'División de Estudios') {
        $areaLogFile = '../scripts/logs/division_de_estudios/eventos_' . strtolower(str_replace(' ', '_', $area)) . '_' . date('Y-m-01') . '.log';
    } elseif ($area === 'Servicios Escolares') {
        $areaLogFile = '../scripts/logs/servicios_escolares/eventos_' . strtolower(str_replace(' ', '_', $area)) . '_' . date('Y-m-01') . '.log';
    } else {
        http_response_code(400);
        logError('Error: Área no reconocida.');
        echo 'Error: Área no reconocida.';
        exit;
    }

    // Verificar si el archivo no existe y crearlo solo si es el primer día del mes
    if (!file_exists($areaLogFile) && date('j') === '01') {
        $header = "Usuario, Fecha, Hora, IP, Acción, Área, Informe de accion" . PHP_EOL;
        file_put_contents($areaLogFile, $header, LOCK_EX);
        echo "Nuevo archivo creado para {$area}: $areaLogFile\n";
    }

    // Asignar el archivo al evento
    $eventLogFile = $areaLogFile;
    echo "Asignado archivo para {$area}: $eventLogFile\n";
} else {
    http_response_code(400);
    logError('Error: Área no reconocida.');
    echo 'Error: Área no reconocida.';
    exit;
}

$action = $event['tipo'];
$contenido = $event['contenido'];

$eventRecord = "{$user} - {$date} - {$hour} - {$ip} - {$action} - {$contenido}" . PHP_EOL;

if (file_exists($eventLogFile)) {
    file_put_contents($eventLogFile, $eventRecord, FILE_APPEND | LOCK_EX);
    echo 'Event successfully logged on the server.';
} else {
    $header = "Usuario, Fecha, Hora, IP, Acción, Área, Informe de accion" . PHP_EOL;
    file_put_contents($eventLogFile, $header . $eventRecord, LOCK_EX);
    echo 'Event successfully logged for the first time on the server.';
}

http_response_code(200);
?>
