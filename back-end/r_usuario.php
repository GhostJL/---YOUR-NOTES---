<?php
include("conexion.php");
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["correo"];
$user = $_POST["user"];
$pass = $_POST["pass"];

    $consulta = "SELECT * FROM usuarios WHERE usuario = '" . $user . "' || email = '" . $email . "'";
    $validando = $conexion->query($consulta);
    if ($validando->num_rows > 0) {
            echo "
            <script>
                alert('El usuario y/o correo electronico ya existen');window.location='/crear_cuenta.php';
            </script>
            ";
    }else{

    $sql = "INSERT INTO `usuarios`(`nombre`, `apellidos`, `email`, `usuario`, `password`) 
    VALUES ('" . $nombre . "','" . $apellido . "','" . $email . "','" . $user . "','" . $pass . "')";

        if (mysqli_query($conexion, $sql)) {
            echo "
            <script>
                alert('Se creado la cuenta con exito');window.location='/index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Error al crear la cuenta'".$sql."<br>". mysqli_error($conexion);"'window.location='/crear_cuenta.php';
            </script>
            ";
        }
    }

?>