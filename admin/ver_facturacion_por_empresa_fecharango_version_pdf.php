<?php
date_default_timezone_set("America/Bogota");
require_once('../conexiones/conexione.php');
include_once('../admin/class_php/fecha_en_espanol_mes.php');
include_once('../admin/class_php/fecha_en_espanol_mes_anyo.php');
include_once('../admin/class_php/numeros_a_letras_funcion.php');

$serguridad_pagina                 = 1; 
$nombre_empresa                    = addslashes($_GET['nombre_empresa']);
$fecha_ini                         = addslashes($_GET['fecha_ini']);
$fecha_fin                         = addslashes($_GET['fecha_fin']);
$motivo                            = addslashes($_GET['motivo']);
$cuenta                            = addslashes($_GET['cuenta']);
$fecha                             = addslashes($_GET['fecha']);
$fecha_seg                         = strtotime($fecha);
$dia_hoy                           = date("d", $fecha_seg);
$mes_hoy                           = date("m", $fecha_seg);
$anyo_hoy                          = date("Y", $fecha_seg);
$fecha_ymdhis                      = date("Y/m/d H:i:s");
//-----------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------//
$sql_info_factura_max = "SELECT MAX(cod_factura) AS cod_factura_max FROM info_factura";
$resultado_info_factura_max = mysqli_query($conectar, $sql_info_factura_max);
$info_info_factura_max = mysqli_fetch_assoc($resultado_info_factura_max);

$cod_factura_max                   = $info_info_factura_max['cod_factura_max'];
//-----------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------//
$sql_info_factura = "SELECT cod_factura, fecha_ini, fecha_fin, nombre_empresa, motivo FROM info_factura WHERE cod_factura = '$cod_factura_max'";
$resultado_info_factura = mysqli_query($conectar, $sql_info_factura);
$info_info_factura = mysqli_fetch_assoc($resultado_info_factura);

$fecha_ini_db                      = $info_info_factura['fecha_ini'];
$fecha_fin_db                      = $info_info_factura['fecha_fin'];
$nombre_empresa_db                 = $info_info_factura['nombre_empresa'];
$motivo_db                         = $info_info_factura['motivo'];
//-----------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------//
if (($fecha_ini_db == $fecha_ini) && ($fecha_fin_db == $fecha_fin) && ($nombre_empresa_db == $nombre_empresa) && ($motivo_db == $motivo)) {
$cod_factura                    = $info_info_factura['cod_factura'];
} else {
$cod_factura                    = $info_info_factura['cod_factura']+1;

$sql_data = "INSERT INTO info_factura (cod_factura, fecha_ini, fecha_fin, nombre_empresa, motivo, fecha_ymdhis, cuenta) 
VALUES ('$cod_factura', '$fecha_ini', '$fecha_fin', '$nombre_empresa', '$motivo', '$fecha_ymdhis', '$cuenta')";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));
}
//-----------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------//
$sql_profesional = "SELECT cod_empresa, nombre_empresa, direccion_empresa, telefono_empresa, nit_empresa FROM empresa WHERE nombre_empresa = '$nombre_empresa'";
$resultado_profesional = mysqli_query($conectar, $sql_profesional);
$info_profesional = mysqli_fetch_assoc($resultado_profesional);

$cod_empresa                       = $info_profesional['cod_empresa'];
$direccion_empresa                 = $info_profesional['direccion_empresa'];
$telefono_empresa                  = $info_profesional['telefono_empresa'];
$nit_empresa                       = $info_profesional['nit_empresa'];
//-----------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------//
$sql_info_empresa = "SELECT * FROM info_empresa WHERE cod_info_empresa = '1'";
$resultado_info_empresa = mysqli_query($conectar, $sql_info_empresa);
$info_empresa_data = mysqli_fetch_assoc($resultado_info_empresa);

