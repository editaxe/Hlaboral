<?php
date_default_timezone_set("America/Bogota");
header( 'Content-Type: application/json' );
require_once('../conexiones/conexione.php');

$fecha_ini                   = addslashes($_GET['fecha_ini']);
$fecha_fin                   = addslashes($_GET['fecha_fin']);
$nombre_empresa              = addslashes($_GET['nombre_empresa']);
$motivo                      = addslashes($_GET['motivo']);
$motivo2                     = addslashes($_GET['motivo2']);
$fecha_hoy_ymd_seg           = strtotime(date("Y/m/d"));

$query1 = "SELECT historia_clinica.fecha_ymd, historia_clinica.cod_estado_facturacion, historia_clinica.nombre_empresa, historia_clinica.motivo, Count(cie10diag.cie10_diag) AS conteo_cie10_cod, cie10diag.cie10_diag
FROM historia_clinica LEFT JOIN cie10diag ON historia_clinica.cod_historia_clinica = cie10diag.cod_historia_clinica
WHERE ((historia_clinica.fecha_ymd BETWEEN '$fecha_ini' AND '$fecha_fin') AND (historia_clinica.nombre_empresa='$nombre_empresa') AND ((historia_clinica.motivo='$motivo') OR (historia_clinica.motivo='$motivo2')) AND (historia_clinica.cod_estado_facturacion=1)) 
GROUP BY historia_clinica.nombre_empresa, cie10diag.cie10_diag, historia_clinica.motivo ORDER BY conteo_cie10_cod DESC LIMIT 0,20";
$result1 = mysqli_query($conectar, $query1);

$prefix = '';
echo "[\n";

while ($dato01 = mysqli_fetch_assoc($result1)) { 

$conteo_cie10_cod          = $dato01['conteo_cie10_cod'];
$nombre_cie10_diag         = $dato01['cie10_diag'];

$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

echo $prefix . " {\n";

echo ' "color": "' .$color. '",';
echo ' "nombre_cie10_diag": "' .substr($nombre_cie10_diag, 0, 30). '",';
echo ' "conteo_cie10_cod": '  .intval($conteo_cie10_cod). ''. '';

echo " }";
$prefix = ",\n";
}

echo "\n]";
?>