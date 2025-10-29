<?php

$conexion = new mysqli("localhost","usuario","contraseña","bd_nombre");

if (!$conexion) {
	echo "Conexion no establecida ";
}

?>