$titulo_emp                        = $info_empresa_data['titulo'];
$nombre_emp                        = $info_empresa_data['nombre'];
$eslogan_emp                       = $info_empresa_data['eslogan'];
$direccion_emp                     = $info_empresa_data['direccion'];
$ciudad_emp                        = $info_empresa_data['ciudad'];
$pais_emp                          = $info_empresa_data['pais'];
$correo_emp                        = $info_empresa_data['correo'];
$img_cabecera_emp                  = $info_empresa_data['img_cabecera'];
$telefono_emp                      = $info_empresa_data['telefono'];
$info_legal_emp                    = $info_empresa_data['info_legal'];
$logotipo_emp                      = $info_empresa_data['logotipo'];
$propietario_nombres_apellidos_emp = $info_empresa_data['propietario_nombres_apellidos'];
$propietario_nit_emp               = $info_empresa_data['propietario_nit'];
$nit_empresa_emp                   = $info_empresa_data['nit_empresa'];
$cabecera_emp                      = $info_empresa_data['cabecera'];
$icono_emp                         = $info_empresa_data['icono'];
$desarrollador_emp                 = $info_empresa_data['desarrollador'];
$anyo_emp                          = $info_empresa_data['anyo'];
$url_pag                           = $info_empresa_data['url_pag'];
$nombre_font_emp                   = $info_empresa_data['nombre_font'];
$tamano_font_emp                   = $info_empresa_data['tamano_font'];
$tamano_font_factura_emp           = $info_empresa_data['tamano_font_aptlab'];
$tamano_font_factura_emp           = $info_empresa_data['tamano_font_factura'];
$res_emp                           = $info_empresa_data['res'];
$res1_emp                          = $info_empresa_data['res1'];
$res2_emp                          = $info_empresa_data['res2'];
$fecha_res_emp                     = $info_empresa_data['fecha_res'];
$departamento_emp                  = $info_empresa_data['departamento'];
$localidad_emp                     = $info_empresa_data['localidad'];
$reg_medico_emp                    = $info_empresa_data['reg_medico'];
$regimen_emp                       = $info_empresa_data['regimen'];
$version_emp                       = $info_empresa_data['version'];
$propietario_url_firma_emp         = $info_empresa_data['propietario_url_firma'];
$fecha_time_emp                    = $info_empresa_data['fecha_time'];
$licencia_emp                      = $info_empresa_data['licencia'];
$info_histclinic_emp               = $info_empresa_data['info_histclinic'];
$info_aptlaboral_emp               = $info_empresa_data['info_aptlaboral'];
//-----------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------//
$nombres_completos                 = "FACTURA";

include_once('mpdf/mpdf.php');
$margen_izq = '10';
$margen_der = '10';
$margen_inf_encabezado = '40';
$margen_sup_encabezado = '10';
$posicion_sup_encabezado = '5';
$posicion_inf_encabezado = '2';

$titulo_doc_pdf            = 'FACTURA_'.str_pad($cod_factura, 4, "0", STR_PAD_LEFT).'_'.$nombre_empresa;
$autor_doc_pdf             = 'FACTURA_'.str_pad($cod_factura, 4, "0", STR_PAD_LEFT).'_'.$nombre_empresa;
$creador_doc_pdf           = 'FACTURA_'.str_pad($cod_factura, 4, "0", STR_PAD_LEFT).'_'.$nombre_empresa;
$tema_doc_pdf              = 'FACTURA_'.str_pad($cod_factura, 4, "0", STR_PAD_LEFT).'_'.$nombre_empresa;
$palabras_claves_doc_pdf   = 'FACTURA_'.str_pad($cod_factura, 4, "0", STR_PAD_LEFT).'_'.$nombre_empresa;
$aaaaaa   = "FACTURA";

//$mpdf = new mPDF('c','Legal');
$mpdf = new mPDF('en-GB-x','A4','','',$margen_izq, $margen_der, $margen_inf_encabezado, $margen_sup_encabezado, $posicion_sup_encabezado, $posicion_inf_encabezado);
$mpdf->mirrorMargins = 1; // Use different Odd/Even headers and footers and mirror margins

$header = '
<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:20pt; width:100%">
  <tr><td style="text-align:center"><strong>'.$nombre_emp.'</strong></td></tr>
</table>

