<?php
session_start();

$usuario = $_SESSION['usuario'];
$sql = "SELECT * FROM contactos WHERE fk_usuario IN (SELECT id_usuario FROM usuarios WHERE usuario = '$usuario');";

if (!isset($usuario)) {
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
    <title>Contacto</title>
</head>

<body>

    <div class="container">
        <a href="your-notes.php">
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
                <li class="active">
                    <a href="contacto.php">Contactos</a>
                </li>
                <li>
                    <a href="perfil.php">Perfil</a>
                </li>
            </ul>
        </nav>

        <a href="add_contacto.php">
            <nav class="b_add">
                <span class="button__icon">
                    <img src="./img/add.svg">
                </span>Agregar Contacto
            </nav>
        </a>
    </div>

    <?php
    include("./back-end/conexion.php");

    $result = mysqli_query($conexion, $sql);
    while ($consulta = mysqli_fetch_array($result)) { ?>

        <div class="card">

            <div class="t_e_nota">
                <h3 class="t_notas"><?php echo $consulta['nombre']; ?> <?php echo $consulta['apellidos']; ?></h3>

                <a id="b_eliminar_contacto" href="./back-end/e_contacto.php?id_contacto=<?php echo $consulta['id_contacto']; ?>" onClicK='return ConfirmDelete()'>
                    <img src="./img/x.svg" class="e_notas">
                </a>
            </div>


            <div class="cont_cont">
                <p>Telefono:
                    <span><?php echo $consulta['telefono']; ?></span>
                </p>
                <p>Correo electronico:
                    <span><?php echo $consulta['email']; ?></span>
                </p>
            </div>


            <div class="f_a_notas">
                <p class="fecha">Fecha importante: <?php echo $consulta['fecha_importante']; ?></p>
                <form action='ac_contacto.php?id_contacto=<?php echo $consulta['id_contacto']; ?>' method='POST'>
                    <button type="submit" class="btn_a_nota">
                        <input type='hidden' name='id_contacto' value=' <?php echo $consulta['id_contacto']; ?>'>
                        <span class="button__icon_n">
                            <img src="./img/edit-b.svg">
                        </span>
                        <span>Actualizar contacto</span>
                    </button>
                </form>
            </div>

        </div>
    <?php } ?>


</body>

</html>

<script src="js/script.js"></script>
<script src="scripts/scriptRegs.js"></script>