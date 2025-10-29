<?php
include("./back-end/conexion.php");

session_start();
$usuario = $_SESSION['usuario'];

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

    <form action="./back-end/r_contacto.php" method="post" class="form_gen" id=formContacto>
        <h1 class="t_add_n">Agregando contacto</h1>
        <br>
        <input type="text" name="nombre" placeholder="Nombre" required="text" class="i_form" required="text" onkeypress="return sololetras(event);">
        <input type="text" name="apellido" placeholder="Apellidos" class="i_form">
        <input type="number" name="telefono" placeholder="Telefono" required="number" class="i_form" onkeypress="return solonumeros(event);">
        <input type="email" name="email" placeholder="Email" class="i_form" onclick="ValidateEmail(document.form1.text1)"> 
        <br>
        <label class="l_form">Fecha importante:</label>
        <input type="date" name="fecha" value="" class="i_form">
        <input type="hidden" name="id_usuario" value="<?php echo $usuario ?>">

        <div class="fixed">
            <button type="submit" class="button2" id="b_agregar_contacto">
                <span class="button__icon">
                    <img src="./img/add.svg">
                </span>
                <span class="button__text">Agregar contacto</span>
            </button>
        </div>
    </form>
</body>

</html>

<script src="scripts/scriptRegs.js"></script>
<script src="js/script.js"></script> 