<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:'.$tamano_font_factura_emp.'pt; width:100%">
  <tr>
    <td rowspan="5" valign="top"><img src="../imagenes/logo_limp.png" height="90px"/></td>
    <td style="text-align:center">CC '.$propietario_nit_emp.'</td>
  </tr>
  <tr><td style="text-align:center">'.$cabecera_emp.'</td></tr>
  <tr><td style="text-align:center" valign="top">'.$eslogan_emp.'</td></tr>
  <tr><td style="text-align:center" valign="top">RM. '.$reg_medico_emp.' - RM. '.$licencia_emp.' - Tel. '.$telefono_emp.'</td></tr>
  <tr><td style="text-align:center" valign="top">'.$departamento_emp.', '.$pais_emp.'</td></tr>
</table>
';
$headerE = '
<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:20pt; width:100%">
  <tr><td style="text-align:center"><strong>'.$nombre_emp.'</strong></td></tr>
</table>

<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:'.$tamano_font_factura_emp.'pt; width:100%">
  <tr>
    <td rowspan="5" valign="top"><img src="../imagenes/logo_limp.png" height="90px"/></td>
    <td style="text-align:center">CC '.$propietario_nit_emp.'</td>
  </tr>
  <tr><td style="text-align:center">'.$cabecera_emp.'</td></tr>
  <tr><td style="text-align:center" valign="top">'.$eslogan_emp.'</td></tr>
  <tr><td style="text-align:center" valign="top">RM. '.$reg_medico_emp.' - RM. '.$licencia_emp.' - Tel. '.$telefono_emp.'</td></tr>
  <tr><td style="text-align:center" valign="top">'.$departamento_emp.', '.$pais_emp.'</td></tr>
</table>
';
$footer = '
<table width="100%" style="border-top: 1px solid #000000; vertical-align: bottom; font-family:serif; font-size: 10pt; color: #000000;">
<tr><td width="100%" style="text-align: center;"><h6>'.$direccion_emp.' &nbsp;&nbsp; - &nbsp;&nbsp; Tel&eacute;fonos: '.$telefono_emp.'<br>Email: '.$correo_emp.' &nbsp;&nbsp; - &nbsp;&nbsp; '.$ciudad_emp.' - '.$pais_emp.' [Página {PAGENO} de {nbpg}]</h6></td></tr>
</table>
';
$footerE = '
<table width="100%" style="border-top: 1px solid #000000; vertical-align: bottom; font-family:serif; font-size: 10pt; color: #000000;">
<tr><td width="100%" style="text-align: center;"><h6>'.$direccion_emp.' &nbsp;&nbsp; - &nbsp;&nbsp; Tel&eacute;fonos: '.$telefono_emp.'<br>Email: '.$correo_emp.' &nbsp;&nbsp; - &nbsp;&nbsp; '.$ciudad_emp.' - '.$pais_emp.' [Página {PAGENO} de {nbpg}]</h6></td></tr>
</table>
';
$mpdf->SetHTMLHeader(($header));
$mpdf->SetHTMLHeader(($headerE),'E');
$mpdf->SetHTMLFooter(($footer));
$mpdf->SetHTMLFooter(($footerE),'E');

$codigoHTML = '
<!DOCTYPE html>
<html lang="es">
<head>
<title></title>
<meta charset="utf-8" />
</head>

