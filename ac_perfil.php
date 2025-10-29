<?php
include("./back-end/conexion.php");

$id_usuario  = $_GET['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id_usuario  = '$id_usuario'";

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
        <nav>
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
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

        <nav>
            <ul>
                <li><a href="login.php">Login</a></li>

                <li><a href="crear_cuenta.php">Crear cuenta</a></li>
            </ul>
        </nav>
    </div>

    <?php
    $result = mysqli_query($conexion, $sql);
    while ($consulta = mysqli_fetch_assoc($result)) { ?>

        <div class="card_perfil">
            <h1>Actualizar cuenta</h1>

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
                    
                    <input type="submit" class="btn_ac_cuenta" id="b_actualizar_perfil" value="Actualizar datos">
                </div>
            </form>
            <div class="btns">
                <form action='./back-end/e_usuario.php' method='POST'>
                    <input type='hidden' name='id_usuario' value='<?php echo $consulta['id_usuario']; ?>'>
                    <input type="submit" class="btn_el_cuenta" id="b_eliminar_cuenta" value="Eliminar cuenta" onClicK='return ConfirmDelete()'>
                </form>
            </div>
        </div>

    <?php } ?>

</body>

</html>

<script src="js/script.js"></script>
<script src="scripts/scriptRegs.js"></script>