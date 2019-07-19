<?php error_reporting(E_ALL ^ E_NOTICE);
include_once('../conexiones/conexione.php'); 
include_once('../evitar_mensaje_error/error.php'); 
 
include_once("../session/funciones_admin.php");
if (verificar_usuario()){
//print "Bienvenido (a), <strong>".$_SESSION['usuario'].", </strong>al sistema.";
	} else { header("Location:../index.php");
}
$cuenta_actual = addslashes($_SESSION['usuario']);

$tab       = addslashes($_GET['tab']);
$tipo      = addslashes($_GET['tipo']);
$campo     = addslashes($_GET['campo']);
$pagina    = addslashes($_GET['pagina']);

if ($tipo == 'eliminar' && $tab == 'cliente') {
$llave = addslashes($_GET['llave']);

$sql_datos = "SELECT * FROM cliente WHERE cod_cliente = '$llave'";
$resultado_datos = mysqli_query($conectar, $sql_datos);
$info_datos = mysqli_fetch_assoc($resultado_datos);

$cod_cliente = $info_datos['cod_cliente']; 
$cod_entidad = $info_datos['cod_entidad']; 
$cedula = $info_datos['cedula']; 
$nombres = $info_datos['nombres']; 
$apellido1 = $info_datos['apellido1'];
$apellido2 = $info_datos['apellido2']; 
$fecha_nac_ymd = $info_datos['fecha_nac_ymd']; 
$fecha_nac_time = $info_datos['fecha_nac_time']; 
$lugar_nac = $info_datos['lugar_nac']; 
$nombre_raza = $info_datos['nombre_raza']; 
$lugar_procedencia = $info_datos['lugar_procedencia']; 
$lugar_residencia = $info_datos['lugar_residencia']; 
$nombre_religion = $info_datos['nombre_religion']; 
$nombre_ocupacion = $info_datos['nombre_ocupacion']; 
$nombre_estado_civil = $info_datos['nombre_estado_civil']; 
$edad_anyo = $info_datos['edad_anyo']; 
$nombre_grupo_rh = $info_datos['nombre_grupo_rh']; 
$tel_cliente = $info_datos['tel_cliente']; 
$nombre_contacto1 = $info_datos['nombre_contacto1']; 
$tel_contacto1 = $info_datos['tel_contacto1']; 
$nombre_contacto2 = $info_datos['nombre_contacto2']; 
$tel_contacto2 = $info_datos['tel_contacto2']; 
$correo = $info_datos['correo']; 
$nombre_escolaridad = $info_datos['nombre_escolaridad']; 
$fax = $info_datos['fax']; 
$direccion = $info_datos['direccion']; 
$nombre_ciudad = $info_datos['nombre_ciudad']; 
$nombre_pais = $info_datos['nombre_pais']; 
$longitud = $info_datos['longitud']; 
$latitud = $info_datos['latitud']; 

$sql_data = "INSERT INTO elim_cliente (cod_cliente, cod_entidad, cedula, nombres, apellido1, apellido2, fecha_nac_ymd, fecha_nac_time, 
lugar_nac, nombre_raza, lugar_procedencia, lugar_residencia, nombre_religion, nombre_ocupacion, 
nombre_estado_civil, edad_anyo, nombre_grupo_rh, tel_cliente, nombre_contacto1, tel_contacto1, 
nombre_contacto2, tel_contacto2, correo, nombre_escolaridad, fax, direccion, nombre_ciudad, nombre_pais, longitud, latitud) 
VALUES ('$cod_cliente', '$cod_entidad', '$cedula', '$nombres', '$apellido1', '$apellido2', '$fecha_nac_ymd', '$fecha_nac_time', 
'$lugar_nac', '$nombre_raza', '$lugar_procedencia', '$lugar_residencia', '$nombre_religion', '$nombre_ocupacion', 
'$nombre_estado_civil', '$edad_anyo', '$nombre_grupo_rh', '$tel_cliente', '$nombre_contacto1', '$tel_contacto1', 
'$nombre_contacto2', '$tel_contacto2', '$correo', '$nombre_escolaridad', '$fax', '$direccion', '$nombre_ciudad', '$nombre_pais', '$longitud', '$latitud')";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));