<body>
<style type="text/css"> 
#centrar { margin-right:auto; margin-left:auto; width: 30%; } 
.Estilo1 { color: #FF0000; font-weight: bold; }
.Estilo2 {color: #FF0000}
</style>';

$codigoHTML.='
<!-- /////////////////////////////////////////////////// -->
<br>
<!-- /////////////////////////////////////////////////// -->
<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:'.$tamano_font_factura_emp.'pt; width:100%">
  <tr>
    <td style="text-align:right" valign="top">Número de Formulario: '.$res_emp.'</td>
  </tr>
    <tr>
    <td style="text-align:right" valign="top">Fecha de Formulario: '.$fecha_res_emp.'</td>
  </tr>
    <tr>
    <td style="text-align:right" valign="top">Autorizado desde: '.$res1_emp.' hasta la '.$res2_emp.'</td>
  </tr>
<!--
  <tr>
    <td style="text-align:right" valign="top">'.$regimen_emp.'</td>
  </tr>
-->
</table>
<!-- /////////////////////////////////////////////////// -->

<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:'.$tamano_font_factura_emp.'pt; width:100%">
  <tr>
    <td width="337" valign="top"><p>&nbsp;</p>
      <table align="" border="1" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:'.$tamano_font_factura_emp.'pt; width:50%">
          <tr>
            <td style="text-align:center" width="67" rowspan="2">FECHA </td>
            <td style="text-align:center" width="55" valign="top">D</td>
            <td style="text-align:center" width="49" valign="top">M</td>
            <td style="text-align:center" width="50" valign="top">A</td>
          </tr>
          <tr>
            <td style="text-align:center" width="55" valign="top">'.$dia_hoy.'</td>
            <td style="text-align:center" width="49" valign="top">'.$mes_hoy.'</td>
            <td style="text-align:center" width="50" valign="top">'.$anyo_hoy.'</td>
          </tr>
      </table>
    </td>

    <td width="345" valign="top"><p>&nbsp;

       <table align="center" border="1" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:'.$tamano_font_factura_emp.'pt; width:50%">
          <tr>
            <td style="text-align:center" width="92">FACTURA DE VENTA</td>
            <td style="text-align:center" width="100">N&ordm;. '.str_pad($cod_factura, 4, "0", STR_PAD_LEFT).'</td>
          </tr>
      </table></td>
  </tr>
</table>
<!-- /////////////////////////////////////////////////// -->
<br>
<!-- /////////////////////////////////////////////////// -->
<table align="center" border="1" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:'.$tamano_font_factura_emp.'pt; width:100%">
  <tr>
    <td width="87" valign="top">Señor (es): '.$nombre_empresa.'</td>
    <td width="40" valign="top">Nit: '.$nit_empresa.'</td>
  </tr>
  <tr>
    <td width="87" valign="top">Dirección: '.$direccion_empresa.'</td>
    <td width="40" valign="top">Tel: '.$telefono_empresa.'</td>
  </tr>
</table>
<!-- /////////////////////////////////////////////////// -->
<br>
<!-- /////////////////////////////////////////////////// -->
<table align="center" border="1" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:'.$tamano_font_factura_emp.'pt; width:100%">';
$codigoHTML.='
  <tr>
    <td width="576" height="400" valign="top"><p>&nbsp;</p>
        <table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:'.$tamano_font_factura_emp.'pt; width:100%">
          <tr>
            <td style="text-align:center" width="120" valign="top"><strong>Cantidad</strong></td>
            <td style="text-align:left" width="250" valign="top"><strong>Descripción</strong></td>
            <td style="text-align:right" width="125" valign="top"><strong>Valor Unitario</strong></td>
            <td style="text-align:right" width="125" valign="top"><strong>Valor Total</strong></td>
           </tr>';

$sql_motivo_conteo = "SELECT Count(motivo) AS conteo_motivo, Sum(costo_motivo_consulta) AS sum_costo_motivo_consulta, costo_motivo_consulta, fecha_ymd, cod_estado_facturacion, nombre_empresa, motivo 
FROM historia_clinica 
WHERE ((fecha_ymd BETWEEN '$fecha_ini' AND '$fecha_fin') AND (nombre_empresa='$nombre_empresa') AND (cod_estado_facturacion=1)) GROUP BY motivo";
$resultado_motivo_conteo = mysqli_query($conectar, $sql_motivo_conteo);

$smtr_total_costo_motivo_consulta = 0;

while ($info_motivo_conteo = mysqli_fetch_assoc($resultado_motivo_conteo) ) { 

$conteo_motivo                  = $info_motivo_conteo['conteo_motivo'];
$motivo                         = $info_motivo_conteo['motivo'];
$nombre_empresa                 = $info_motivo_conteo['nombre_empresa'];
$costo_motivo_consulta          = $info_motivo_conteo['costo_motivo_consulta'];
$sum_costo_motivo_consulta      = $info_motivo_conteo['sum_costo_motivo_consulta'];
$total_costo_motivo_consulta   += $sum_costo_motivo_consulta;

$codigoHTML.='
          <tr>
            <td style="text-align:center" width="120" valign="top">'.$conteo_motivo.'</td>
            <td style="text-align:left" width="250" valign="top">'.$motivo.'</td>
            <td style="text-align:right" width="125" valign="top">'.number_format($costo_motivo_consulta, 0, ",", ".").'</td>
            <td style="text-align:right" width="125" valign="top">'.number_format($sum_costo_motivo_consulta, 0, ",", ".").'</td>
          </tr>';
}
$codigoHTML.='
        </table>
  </tr>
</table>';

$codigoHTML.='
<!-- /////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////// -->
<table align="center" border="1" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:'.$tamano_font_factura_emp.'pt; width:100%">
  <tr>
    <td style="text-align:center" width="354" valign="top">TOTAL</td>
    <td style="text-align:right" width="332" valign="top">$ '.number_format($total_costo_motivo_consulta, 0, ",", ".").'</td>
  </tr>
</table>
<!-- /////////////////////////////////////////////////// -->
<br>
<!-- /////////////////////////////////////////////////// -->
<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:'.$tamano_font_factura_emp.'pt; width:100%">
  <tr>
    <td width="45" valign="top">SON:</td>
    <td width="650" valign="top">'.convertir_numeros_a_letras($total_costo_motivo_consulta).'</td>
  </tr>
</table>
<!-- /////////////////////////////////////////////////// -->
<br>
<!-- /////////////////////////////////////////////////// -->
<br>
<!-- /////////////////////////////////////////////////// -->
<table align="center" border="0" cellspacing="0" cellpadding="0" style="font-family:mono; font-size:'.$tamano_font_factura_emp.'pt; width:100%">
  <tr>
    <td><p><strong>FIRMA</strong></p>
    <div><img src="'.$propietario_url_firma_emp.'" height="90px"/></div>
    <div>___________________________________</div><br> 
      <!-- <p><strong>'.$nombres_prof.' '.$apellidos_prof.'</strong></p></td> -->

    <td><p><strong>RECIBE</strong></p>
    <div><img src="../imagenes/firma_vacia.jpg" height="90px"/></div>
    <div>___________________________________</div><br> 
       <!-- <p><strong>'.$nombres_cli.' '.$apellido1_cli.'</strong></p></td> -->
  </tr>
<!--
  <tr>
    <td><p><strong>Reg. M&eacute;dico: '.$reg_medico_emp. ' </strong><strong>Licencia Salud Ocupacional '.$licencia_emp.'</strong><strong> </strong></p></td>
    <td><p><strong>C.C '.$cedula.'</strong> </p></td>
  </tr>
-->
</table>
<!-- /////////////////////////////////////////////////// -->
<br>
<!-- /////////////////////////////////////////////////// -->
<!--
<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:'.$tamano_font_factura_emp.'pt; width:100%">
  <tr>
    <td width="693" valign="top">TEL</td>
  </tr>
</table>
-->
</body>
</html>
';
$mpdf->WriteHTML(($codigoHTML));
$mpdf->SetTitle($titulo_doc_pdf);
$mpdf->SetAuthor($autor_doc_pdf);
$mpdf->SetCreator($autor_doc_pdf);
$mpdf->SetSubject($tema_doc_pdf);
$mpdf->SetKeywords($palabras_claves_doc_pdf);
$ruta = '../pdfs/';
$nombre_archivo = 'FACTURA_'.str_pad($cod_factura, 4, "0", STR_PAD_LEFT).'_'.$nombre_empresa.'.pdf';
$mpdf->Output($nombre_archivo, 'I');
exit;
/*
$mpdf->WriteHTML('<tocpagebreak sheet-size="A4-L" toc-sheet-size="A5" toc-preHTML="This ToC should print on an A5 sheet" />');
$mpdf->WriteHTML('<tocentry content="A4 landscape" /><p>This page appears just after the ToC and should print on an A4 (landscape) sheet</p>');
$mpdf->WriteHTML('<pagebreak sheet-size="A5-L" />');
$mpdf->WriteHTML('<tocentry content="A5 landscape" /><p>This should print on an A5 (landscape) sheet</p>');
$mpdf->WriteHTML('<pagebreak sheet-size="Letter" />');
$mpdf->WriteHTML('<tocentry content="Letter portrait" /><p>This should print on an Letter sheet</p>');
$mpdf->WriteHTML('<pagebreak sheet-size="150mm 150mm" />');
$mpdf->WriteHTML('<tocentry content="150mm square" /><p>This should print on a sheet 150mm x 150mm</p>');
$mpdf->WriteHTML('<pagebreak sheet-size="11.69in 8.27in" />');
*/
?>