<?php 
function conexiones($usuario, $clave) {
include_once('../conexiones/conexione_sesion.php');
include_once('../admin/class_php/funcion_cryptor_descryptor_class.php');

$buscar_usuario = "SELECT cod_administrador, cuenta, contrasena, cod_seguridad, cod_tipo_historia_clinica, nombres, apellidos, nombre_sexo 
FROM administrador WHERE cuenta = '$usuario' AND contrasena = '$clave'";
$ejecutar_sql = mysqli_query($conectar2, $buscar_usuario);
$datax = mysqli_fetch_assoc($ejecutar_sql);

$cod_seguridad_sec                  = $datax['cod_seguridad'];
$cod_administrador_sec              = $datax['cod_administrador'];
$cod_tipo_historia_clinica_sec      = $datax['cod_tipo_historia_clinica'];
$nombres_sec                        = $datax['nombres'];
$apellidos_sec                      = $datax['apellidos'];
$nombre_sexo_sec                    = $datax['nombre_sexo'];

if ($cod_seguridad_sec == 1) { $pag_redirec_sesion_descryp = "lista_cita_historia_clinica_individual.php";
$pag_redirec_sesion_cryp = DAXCRYPTOR::encriptardax($pag_redirec_sesion_descryp);
}
if ($cod_seguridad_sec == 2) { $pag_redirec_sesion_descryp = "lista_crear_cita.php";
$pag_redirec_sesion_cryp = DAXCRYPTOR::encriptardax($pag_redirec_sesion_descryp);
}
if ($cod_seguridad_sec == 3) { $pag_redirec_sesion_descryp = "lista_crear_cita.php";
$pag_redirec_sesion_cryp = DAXCRYPTOR::encriptardax($pag_redirec_sesion_descryp);
}
if ($cod_seguridad_sec == 4) { $pag_redirec_sesion_descryp = "lista_crear_cita.php";
$pag_redirec_sesion_cryp = DAXCRYPTOR::encriptardax($pag_redirec_sesion_descryp);
}
if ($cod_seguridad_sec == 5) { $pag_redirec_sesion_descryp = "lista_crear_cita.php";
$pag_redirec_sesion_cryp = DAXCRYPTOR::encriptardax($pag_redirec_sesion_descryp);
}
//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//
$sql_autoincremento_sesion = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$base_datos2' AND TABLE_NAME = 'sesion'";
$exec_autoincremento_sesion = mysqli_query($conectar2, $sql_autoincremento_sesion) or die(mysqli_error($conectar2));
$datos_autoincremento_sesion = mysqli_fetch_assoc($exec_autoincremento_sesion);
$cod_sesion = $datos_autoincremento_sesion['AUTO_INCREMENT'];
//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//
$randomize1_pos4_ini               = rand(1000, 9999);
$randomize1_pos4_fin               = rand(1000, 9999);
$cantidad_digito1                  = strlen($cod_seguridad_sec);
$codif1                            = $cantidad_digito1.$randomize1_pos4_ini.$cod_seguridad_sec.$randomize1_pos4_fin;
//---------------------------------------------------------------------------------------------------------------------------------//
$randomize2_pos4_ini               = rand(1000, 9999);
$randomize2_pos4_fin               = rand(1000, 9999);
$cantidad_digito2                  = strlen($cod_administrador_sec);
$codif2                            = $cantidad_digito2.$randomize2_pos4_ini.$cod_administrador_sec.$randomize2_pos4_fin;
//---------------------------------------------------------------------------------------------------------------------------------//
$randomize3_pos4_ini               = rand(1000, 9999);
$randomize3_pos4_fin               = rand(1000, 9999);
$cantidad_digito3                  = strlen($cod_sesion);
$codif3                            = $cantidad_digito3.$randomize3_pos4_ini.$cod_sesion.$randomize3_pos4_fin;
//---------------------------------------------------------------------------------------------------------------------------------//
$randomize4_pos4_ini               = rand(1000, 9999);
$randomize4_pos4_fin               = rand(1000, 9999);
$cantidad_digito4                  = strlen($cod_tipo_historia_clinica_sec);
$codif4                            = $cantidad_digito4.$randomize4_pos4_ini.$cod_tipo_historia_clinica_sec.$randomize4_pos4_fin;
//---------------------------------------------------------------------------------------------------------------------------------//
$cod_seguridad_codif               = str_pad($codif1, 15, $randomize1_pos4_ini, STR_PAD_RIGHT);
$cod_administrador_codif           = str_pad($codif2, 15, $randomize2_pos4_ini, STR_PAD_RIGHT);
$tokn_codif                        = str_pad($codif3, 15, $randomize3_pos4_ini, STR_PAD_RIGHT);
$cod_tipo_historia_clinica_codif   = str_pad($codif4, 15, $randomize4_pos4_ini, STR_PAD_RIGHT);
//---------------------------------------------------------------------------------------------------------------------------------//
$usuario_cryp                      = DAXCRYPTOR::encriptardax($usuario);
$cod_seguridad_cryp                = DAXCRYPTOR::encriptardax($cod_seguridad_codif);
$cod_administrador_cryp            = DAXCRYPTOR::encriptardax($cod_administrador_codif);
$tokn_cryp                         = DAXCRYPTOR::encriptardax($tokn_codif);
$cod_tipo_historia_clinica_cryp    = DAXCRYPTOR::encriptardax($cod_tipo_historia_clinica_codif);
$nombres_cryp                      = DAXCRYPTOR::encriptardax($nombres_sec);
$apellidos_cryp                    = DAXCRYPTOR::encriptardax($apellidos_sec);
$nombre_sexo_cryp                  = DAXCRYPTOR::encriptardax($nombre_sexo_sec);
//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//
if (mysqli_num_rows($ejecutar_sql)!=0) {
//session_name("usuario"); 
session_start();
 
//$_SESSION['usuario'] = $usuario;
$_SESSION['usuario_cryp']                     = $usuario_cryp;
$_SESSION['cs_cryp']                          = $cod_seguridad_cryp;
$_SESSION['ca_cryp']                          = $cod_administrador_cryp;
$_SESSION['tokn_cryp']                        = $tokn_cryp;
$_SESSION['pag_redirec_sesion_cryp']          = $pag_redirec_sesion_cryp;
$_SESSION['cod_tipo_historia_clinica_cryp']   = $cod_tipo_historia_clinica_cryp;
$_SESSION['nombres_cryp']                     = $nombres_cryp;
$_SESSION['apellidos_cryp']                   = $apellidos_cryp;
$_SESSION['nombre_sexo_cryp']                 = $nombre_sexo_cryp;
//$usuario_descryp = DAXCRYPTOR::descriptardax($usuario_cryp);
//$cod_seguridad_descryp = DAXCRYPTOR::descriptardax($cod_seguridad_cryp);
//$cod_administrador_descryp = DAXCRYPTOR::descriptardax($cod_administrador_cryp);
return true;
} else {
return false;
	}
}
function verificar_usuario() {
/* Establecemos que las paginas no pueden ser cacheadas */
header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
//session_name("usuario"); 
session_start();
if ($_SESSION['usuario_cryp']) {
// 
return true;		
	}
}
?>