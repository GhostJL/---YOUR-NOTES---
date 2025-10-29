<?php
include("./back-end/conexion.php");

$id_contacto = $_GET['id_contacto'];
$sql = "SELECT * FROM contactos WHERE id_contacto = '$id_contacto'";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Agregando contacto</title>
</head>

<body>
    <div class="container">
        <a href="contacto.php">
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
        <form action="./back-end/oac_contacto.php" method="post" class="form_gen">
            <h1 class="t_add_n">Agregando contacto</h1>
            <br>
            <input type="text" name="nombre" placeholder="Nombre" required="text" class="i_form" required="text" onkeypress="return sololetras(event);" value="<?= $consulta['nombre'] ?>">
            <input type="text" name="apellidos" placeholder="Apellidos" class="i_form" value="<?= $consulta['apellidos'] ?>">
            <input type="number" name="telefono" placeholder="Telefono" required="number" class="i_form" onkeypress="return solonumeros(event);" value="<?= $consulta['telefono'] ?>">
            <input type="email" name="email" placeholder="Email" class="i_form" onclick="ValidateEmail(document.form1.text1)" value="<?= $consulta['email'] ?>">
            <br>
            <label class="l_form">Fecha importante:</label>
            <input type="date" name="fecha_importante" class="i_form" value="<?= $consulta['fecha_importante'] ?>">

            <input type='hidden' name='id_contacto' value=' <?php echo $consulta['id_contacto']; ?>'>

            <div class="fixed1">
                <button type="submit" class="button2" id="b_actualizar_contacto">
                    <span>
                        <img src="./img/save.svg">
                    </span>
                    <span class="button__text">Actualizar contacto</span>
                </button>
            </div>
        </form>
    <?php } ?>
</body>

</html>

<script src="js/script.js"></script>
<script src="scripts/scriptRegs.js"></script>