<?php
include("conexion.php");

session_start();

$id_usuario = $_POST["id_usuario"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$usuario = $_POST["usuario"];


    $consulta = "SELECT * FROM usuarios WHERE usuario = '" . $usuario . "'";
    $consulta1 = "SELECT * FROM usuarios WHERE email = '" . $email . "'";
    $validando = $conexion->query($consulta);
    $validando1 = $conexion->query($consulta1);
    if ($validando->num_rows > 0) {
        echo "
        <script>
            alert('Este usuario ya esta en uso, por lo tanto solo se actualizaran tus demas datos');
        </script>
        ";
        
        if ($validando1->num_rows > 0) {
                echo "
                <script>
                    alert('El correo electronico ya existe, por lo tanto solo se actualizaran tus demas datos');
                </script>
                ";
                
                $actualizar = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos' WHERE id_usuario='$id_usuario'";
                    
                $result = mysqli_query($conexion, $actualizar);
                    
                if ($result) {
                    echo "
                    <script>
                        window.location='/perfil.php';
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                        alert('No se han actualizado los datos');window.location='../perfil.php';
                    </script>
                    ";
                }
                
        }else{
            $actualizar = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', email='$email' WHERE id_usuario='$id_usuario'";
                
            $result = mysqli_query($conexion, $actualizar);
                
            if ($result) {
                echo "
                <script>
                    alert('Se han actualizado los datos');window.location='/perfil.php';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('No se han actualizado los datos');window.location='../perfil.php';
                </script>
                ";
            }
        }
        
    }else{
        
        if ($validando1->num_rows > 0) {
                echo "
                <script>
                    alert('El correo electronico ya existe, por lo tanto solo se actualizaran tus demas datos');
                </script>
                ";
                
                $actualizar = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', usuario='$usuario' WHERE id_usuario='$id_usuario'";
                    
                $result = mysqli_query($conexion, $actualizar);
                    
                if ($result) {
                    $_SESSION['usuario'] = $usuario;
                    echo "
                    <script>
                        window.location='/perfil.php';
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                        alert('No se han actualizado los datos');window.location='../perfil.php';
                    </script>
                    ";
                }
                
        }else{
            $actualizar = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', usuario='$usuario', email='$email' WHERE id_usuario='$id_usuario'";
                
            $result = mysqli_query($conexion, $actualizar);
                
            if ($result) {
                $_SESSION['usuario'] = $usuario;
                echo "
                <script>
                    alert('Se han actualizado los datos');window.location='/perfil.php';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('No se han actualizado los datos');window.location='../perfil.php';
                </script>
                ";
            }
        }
        
    }
?>