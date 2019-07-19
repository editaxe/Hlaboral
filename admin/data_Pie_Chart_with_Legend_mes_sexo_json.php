<?php
date_default_timezone_set("America/Bogota");
header( 'Content-Type: application/json' );
require_once('../conexiones/conexione.php');

$fecha                       = addslashes($_GET['fecha']);
$tipo_fecha                  = addslashes($_GET['tipo_fecha']);
$nombre_empresa              = addslashes($_GET['nombre_empresa']);
$fecha_hoy_ymd_seg           = strtotime(date("Y/m/d"));

$query1 = "SELECT Count(cliente.nombre_sexo) AS conteo_nombre_sexo, cliente.nombre_sexo, historia_clinica.nombre_empresa
FROM cliente RIGHT JOIN historia_clinica ON cliente.cod_cliente = historia_clinica.cod_cliente 
WHERE (((historia_clinica.$tipo_fecha)='$fecha') AND ((historia_clinica.cod_estado_facturacion)=1) AND ((cliente.nombre_sexo)='M') AND ((historia_clinica.nombre_empresa)='$nombre_empresa'))
GROUP BY cliente.nombre_sexo";
$result1 = mysqli_query($conectar, $query1);
$datos1 = mysqli_fetch_assoc($result1);

$query2= "SELECT Count(cliente.nombre_sexo) AS conteo_nombre_sexo, cliente.nombre_sexo, historia_clinica.nombre_empresa
FROM cliente RIGHT JOIN historia_clinica ON cliente.cod_cliente = historia_clinica.cod_cliente 
WHERE (((historia_clinica.$tipo_fecha)='$fecha') AND ((historia_clinica.cod_estado_facturacion)=1) AND ((cliente.nombre_sexo)='F') AND ((historia_clinica.nombre_empresa)='$nombre_empresa'))
GROUP BY cliente.nombre_sexo";
$result2 = mysqli_query($conectar, $query2);
$datos2 = mysqli_fetch_assoc($result2);

$sexo_masculino         = $datos1['conteo_nombre_sexo'];
$sexo_femenino          = $datos2['conteo_nombre_sexo'];
$total_sexo             = $sexo_masculino + $sexo_femenino;
$vector_sexo            = array($sexo_masculino, $sexo_femenino);

$prefix = '';
echo "[\n";
$contador = 0;

foreach ($vector_sexo as &$conteo_sexo) {

$contador ++;

if ($contador == '1') { $nombre_sexo          = 'MASCULINO'; }
if ($contador == '2') { $nombre_sexo          = 'FEMENINO'; }

echo $prefix . " {\n";
echo '  "nombre_sexo": "' . $nombre_sexo . '",';
echo '  "conteo_nombre_sexo": ' . intval($conteo_sexo) . '';
//echo '  "nombre_pais": "' . $nombre_pais . '"';
//echo '  "color": "' . $color . '"';
echo " }";
$prefix = ",\n";
}
echo "\n]";
?>