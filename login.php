<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Login</title>
</head>

<body>

    <div class="container">
        <a href="index.php">
            <h3>|--YOUR NOTES--|</h3>
        </a>
        <nav>
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
            </ul>
        </nav>

        <nav>
            <ul>
                <li class="active"><a href="login.php">Login</a></li>

                <li><a href="crear_cuenta.php">Crear cuenta</a></li>
            </ul>
        </nav>
    </div>

    <div class="content_log">
        <h1>Inicio de sesión</h1>
        <p>¡Hola, Bienvenido de vuelta!</p>
        <form action="./back-end/log.php" method="post">
            <div class="inputs_log">
                <p>Usuario</p>
                <input type="text" placeholder="Ingresa tu usuario" name="user">
                <p>Contraseña</p>
                <input type="password" placeholder="Ingresa tu contraseña" name="pass">
            </div>
            <input type="submit" class="btn_ac_cuenta" value="Iniciar sesión">
        </form>
    </div>


</body>

</html>