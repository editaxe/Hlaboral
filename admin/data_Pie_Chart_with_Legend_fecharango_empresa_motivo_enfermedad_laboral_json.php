<?php 
date_default_timezone_set("America/Bogota");
header( 'Content-Type: application/json' );
require_once('../conexiones/conexione.php');

$fecha_ini                   = addslashes($_GET['fecha_ini']);
$fecha_fin                   = addslashes($_GET['fecha_fin']);
$nombre_empresa              = addslashes($_GET['nombre_empresa']);
$total_motivo                = intval($_GET['total_motivo']);
$total_muestra               = intval($_GET['total_muestra']);
$fecha_hoy_ymd_seg           = strtotime(date("Y/m/d"));

if ($total_motivo==1) { 
$motivo = addslashes($_GET['motivo']);

$motivos = "motivo='".$motivo."'";
$motivos_ = "historia_clinica.motivo='".$motivo."'";
}
elseif ($total_motivo==2) { 
$motivo = addslashes($_GET['motivo']);
$motivo2 = addslashes($_GET['motivo2']);

$motivos = "(motivo='".$motivo."') OR (motivo='".$motivo2."')";
$motivos_ = "(historia_clinica.motivo='".$motivo."') OR (historia_clinica.motivo='".$motivo2."')";
}
elseif ($total_motivo==3) { 
$motivo = addslashes($_GET['motivo']);
$motivo2 = addslashes($_GET['motivo2']);
$motivo3 = addslashes($_GET['motivo3']);

$motivos = "(motivo='".$motivo."') OR (motivo='".$motivo2."') OR (motivo='".$motivo3."')";
$motivos_ = "(historia_clinica.motivo='".$motivo."') OR (historia_clinica.motivo='".$motivo2."') OR (historia_clinica.motivo='".$motivo3."')";
}
elseif ($total_motivo==4) { 
$motivo = addslashes($_GET['motivo']);
$motivo2 = addslashes($_GET['motivo2']);
$motivo3 = addslashes($_GET['motivo3']);
$motivo4 = addslashes($_GET['motivo4']);

$motivos = "(motivo='".$motivo."') OR (motivo='".$motivo2."') OR (motivo='".$motivo3."') OR (motivo='".$motivo4."')";
$motivos_ = "(historia_clinica.motivo='".$motivo."') OR (historia_clinica.motivo='".$motivo2."') OR (historia_clinica.motivo='".$motivo3."') OR (historia_clinica.motivo='".$motivo4."')";
}
elseif ($total_motivo==5) { 
$motivo = addslashes($_GET['motivo']);
$motivo2 = addslashes($_GET['motivo2']);
$motivo3 = addslashes($_GET['motivo3']);
$motivo4 = addslashes($_GET['motivo4']);
$motivo5 = addslashes($_GET['motivo5']);

$motivos = "(motivo='".$motivo."') OR (motivo='".$motivo2."') OR (motivo='".$motivo3."') OR (motivo='".$motivo4."') OR (motivo='".$motivo5."')";
$motivos_ = "(historia_clinica.motivo='".$motivo."') OR (historia_clinica.motivo='".$motivo2."') OR (historia_clinica.motivo='".$motivo3."') OR (historia_clinica.motivo='".$motivo4."') OR (historia_clinica.motivo='".$motivo5."')";
}
elseif ($total_motivo==6) { 
$motivo = addslashes($_GET['motivo']);
$motivo2 = addslashes($_GET['motivo2']);
$motivo3 = addslashes($_GET['motivo3']);
$motivo4 = addslashes($_GET['motivo4']);
$motivo5 = addslashes($_GET['motivo5']);
$motivo6 = addslashes($_GET['motivo6']);

$motivos = "(motivo='".$motivo."') OR (motivo='".$motivo2."') OR (motivo='".$motivo3."') OR (motivo='".$motivo4."') OR (motivo='".$motivo5."') OR (motivo='".$motivo6."')";
$motivos_ = "(historia_clinica.motivo='".$motivo."') OR (historia_clinica.motivo='".$motivo2."') OR (historia_clinica.motivo='".$motivo3."') OR (historia_clinica.motivo='".$motivo4."') OR (historia_clinica.motivo='".$motivo5."') OR (historia_clinica.motivo='".$motivo6."')";
}
elseif ($total_motivo==7) { 
$motivo = addslashes($_GET['motivo']);
$motivo2 = addslashes($_GET['motivo2']);
$motivo3 = addslashes($_GET['motivo3']);
$motivo4 = addslashes($_GET['motivo4']);
$motivo5 = addslashes($_GET['motivo5']);
$motivo6 = addslashes($_GET['motivo6']);
$motivo7 = addslashes($_GET['motivo7']);

$motivos = "(motivo='".$motivo."') OR (motivo='".$motivo2."') OR (motivo='".$motivo3."') OR (motivo='".$motivo4."') OR (motivo='".$motivo5."') OR (motivo='".$motivo6."') OR (motivo='".$motivo7."')";
$motivos_ = "(historia_clinica.motivo='".$motivo."') OR (historia_clinica.motivo='".$motivo2."') OR (historia_clinica.motivo='".$motivo3."') OR (historia_clinica.motivo='".$motivo4."') OR (historia_clinica.motivo='".$motivo5."') OR (historia_clinica.motivo='".$motivo6."') OR (historia_clinica.motivo='".$motivo7."')";
}
elseif ($total_motivo==8) { 
$motivo = addslashes($_GET['motivo']);
$motivo2 = addslashes($_GET['motivo2']);
$motivo3 = addslashes($_GET['motivo3']);
$motivo4 = addslashes($_GET['motivo4']);
$motivo5 = addslashes($_GET['motivo5']);
$motivo6 = addslashes($_GET['motivo6']);
$motivo7 = addslashes($_GET['motivo7']);
$motivo8 = addslashes($_GET['motivo8']);

$motivos = "(motivo='".$motivo."') OR (motivo='".$motivo2."') OR (motivo='".$motivo3."') OR (motivo='".$motivo4."') OR (motivo='".$motivo5."') OR (motivo='".$motivo6."') OR (motivo='".$motivo7."') OR (motivo='".$motivo8."')";
$motivos_ = "(historia_clinica.motivo='".$motivo."') OR (historia_clinica.motivo='".$motivo2."') OR (historia_clinica.motivo='".$motivo3."') OR (historia_clinica.motivo='".$motivo4."') OR (historia_clinica.motivo='".$motivo5."') OR (historia_clinica.motivo='".$motivo6."') OR (historia_clinica.motivo='".$motivo7."') OR (historia_clinica.motivo='".$motivo8."')";
}

