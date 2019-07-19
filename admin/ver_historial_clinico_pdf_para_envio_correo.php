<?php
include_once('../conexiones/conexione.php'); 
include_once('../evitar_mensaje_error/error.php');  
date_default_timezone_set("America/Bogota");

$sql_info_empresa = "SELECT nombre, eslogan, direccion, ciudad, pais, correo, cabecera, img_cabecera, telefono, info_legal, logotipo, 
propietario_nombres_apellidos, propietario_nit, nit_empresa, propietario_url_firma FROM info_empresa WHERE cod_info_empresa = '1'";
$resultado_info_empresa = mysqli_query($conectar, $sql_info_empresa);
$info_info_empresa = mysqli_fetch_assoc($resultado_info_empresa);

$fecha_hoy = time();

$nombre_emp = $info_info_empresa['nombre'];
$eslogan_emp = $info_info_empresa['eslogan'];
$direccion_emp = $info_info_empresa['direccion'];
$ciudad_emp = $info_info_empresa['ciudad'];
$pais_emp = $info_info_empresa['pais'];
$correo_emp = $info_info_empresa['correo'];
$cabecera_emp = $info_info_empresa['cabecera'];
$img_cabecera_emp = $info_info_empresa['img_cabecera'];
$telefono_emp = $info_info_empresa['telefono'];
$info_legal_emp = $info_info_empresa['info_legal'];
$logotipo_emp = $info_info_empresa['logotipo'];
$propietario_nombres_apellidos = $info_info_empresa['propietario_nombres_apellidos'];
$propietario_nit = $info_info_empresa['propietario_nit'];
$nit_emp = $info_info_empresa['nit_empresa'];
$propietario_url_firma  = $info_info_empresa['propietario_url_firma'];

$cedula_idget = intval($_GET['cedula_idget']);
$frag = str_split($cedula_idget);
$numero_de_digitos = $frag[0];

if ($numero_de_digitos == 1) { $cod_historia_clinica = $frag[5]; } 
if ($numero_de_digitos == 2) { $cod_historia_clinica = $frag[5].$frag[6]; } 
if ($numero_de_digitos == 3) { $cod_historia_clinica = $frag[5].$frag[6].$frag[7]; } 
if ($numero_de_digitos == 4) { $cod_historia_clinica = $frag[5].$frag[6].$frag[7].$frag[8]; } 
if ($numero_de_digitos == 5) { $cod_historia_clinica = $frag[5].$frag[6].$frag[7].$frag[8].$frag[9]; } 
if ($numero_de_digitos == 6) { $cod_historia_clinica = $frag[5].$frag[6].$frag[7].$frag[8].$frag[9].$frag[10]; } 
if ($numero_de_digitos == 7) { $cod_historia_clinica = $frag[5].$frag[6].$frag[7].$frag[8].$frag[9].$frag[10].$frag[11]; }
if ($numero_de_digitos == 8) { $cod_historia_clinica = $frag[5].$frag[6].$frag[7].$frag[8].$frag[9].$frag[10].$frag[11].$frag[12]; }
if ($numero_de_digitos == 9) { $cod_historia_clinica = $frag[5].$frag[6].$frag[7].$frag[8].$frag[9].$frag[10].$frag[11].$frag[12].$frag[13]; }

$sql_historia_clinica = "SELECT historia_clinica.cod_historia_clinica, cliente.cod_cliente, cliente.nombre_ocupacion, cliente.cod_entidad, cliente.cedula, 
cliente.nombres, cliente.apellido1, cliente.apellido2, cliente.fecha_nac_ymd, cliente.fecha_nac_time, cliente.edad_anyo, cliente.nombre_grupo_rh, cliente.tel_cliente, cliente.correo, cliente.direccion, cliente.nombre_ciudad, cliente.nombre_pais, historia_clinica.motivo, historia_clinica.nombre_laboratorio, historia_clinica.fecha_reg_time, historia_clinica.fecha_time, historia_clinica.fecha_ymd, historia_clinica.cuenta, historia_clinica.fecha_dmy, 
historia_clinica.nombre_medicamento, historia_clinica.descripcion_medicamento, historia_clinica.nombre_ayuda_diagnostica, 
historia_clinica.descripcion_ayuda_diagnostica FROM cliente RIGHT JOIN historia_clinica ON cliente.cod_cliente = historia_clinica.cod_cliente
WHERE (historia_clinica.cod_historia_clinica = '$cod_historia_clinica')";
$resultado_historia_clinica = mysqli_query($conectar, $sql_historia_clinica);
$info_historia_clinica = mysqli_fetch_assoc($resultado_historia_clinica);