$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>">
<?php
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'historia_clinica') {
$llave = intval($_GET['llave']);

$sql_data = "INSERT INTO historia_clinica_copia SELECT * FROM historia_clinica WHERE $campo = '$llave'";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>">
<?php
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'cie10diag') {
$llave                     = intval($_GET['llave']);
$cod_historia_clinica      = intval($_GET['cod_historia_clinica']);
$cod_cliente               = intval($_GET['cod_cliente']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>?cod_historia_clinica=<?php echo $cod_historia_clinica?>&cod_cliente=<?php echo $cod_cliente?>&pagina=<?php echo $pagina?>">
<?php
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'tipo_regimen') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?> <META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>"> <?php }
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'grupo_area_cargo') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?> <META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>"> <?php }
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'tipo_doc') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?> <META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>"> <?php }
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'sexo') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?> <META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>"> <?php }
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'religion') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?> <META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>"> <?php }
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'raza') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?> <META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>"> <?php }
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'numero_hijos') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?> <META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>"> <?php }
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'grupo_rh') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?> <META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>"> <?php }
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'fondo_pension') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?> <META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>"> <?php }
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'estado_civil') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?> <META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>"> <?php }
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'escolaridad') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?> <META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>"> <?php }
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'empresa') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?> <META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>"> <?php }
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'empresa_contratante') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?> <META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>"> <?php }
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'arl') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?> <META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>"> <?php }
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'entidad') {
$llave = addslashes($_GET['llave']);

$sql_datos = "SELECT * FROM entidad WHERE cod_entidad = '$llave'";
$resultado_datos = mysqli_query($conectar, $sql_datos);
$info_datos = mysqli_fetch_assoc($resultado_datos);

$cod_entidad = $info_datos['cod_entidad']; 
$cod_eps = $info_datos['cod_eps']; 
$nombre_entidad = $info_datos['nombre_entidad']; 
$direccion = $info_datos['direccion']; 
$telefono = $info_datos['telefono']; 
$correo = $info_datos['correo']; 
$atiende = $info_datos['atiende'];

$sql_data = "INSERT INTO elim_entidad (cod_entidad, cod_eps, nombre_entidad, direccion, telefono, correo, atiende) 
VALUES ('$cod_entidad', '$cod_eps', '$nombre_entidad', '$direccion', '$telefono', '$correo', '$atiende')";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>">
<?php
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'laboratorio') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>">
<?php
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'medicamento') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>">
<?php
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'ayuda_diagnostica') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>">
<?php
}
if ($tipo == 'eliminar' && $tab == 'actividad_ecoemp') {
$llave = addslashes($_GET['llave']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>">
<?php
}
//----------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------//
if ($tipo == 'eliminar' && $tab == 'administrador') {
$llave = addslashes($_GET['llave']);

$sql_datos = "SELECT * FROM administrador WHERE cod_administrador = '$llave'";
$resultado_datos = mysqli_query($conectar, $sql_datos);
$info_datos = mysqli_fetch_assoc($resultado_datos);

$cod_administrador = $info_datos['cod_administrador']; 
$nombres = $info_datos['nombres']; 
$apellidos = $info_datos['apellidos']; 
$nombre_sexo = $info_datos['nombre_sexo']; 
$cuenta = $info_datos['cuenta']; 
$contrasena = $info_datos['contrasena']; 
$creador = $info_datos['creador'];
$correo = $info_datos['correo']; 
$cod_seguridad = $info_datos['cod_seguridad']; 
$cod_base_caja = $info_datos['cod_base_caja']; 
$estilo_css = $info_datos['estilo_css']; 
$fecha = $info_datos['fecha']; 
$fecha_hora = $info_datos['fecha_hora'];

$sql_data = "INSERT INTO elim_administrador (cod_administrador, nombres, apellidos, nombre_sexo, cuenta, contrasena, creador, correo, cod_seguridad, cod_base_caja, 
estilo_css, fecha, fecha_hora) 
VALUES ('$cod_administrador', '$nombres', '$apellidos', '$nombre_sexo', '$cuenta', '$contrasena', '$creador', '$correo', '$cod_seguridad', '$cod_base_caja', 
'$estilo_css', '$fecha', '$fecha_hora')";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));


$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>">
<?php
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8"> 
<title>ALMACEN</title>
</head>
<body>
</body>
</html>