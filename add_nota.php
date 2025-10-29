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
    <title>Agregando nota</title>
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

    <form action="./back-end/r_nota.php" method="post" class="form_gen" name="formNota">
        <input type="hidden" name="fuente" value="pagina_notas">
        <h1 class="t_add_n">Agregando nota</h1>
        <input type="text" name="titulo" placeholder="Titulo" class="i_titulo" required="text">
        <textarea class="i_area" name="contenido" placeholder="Contenido de nota" maxlength="245" required="text"></textarea>
        <input type="date" name="fecha" id="fechaActual" value="" class="fecha_a" readonly>
        <input type="hidden" name="id_usuario" value="<?php echo $usuario ?>">
        <div class="fixed1">
                <button type="submit" class="button1" id="b_agregar_nota">
                    <span class="button__icon">
                        <img src="./img/add.svg">
                    </span>
                    <span class="button__text">Agregar nota</span>
                </button>
        </div>
    </form>
</body>

</html>

<script src="scripts/scriptRegs.js"></script>
<script src="js/script.js"></script>