$cod_entidad = $info_historia_clinica['cod_entidad'];

$sql_entidad = "SELECT nombre_entidad FROM entidad WHERE cod_entidad = '$cod_entidad'";
$resultado_entidad = mysqli_query($conectar, $sql_entidad);
$info_entidad = mysqli_fetch_assoc($resultado_entidad);

$nombre_entidad = $info_entidad['nombre_entidad'];

$cod_cliente = $info_historia_clinica['cod_cliente'];
$cedula = $info_historia_clinica['cedula'];
$nombres = $info_historia_clinica['nombres'];
$apellido1 = $info_historia_clinica['apellido1'];
$apellido2 = $info_historia_clinica['apellido2'];
$fecha_nac_ymd = $info_historia_clinica['fecha_nac_ymd'];
$fecha_nac_time = $info_historia_clinica['fecha_nac_time'];
$nombre_ocupacion = $info_historia_clinica['nombre_ocupacion'];

$nombres_completos = "Historia Clinica: ".$nombres.' '.$apellido1.' '.$apellido2;

$diferencia = abs($fecha_hoy - $fecha_nac_time);
$edad_anyo = floor($diferencia / (365*60*60*24));
//$edad_anyo = $info_historia_clinica['edad_anyo'];
$nombre_grupo_rh = $info_historia_clinica['nombre_grupo_rh'];
$tel_cliente = $info_historia_clinica['tel_cliente'];

$motivo = $info_historia_clinica['motivo'];
$nombre_laboratorio = $info_historia_clinica['nombre_laboratorio'];
$nombre_medicamento = $info_historia_clinica['nombre_medicamento'];
$descripcion_medicamento = $info_historia_clinica['descripcion_medicamento'];
$nombre_ayuda_diagnostica = $info_historia_clinica['nombre_ayuda_diagnostica'];
$descripcion_ayuda_diagnostica = $info_historia_clinica['descripcion_ayuda_diagnostica'];
$fecha_time = $info_historia_clinica['fecha_time'];
$fecha_reg_time = $info_historia_clinica['fecha_reg_time'];
$fecha_ymd = $info_historia_clinica['fecha_ymd'];
$cuenta = $info_historia_clinica['cuenta'];
$fecha_dmy = $info_historia_clinica['fecha_dmy'];
$fecha_reg_time_dmy = date("d/m/Y", $fecha_reg_time);

include_once('mpdf/mpdf.php');
$margen_izq = '20';
$margen_der = '15';
$margen_inf_encabezado = '47';
$margen_sup_encabezado = '47';
$posicion_sup_encabezado = '10';
$posicion_inf_encabezado = '10';

$titulo_doc_pdf = $nombres_completos;
$autor_doc_pdf = $propietario_nombres_apellidos;
$creador_doc_pdf = $propietario_nombres_apellidos;
$tema_doc_pdf = "Historia Clinica";
$palabras_claves_doc_pdf = $nombres_completos." ".$cedula;

$mpdf = new mPDF('en-x','A4','','',$margen_izq, $margen_der, $margen_inf_encabezado, $margen_sup_encabezado, $posicion_sup_encabezado, $posicion_inf_encabezado);
$mpdf->mirrorMargins = 1; // Use different Odd/Even headers and footers and mirror margins

$header = '
<!DOCTYPE html>
 <html lang="es">
 <head>
<title></title>
<meta charset="utf-8" />
</head>

