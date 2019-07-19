<?php error_reporting(E_ALL ^ E_NOTICE);
include_once('../conexiones/conexione.php');
date_default_timezone_set("America/Bogota");
include_once('../evitar_mensaje_error/error.php'); 
include ("../session/funciones_admin.php");
if (verificar_usuario()){
//print "Bienvenido (a), <strong>".$_SESSION['usuario'].", </strong>al sistema.";
	} else { header("Location:../index.php");
}
$cuenta_actual = addslashes($_SESSION['usuario']);

include ("../registro_movimientos/registro_movimientos.php");
//include ("../registro_movimientos/registro_cierre_caja.php");

$obtener_cod_sesion = "SELECT cod_sesion FROM sesion WHERE usuario = '$cuenta_actual' ORDER BY cod_sesion DESC LIMIT 1";
$resultado_cod_sesion = mysqli_query($conectar, $obtener_cod_sesion) or die(mysqli_error($conectar));
$matriz_cod_sesion = mysqli_fetch_assoc($resultado_cod_sesion);

$cod_sesion = $matriz_cod_sesion['cod_sesion'];
$ips = $_SERVER['REMOTE_ADDR'];
$fecha_salida_time = time();

$agregar_regis = sprintf("UPDATE sesion SET fecha_salida_time = '$fecha_salida_time' WHERE cod_sesion = '$cod_sesion'");
$resultado_regis = mysqli_query($conectar, $agregar_regis) or die(mysqli_error($conectar));

if (verificar_usuario()){
session_unset();
session_destroy();
session_start();
session_regenerate_id(true);
header ("Location:../index.php");
} else {
header ("Location:../index.php");
}
?>