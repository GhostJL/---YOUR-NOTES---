<?php
include("./back-end/conexion.php");

session_start();
$usuario = $_SESSION['usuario'];

$sql = "SELECT * FROM usuarios WHERE usuario  = '$usuario'";


if (!isset($usuario)) {
    header("location: index.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">

    <title>Actualizar perfil</title>
</head>

<body>

    <div class="container">
        <a href="index.php">
            <h3>|--YOUR NOTES--|</h3>
        </a>
        <nav>
            <ul>
                <li>
                    <a href="your-notes.php">Inicio</a>
                </li>
                <li>
                    <a href="notas.php">Notas</a>
                </li>
                <li>
                    <a href="contacto.php">Contactos</a>
                </li>
                <li class="active">
                    <a href="perfil.php">Perfil</a>
                </li>
            </ul>
        </nav>
    </div>

    <?php
    $result = mysqli_query($conexion, $sql);
    while ($consulta = mysqli_fetch_assoc($result)) { ?>

        <div class="card_perfil">
            <div class="ac">
                <h1 class="ac_pe">Actualizar cuenta</h1>
                <a href="./back-end/logout.php" class="salir_btn">
                    Salir
                    <img class="logout" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAMhJREFUSEvdldENwjAMRJ8nYARgk7JJmYyOwgiwQbsBTBB0KJVKQMSBRir4N+c7X+zERuWwyvwsQyBAAxyAjcNxD+wNjsK6HARQ0tpBPkJ6g22JQIjgbEEBHrDZBBGnSe+c/IZAgM6gfeXkIwcpUSQ5ATuDy/R8TgHxilwiErtHVmAEFIykoJr7bhkCnsonLq9AU3RFBQLnSP59k9PGzT6m//eSa/xFauTKMwARM1jcHd7fVAtHD8mzEwagLVo4BZU/QV0OFi1wAy0WVBmqMeafAAAAAElFTkSuQmCC" />
                </a>
            </div>
            <form name="form" action='./back-end/oac_perfil.php?id_usuario=<?php echo $consulta['id_usuario']; ?>' method='POST'>
                <div class="input_datos">

                    <p>Nombres</p>
                    <p>Apellidos</p>
                    <input type="text" name="nombre" placeholder="Nombres" required="text" onkeypress="return sololetras(event);" value="<?= $consulta['nombre'] ?>">
                    <input type="text" name="apellidos" placeholder="Apellidos" required="text" onkeypress="return sololetras(event);" value="<?= $consulta['apellidos'] ?>">

                    <p>Correo electronico</p>
                    <p>Usuario</p>
                    <input type="email" name="email" placeholder="Correo electronico" required="email" onclick="ValidateEmail(document.form1.text1)" value="<?= $consulta['email'] ?>">
                    <input type="text" name="usuario" placeholder="Usuario" required="text" value="<?= $consulta['usuario'] ?>">

                </div>

                <div class="btns">
                    <input type='hidden' name='id_usuario' value='<?php echo $consulta['id_usuario']; ?>'>

                    <input id="b_actualizar_cuenta" type="submit" class="btn_ac_cuenta" value="Actualizar datos">
                </div>
            </form>
            <div class="btns">
                <form action='./back-end/e_usuario.php?id_usuario=<?php echo $consulta['id_usuario']; ?>' method='POST'>
                    <input type='hidden' name='id_usuario' value='<?php echo $consulta['id_usuario']; ?>'>
                    <input id="b_eliminar_cuenta" type="submit" class="btn_el_cuenta" value="Eliminar cuenta" onClicK='return ConfirmDelete()'>
                </form>
            </div>
        </div>

    <?php } ?>

</body>

</html>

<script src="js/script.js"></script>
<script src="scripts/scriptRegs.js"></script>