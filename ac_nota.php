<?php
include("./back-end/conexion.php");

$id_nota = $_GET['id_nota'];
$sql = "SELECT * FROM notas WHERE id_nota = '$id_nota'";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Actualizando nota</title>
</head>

<body>
    <div class="container">
        <a href="notas.php">
            <button class="back">
                <span class="button__icon">
                    <img src="./img/arrow-left.svg">
                </span>
            </button>
        </a>
    </div>

    <?php
    $result = mysqli_query($conexion, $sql);
    while ($consulta = mysqli_fetch_assoc($result)) { ?>

        <form action="./back-end/oac_nota.php" method="post" class="form_gen" name="formNota">
            <h1 class="t_add_n">Actualizando nota</h1>
            <input type="text" name="titulo" placeholder="Titulo" class="i_titulo" required="text" value="<?= $consulta['titulo'] ?>">
            <textarea class="i_area" name="contenido" placeholder="Contenido de nota" maxlength="250" required="text"><?= $consulta['contenido'] ?></textarea>
            <input type="date" name="fecha" id="fechaActual" class="fecha_a" readonly>
            <input type='hidden' name='id_nota' value=' <?php echo $consulta['id_nota']; ?>'>

            <div class="fixed1">
                <button type="submit" class="button1" id="b_actualizar_nota" data-contenido="<?php echo $consulta['titulo'] . ' , ' . $consulta['contenido']; ?>">
                    <span class="button__icon">
                        <img src="./img/save.svg">
                    </span>
                    <span class="button__text">Actualizar nota</span>
                </button>
            </div>
        </form>

    <?php } ?>
</body>

</html>

<script src="js/script.js"></script>
<script src="scripts/scriptRegs.js"></script>