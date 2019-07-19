<?php
$conexion_servidor = "localhost";
$base_datos = "base_datos";
$conexion_usuario = "usuario";
$conexion_contrasena_descrip = "";

$clave = stripslashes($conexion_contrasena_descrip);
$clave = strip_tags($clave);
$conexion_contrasena = md5($clave);

$conectar = mysqli_connect($conexion_servidor, $conexion_usuario, $conexion_contrasena, $base_datos);
mysqli_set_charset($conectar,"utf8");
?>