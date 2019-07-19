<?php
date_default_timezone_set("America/Bogota");
header( 'Content-Type: application/json' );
require_once('../conexiones/conexione.php');

$fecha_ini                   = addslashes($_GET['fecha_ini']);
$fecha_fin                   = addslashes($_GET['fecha_fin']);
$nombre_empresa              = addslashes($_GET['nombre_empresa']);
$fecha_hoy_ymd_seg           = strtotime(date("Y/m/d"));

$query = "SELECT Count(cliente.nombre_sexo) AS conteo_nombre_sexo, cliente.nombre_sexo, historia_clinica.nombre_empresa
FROM cliente RIGHT JOIN historia_clinica ON cliente.cod_cliente = historia_clinica.cod_cliente WHERE ((historia_clinica.fecha_ymd BETWEEN '$fecha_ini' AND '$fecha_fin') AND ((historia_clinica.nombre_empresa)='$nombre_empresa'))
GROUP BY cliente.nombre_sexo";
$result = mysqli_query($conectar, $query);

// Print out datoss
$prefix = '';
echo "[\n";
while ($datos = mysqli_fetch_assoc($result) ) {

$nombre_sexo = $datos['nombre_sexo'];
if ($nombre_sexo == 'M') { $nombre_sexo          = 'MASCULINO'; }
if ($nombre_sexo == 'F') { $nombre_sexo          = 'FEMENINO'; }
$conteo_nombre_sexo = intval($datos['conteo_nombre_sexo']);

echo $prefix . " {\n";
echo '  "nombre_sexo02": "' . $nombre_sexo . '",';
echo '  "conteo_nombre_sexo02": ' . intval($conteo_nombre_sexo) . '';
//echo '  "nombre_pais": "' . $nombre_pais . '"';
//echo '  "color": "' . $color . '"';
echo " }";
$prefix = ",\n";
}
echo "\n]";
?>