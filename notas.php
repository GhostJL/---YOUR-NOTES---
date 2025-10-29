<?php
session_start();

$usuario = $_SESSION['usuario'];
$nombreUsuario = $_SESSION['nombre'];

$sql = "SELECT * FROM notas WHERE fk_usuario IN (SELECT id_usuario FROM usuarios WHERE usuario = '$usuario');";

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
    <title>Notas</title>
    
</head>

<body>

    <div class="container">
        <a href="your-notes.php">
            <h3>|--YOUR NOTES--|</h3>
        </a>

        <nav>
            <ul>
                <li>
                    <a href="your-notes.php" id="m-inicio">Inicio</a>
                </li>
                <li class="active">
                    <a href="notas.php" id="m-notas">Notas</a>
                </li>
                <li>
                    <a href="contacto.php">Contactos</a>
                </li>
                <li>
                    <a href="perfil.php">Perfil</a>
                </li>
            </ul>
        </nav>

        <a href="add_nota.php">
            <nav class="b_add">
                <span class="button__icon">
                    <img src="./img/add.svg">
                </span>Agregar nota
            </nav>
        </a>
    </div>

    <?php
    include("./back-end/conexion.php");

    $result = mysqli_query($conexion, $sql);
    while ($consulta = mysqli_fetch_array($result)) { ?>

        <div class="card">
            <div class="t_e_nota">
                <h3 class="t_notas"><?php echo $consulta['titulo']; ?></h3>
                <a id="b_eliminar_nota" href="./back-end/e_nota.php?id_nota=<?php echo $consulta['id_nota']; ?>" data-contenido="<?php echo $consulta['titulo'] . ' , ' . $consulta['contenido']; ?>" onclick='registrarEvento(this); return ConfirmDelete()'>
                    <img src="./img/x.svg" class="e_notas">
                </a>
            </div>

            <p class="cont"><?php echo $consulta['contenido']; ?></p>

            <div class="f_a_notas">
                <p class="fecha">Fecha: <?php echo $consulta['fecha_creacion']; ?></p>

                <form action='ac_nota.php?id_nota=<?php echo $consulta['id_nota']; ?>' method='POST'>
                    <button type="submit" class="btn_a_nota">
                        <input type='hidden' name='Id' value=' <?php echo $consulta['id_nota']; ?>'>
                        <span class="button__icon_n">
                            <img src="./img/edit-b.svg">
                        </span>
                        <span>Actualizar nota</span>
                    </button>

                </form>
            </div>
        </div>

    <?php } ?>

</body>

</html>
<script src="scripts/scriptRegs.js"></script>
<script src="js/script.js"></script>