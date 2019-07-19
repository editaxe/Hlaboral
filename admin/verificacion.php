<?php
include_once('../conexiones/conexione.php'); 
include_once('../evitar_mensaje_error/error.php');
include ("../session/funciones_admin.php");
date_default_timezone_set("America/Bogota");

$usuario = stripslashes($_POST['cuenta']);
$usuario = strip_tags($usuario);
$clave = addslashes($_POST['contrasena']);

if (conexiones($usuario, $clave)) {

if ($_SERVER) {
if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) { $ip = $_SERVER["HTTP_X_FORWARDED_FOR"]; } 
elseif (isset($_SERVER["HTTP_CLIENT_IP"])) { $ip = $_SERVER["HTTP_CLIENT_IP"]; } 
else { $ip = $_SERVER["REMOTE_ADDR"]; }
} else {  
if (getenv('HTTP_X_FORWARDED_FOR') ) { $ip = getenv('HTTP_X_FORWARDED_FOR'); } 
elseif (getenv('HTTP_CLIENT_IP') ) { $ip = getenv('HTTP_CLIENT_IP'); } 
else { $ip = getenv('REMOTE_ADDR'); }  
} 

if ($ip == '127.0.0.1') {
$ciudad               = "";
$region               = "";
$cod_area             = "";
$cod_dma              = "";
$nombre_pais          = "";
$cod_pais             = "";
$longitud             = "";
$latitud              = "";
} else {
include_once('../admin/class_php/geoplugin.class.php');

$geoplugin = new geoPlugin();
$geoplugin->locate();
//$ip                 = {$geoplugin->ip};
$ciudad               = "{$geoplugin->city}";
$region               = "{$geoplugin->region}";
$cod_area             = "{$geoplugin->areaCode}";
$cod_dma              = "{$geoplugin->dmaCode}";
$nombre_pais          = "{$geoplugin->countryName}";
$cod_pais             = "{$geoplugin->countryCode}";
$longitud             = "{$geoplugin->longitude}";
$latitud              = "{$geoplugin->latitude}";
}

$navegador = $_SERVER['HTTP_USER_AGENT'];
$fecha_entrada_time = time();

$pag_redirec_sesion_ini = DAXCRYPTOR::descriptardax($_SESSION['pag_redirec_sesion_cryp']);

$agregar_registros_sesion = "INSERT INTO sesion (usuario, ip, navegador, fecha_entrada_time, ciudad, region, cod_area, cod_dma, 
nombre_pais, cod_pais, longitud, latitud)
VALUES ('$usuario', '$ip', '$navegador', '$fecha_entrada_time', '$ciudad', '$region', '$cod_area', '$cod_dma', '$nombre_pais', 
'$cod_pais', '$longitud', '$latitud')";
$resultado_sql1 = mysqli_query($conectar, $agregar_registros_sesion) or die(mysqli_error($conectar));

header("Location:../admin/$pag_redirec_sesion_ini");
} else {
$error = 'El nombre de usuario o la contraseña no son correctos';
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0.1; ../admin/entrar.php?error=<?php echo $error ?>">
<?php
}
?>
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* FIN MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->