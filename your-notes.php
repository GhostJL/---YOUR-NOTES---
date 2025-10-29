<?php
session_start();
error_reporting(0);
$usuario = $_SESSION['usuario'];
$nombreUsuario = $_SESSION['nombre'];

if ($usuario == null || $usuario == '') {
    header("location: index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>|--YOUR NOTES--|</title>
</head>

<body>

    <div class="container">

        <nav>
            <ul>
                <li class="active">
                    <a href="your-notes.php">Inicio</a>
                </li>
                <li>
                    <a href="notas.php">Notas</a>
                </li>
                <li>
                    <a href="contacto.php">Contactos</a>
                </li>
                <li>
                    <a href="perfil.php">Perfil</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="content_index">
        <div class="cont_t_btns">
            <h1 class="titulo">|--YOUR NOTES--|</h1>
            <p class="frase">Hola, bienvenido a |--YOUR NOTES--| <?php echo $usuario . ' ' . $nombreUsuario; ?> guarda tus notas y contactos, para acceder a ellos desde donde quieras.</p>
            <a class="i_notas" href="notas.php">Iniciar notas</a>
            <a class="i_contactos" href="contacto.php">Iniciar contactos</a>
        </div>
    </div>

</body>

</html>