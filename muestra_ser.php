<!DOCTYPE html>
<html>

<head>
    <title>Registro File</title>
    <link rel="stylesheet" type="text/css" href="./css/cssm.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <nav>
        <h1><a href="divisiones.php">Registro de archivos de Servicios Escolares</a></h1>
        <div class="calendar-wrapper">
            <label>Selecciona un archivo</label>
            <span class="deleteicon">
                <input type="text" id="datepicker" placeholder="Fecha (YYYY-MM-DD)">
            </span>
        </div>
    </nav>
    <div class="search-container">
        <div class="input-row">
            <span class="deleteicon">
                <input type="text" id="searchAccion" onkeyup="buscarRegistros()" oninput="toggleDeleteIcon(this)"
                    placeholder="Buscar por Acción">
                <span onclick="clearInput(this.previousElementSibling)">x</span>
            </span>


        </div>

        <div class="expand-section" onclick="toggleExpand()">
            <span class="arrow">&#9658;</span>
            <span class="text">Mostrar más campos de búsqueda</span>
        </div>
        <div class="additional-fields hidden">
            <div class="user-row">
                <span class="deleteicon-user">
                    <input type="text" id="searchUsuario" placeholder="Buscar por Usuario" onkeyup="buscarRegistros()"
                        oninput="toggleDeleteIcon(this)">
                    <span onclick="clearInput(this.previousElementSibling)">x</span>
                </span>
            </div>
            <div class="input-row">
                <span class="deleteicon">
                    <input type="text" id="datepickerInicio" class="datepicker" placeholder="Fecha de inicio">
                    <span onclick="clearInput(this.previousElementSibling)">x</span>
                </span>
            </div>
            <div class="input-row">
                <span class="deleteicon">
                    <input type="text" id="datepickerFin" class="datepicker" placeholder="Fecha de fin">
                    <span onclick="clearInput(this.previousElementSibling)">x</span>
                </span>
            </div>

            <div class="input-row">
                <span class="deleteicon">
                    <input type="text" id="searchIP" onkeyup="buscarRegistros()" oninput="toggleDeleteIcon(this)"
                        placeholder="Buscar por IP">
                    <span onclick="clearInput(this.previousElementSibling)">x</span>
                </span>
            </div>
            <div class="input-row">
                <label for="timepickerInicio">Hora de Inicio:</label>
                <input type="time" id="timepickerInicio" step="3600">
            </div>
            <div class="input-row">
                <label for="timepickerFin">Hora de Fin:</label>
                <input type="time" id="timepickerFin" step="3600">
            </div>
        </div>
    </div>



    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>IP</th>
                <th>Acción</th>
                <th>Nota de la acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $selectedDate = isset($_GET['selectedDate']) ? $_GET['selectedDate'] : date("Y-m-01");
                $logFilePath = './scripts/logs/servicios_escolares/eventos_servicios_escolares_' . $selectedDate . '.log';

                // Verificar si el archivo existe antes de intentar leerlo
                if (file_exists($logFilePath)) {
                    $lines = file($logFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    // Invertir el array para mostrar los más nuevos primero
                    $lines = array_reverse($lines);
                    foreach ($lines as $line) {
                        $parts = explode(" - ", $line);

                        if (count($parts) >= 5) {
                            $nombre = htmlspecialchars($parts[0]);
                            $fecha = htmlspecialchars($parts[1]);
                            $hora = htmlspecialchars($parts[2]);
                            $ip = htmlspecialchars($parts[3]);
                            $accion = htmlspecialchars($parts[4]);
                            $nota = htmlspecialchars($parts[5]);

                            echo '<tr>';
                            echo '<td>' . $nombre . '</td>';
                            echo '<td>' . $fecha . '</td>';
                            echo '<td>' . $hora . '</td>';
                            echo '<td>' . $ip . '</td>';
                            echo '<td>' . $accion . '</td>';
                            echo '<td>' . $nota . '</td>';
                            echo '</tr>';
                        }
                    }
                } else {
                    echo '<tr><td colspan="6">El archivo para la fecha ' . htmlspecialchars($selectedDate) . ' no existe.</td></tr>';
                }
                ?>

        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="scripts/scriptFunctions.js"></script>
</body>

</html>