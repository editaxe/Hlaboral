<?php error_reporting(E_ALL ^ E_NOTICE);
include_once('../conexiones/conexione.php'); 
include_once('../evitar_mensaje_error/error.php'); 
 
include_once("../session/funciones_admin.php");
if (verificar_usuario()){
//print "Bienvenido (a), <strong>".$_SESSION['usuario'].", </strong>al sistema.";
	} else { header("Location:../index.php");
}
$cuenta_actual = addslashes($_SESSION['usuario']);

$tab       = addslashes($_POST['tab']);
$tipo      = addslashes($_POST['tipo']);
$campo     = addslashes($_POST['campo']);
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'cie10diag') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'historia_clinica') {
$llave                     = intval($_POST['llave']);

$sql_data = "INSERT INTO historia_clinica_copia SELECT * FROM historia_clinica WHERE $campo = '$llave'";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'historia_clinica_cita') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM historia_clinica WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'actitud_laboral') {
$llave                     = intval($_POST['llave']);

$sql_data = "INSERT INTO actitud_laboral_copia SELECT * FROM actitud_laboral WHERE $campo = '$llave'";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'manipulacion_alimento') {
$llave                     = intval($_POST['llave']);

$sql_data = "INSERT INTO manipulacion_alimento_copia SELECT * FROM manipulacion_alimento WHERE $campo = '$llave'";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'trabajo_altura') {
$llave                     = intval($_POST['llave']);

$sql_data = "INSERT INTO trabajo_altura_copia SELECT * FROM trabajo_altura WHERE $campo = '$llave'";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'cliente') {
$llave                     = intval($_POST['llave']);

$sql_data = "INSERT INTO cliente_copia SELECT * FROM cliente WHERE $campo = '$llave'";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'grupo_area_cargo') {
$llave                     = intval($_POST['llave']);

$sql_data = "INSERT INTO grupo_area_cargo_copia SELECT * FROM grupo_area_cargo WHERE $campo = '$llave'";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'empresa') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'empresa_contratante') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'escolaridad') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'estado_civil') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'fondo_pension') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'informe_condiciones_salud') {
$llave                     = intval($_POST['llave']);

//$sql_data = "INSERT INTO informe_condiciones_salud_copia SELECT * FROM informe_condiciones_salud WHERE $campo = '$llave'";
//$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'remision') {
$llave                     = intval($_POST['llave']);

$sql_data = "INSERT INTO remision_copia SELECT * FROM remision WHERE $campo = '$llave'";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'entidad') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'actividad_ecoemp') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'administrador') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'empresa_contratante') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'grupo_rh') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'numero_hijos') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'raza') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'religion') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'sexo') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'arl') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'tipo_regimen') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
elseif ($tipo == 'eliminar' && $tab == 'tipo_doc') {
$llave                     = intval($_POST['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
?>