<body>
<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family:serif; font-size: 15pt; color: #000000;">
<tr>
<td width="5%" style="text-align: center;"><img src="../imagenes/logo_superior.png" width="120px" />
<td width="95%" style="text-align: center;">
<strong>DR. '.$propietario_nombres_apellidos.'</strong>
<br>'
.$info_legal_emp.'
<br>
'.$cabecera_emp.'
<br>
'.$eslogan_emp.' - RM: '.$nit_emp.'
</td>
</tr>
</table>
';

$headerE = '
<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family:serif; font-size: 15pt; color: #000000;">
<tr>
<td width="5%" style="text-align: center;"><img src="../imagenes/logo_superior.png" width="120px" />
<td width="95%" style="text-align: center;">
<strong>DR. '.$propietario_nombres_apellidos.'</strong>
<br>'
.$info_legal_emp.'
<br>
'.$cabecera_emp.'
<br>
'.$eslogan_emp.' - RM: '.$nit_emp.'
</td>
</tr>
</table>
';

$footer = '
<table width="100%" style="border-top: 1px solid #000000; vertical-align: bottom; font-family:serif; font-size: 12pt; color: #000000;">
<tr>
<td width="100%" style="text-align: center;">
<h6>'.$direccion_emp.' - Tel&eacute;fonos: '.$telefono_emp.'
<br>
Email: '.$correo_emp.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$ciudad_emp.' - '.$pais_emp.' [P. {PAGENO}]</h6>
</td>
</tr>
</table>
';

$footerE = '
<table width="100%" style="border-top: 1px solid #000000; vertical-align: bottom; font-family:serif; font-size: 12pt; color: #000000;">
<tr>
<td width="100%" style="text-align: center;">
<h6>'.$direccion_emp.' - Tel&eacute;fonos: '.$telefono_emp.'
<br>
Email: '.$correo_emp.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$ciudad_emp.' - '.$pais_emp.' [P. {PAGENO}]</h6>
</td>
</tr>
</table>
</body>
</html>
';

$mpdf->SetHTMLHeader(($header));
$mpdf->SetHTMLHeader(($headerE),'E');
$mpdf->SetHTMLFooter(($footer));
$mpdf->SetHTMLFooter(($footerE),'E');

$codigoHTML = '
<style type="text/css">
#centrar {
margin-right:auto;
margin-left:auto;
width: 30%;
}
</style>
<p>
<strong>Nombre:</strong> '.$nombres.' '.$apellido1.' '.$apellido2.'&nbsp;&nbsp;&nbsp;&nbsp; 
<strong>EDAD:</strong> '.$edad_anyo.' Años &nbsp;&nbsp;&nbsp;&nbsp;
<strong>Fecha Reg:</strong> '.$fecha_dmy.'</p>
<p><strong>Ocupacion:</strong> '.$nombre_ocupacion.'&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Entidad Salud:</strong> '.$nombre_entidad.'&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Cel:</strong> '.$tel_cliente.'
</p>
'.$motivo.'
<br>
<div id="centrar">
<img src="../imagenes/firma.png" width="150px"/>
<!--
<br>
<font size=3>DR. '.$propietario_nombres_apellidos.'</font>
<br>
<font size=3>CC: '.$propietario_nit.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RM: '.$nit_emp.'</font>
-->
</div>
';
$mpdf->WriteHTML(($codigoHTML));
$mpdf->SetTitle($titulo_doc_pdf);
$mpdf->SetAuthor($autor_doc_pdf);
$mpdf->SetCreator($autor_doc_pdf);
$mpdf->SetSubject($tema_doc_pdf);
$mpdf->SetKeywords($palabras_claves_doc_pdf);
$ruta = 'pdfs/';
$nombre_archivo = $cedula.'_hist_'.$cedula_idget.'_cli_'.$cod_cliente.'_'.$fecha_hoy.'.pdf';
$mpdf->Output($nombre_archivo, 'D');
exit;
/*
$mpdf = new mPDF('',    // mode - default ''
0,     // font size - default 0
'',    // default font family
15,    // margin_left
15,    // margin right
16,     // margin top
16,    // margin bottom
9,     // margin header
9,     // margin footer
'L');  // L - landscape, P - portrait
*/
?>