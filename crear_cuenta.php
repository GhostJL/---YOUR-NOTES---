<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Crear cuenta</title>
</head>

<body>

    <div class="container">
        <a href="divisiones.php">
            <h3>|--YOUR NOTES--|</h3>
        </a>
        <nav>
            <ul>
                <li>
                    <a href="index.php" id="a-inicio">Inicio</a>
                </li>
            </ul>
        </nav>

        <nav>
            <ul>
                <li><a href="login.php" id="a-login">Login</a></li>

                <li class="active"><a href="crear_cuenta.php" id="a-crear-cuenta">Crear cuenta</a></li>
            </ul>
        </nav>
    </div>

    <div class="content_cc">
        <h1>Crear cuenta</h1>
        <p>¡Hola, Bienvenido!</p>
        <form action="./back-end/r_usuario.php" method="post" class="f_user">
            <div class="inputs_log">
                <input type="text" name="nombre" placeholder="Nombres" id="inombre" required="text" onkeypress="return sololetras(event);">
                <input type="text" name="apellido" placeholder="Apellidos" id="iapellido" required="text" onkeypress="return sololetras(event);">
                <input type="email" name="correo" placeholder="Correo electronico" id="iemail" required="email" class="i_email" onclick="ValidateEmail(document.form1.text1)">
                <input type="text" name="user" placeholder="Usuario" id="iusuario" required="text">
                <input type="password" name="pass" placeholder="Contraseña" id="ipass" required="text" minlength="8">
                <br>
                <input type="submit" class="btn_ac_cuenta" value="Crear cuenta" id="bregistrar">
            </div>
        </form>
        <p>Pagina de prueba, no ingresar datos personales.</p>
    </div>

</body>

</html>

<script src="./scripts/script.js"></script>
<script src="js/script.js"></script>