$query1 = "SELECT fecha_ymd, cod_estado_facturacion, Count(enf_lab) AS enf_lab, nombre_empresa, motivo
FROM historia_clinica 
WHERE ((fecha_ymd BETWEEN '$fecha_ini' AND '$fecha_fin') AND (nombre_empresa='$nombre_empresa') AND ($motivos) AND (cod_estado_facturacion=1) AND (enf_lab='SI'))
GROUP BY enf_lab";
$result1 = mysqli_query($conectar, $query1);
$dato01 = mysqli_fetch_assoc($result1);

$query2 = "SELECT fecha_ymd, cod_estado_facturacion, Count(enf_lab) AS enf_lab, nombre_empresa, motivo
FROM historia_clinica 
WHERE ((fecha_ymd BETWEEN '$fecha_ini' AND '$fecha_fin') AND (nombre_empresa='$nombre_empresa') AND ($motivos) AND (cod_estado_facturacion=1) AND (enf_lab='NO'))
GROUP BY enf_lab";
$result2 = mysqli_query($conectar, $query2);
$dato02 = mysqli_fetch_assoc($result2);

$enf_lab_si                = $dato01['enf_lab'];
$enf_lab_no                = $dato02['enf_lab'];
$vector_enf_lab    = array($enf_lab_si, $enf_lab_no);

$prefix = '';
echo "[\n";
$contador = 0;

//for ($i=0; $i < 7; $i++) { 
foreach ($vector_enf_lab as &$conteo_enf_lab) {
echo $prefix . " {\n";

$contador ++;
if ($contador == 1) {
$nombre_enf_lab = 'CON ENFERMEDAD';
echo ' "nombre_enf_lab": "' .$nombre_enf_lab. '",';
echo ' "conteo_enf_lab": '  .intval($conteo_enf_lab). ''. '';
}
if ($contador == 2) {
$nombre_enf_lab = 'SIN ENFERMEDAD';
echo ' "nombre_enf_lab": "' .$nombre_enf_lab. '",';
echo ' "conteo_enf_lab": '  .intval($conteo_enf_lab). ''. '';
}
unset($conteo_enf_lab); // rompe la referencia con el último elemento

echo " }";
$prefix = ",\n";
}

echo "\n]";
?>