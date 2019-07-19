<?php
include_once('../conexiones/conexione.php');
require '../PHPMailer/PHPMailerAutoload.php';
include_once '../admin/class_php/smtp.conf.php';
date_default_timezone_set('America/Bogota');
//-----------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------------------------//
if (isset($_POST['cod_historia_clinica'])) {

$cod_historia_clinica = intval($_POST['cod_historia_clinica']);
$nombres_apellidos = addslashes($_POST['nombres_apellidos']);
$correo = addslashes($_POST['correo']);
$cedula = intval($_POST['cedula']);
$pagina = addslashes($_POST['pagina']);
$randomize_pos4 = rand(1000, 9999);
$cantidad_digito = strlen($cod_historia_clinica);
$codif = $cantidad_digito.$randomize_pos4.$cod_historia_clinica.rand(10000, 99999);
$cedula_idget = str_pad($codif, 15, $randomize_pos4, STR_PAD_RIGHT);

$url = 'http://editaxe.xyz/consultorio/admin/ver_medicamentos_pdf_para_envio_correo.php?cedula_idget='.$cedula_idget;
//-----------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------------------------//
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
//-----------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------------------------//
$sql_historia_clinica = "SELECT motivo, fecha_dmy FROM historia_clinica WHERE cod_historia_clinica = '$cod_historia_clinica'";
$consulta_historia_clinica = mysqli_query($conectar, $sql_historia_clinica) or die(mysqli_error($conectar));
$datos_historia_clinica = mysqli_fetch_assoc($consulta_historia_clinica);

$motivo = $datos_historia_clinica['motivo'];
$fecha_dmy = $datos_historia_clinica['fecha_dmy'];
//-----------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------------------------//
$receptor = $nombres_apellidos;
$emisor = "Notificaciones Higado Sano";
$fecha_ymd_his = date("Y/m/d - H:i:s");
$fecha_time = time();
$fecha_hoy_seg = strtotime(date("Y/m/d"));
$invitacion = utf8_decode("Historia Clinica: ".$receptor);
//-----------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------------------------//
//$receptor = ucwords(strtolower($datos['nombre1'].' '.$datos['nombre2'].' '.$datos['apellido1'].' '.$datos['apellido2']));
//$receptor = ucwords(strtolower($nombres.' '.$apellidos));


$mensaje = "<!DOCTYPE html>";
$mensaje .= "<html lang='es'>";
$mensaje .= "<head>";
$mensaje .= "<meta charset='utf-8'>";
$mensaje .= "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
$mensaje .= "<meta name='description' content='Ofrecemos soluciones informáticas'>";
$mensaje .= "<meta name='author' content='Editaxe sistemas'>";
$mensaje .= "<title>$emisor</title>";
$mensaje .= "</head>";
$mensaje .= "<body>";

$mensaje .= "<table width='100%' style='border-bottom: 1px solid #000000; vertical-align: bottom; font-family:serif; font-size: 15pt; color: #000000;'>
<tr>
<td width='5%' style='text-align: center;'><img src='../imagenes/logo_superior.png' width='120px' />
<td width='95%' style='text-align: center;'>
<strong>DR. $propietario_nombres_apellidos</strong>
<br>
$info_legal_emp
<br>
$cabecera_emp
<br>
$eslogan_emp - RM: $nit_emp
</td>
</tr>
</table>";

$mensaje .= "<br><strong>Nombre:</strong> $receptor &nbsp;&nbsp;&nbsp;&nbsp;";
$mensaje .= "<strong>Fecha Reg:</strong> $fecha_dmy</p>";
$mensaje .= "<p>$motivo</p>";
$mensaje .= "<p><strong><a href='$url' target='_blank'>Descargar Archivo Pdf</a></strong></p>";

$mensaje .= "<table width='100%' style='border-top: 1px solid #000000; vertical-align: bottom; font-family:serif; font-size: 15pt; color: #000000;'>
<tr>
<td width='100%' style='text-align: center;'>
<h6>$direccion_emp - Tel&eacute;fonos: $telefono_emp
<br>
Email: $correo_emp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $ciudad_emp - $pais_emp</h6>
</td>
</tr>
</table>";

$mensaje .= "</body>";
$mensaje .= "</html>";

$mail = new PHPMailer;
//$mail->SMTPDebug = 3;                          // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = $Host;  // Specify main and backup SMTP servers
$mail->SMTPAuth = $SMTPAuth;                               // Enable SMTP authentication
$mail->Username = $Username;                   // SMTP username
$mail->Password = $Password;                             // SMTP password
$mail->SMTPSecure = $SMTPSecure;                              // Enable TLS encryption, `ssl` also accepted
$mail->Port = $Port;                                      // TCP port to connect to
$mail->setFrom('admin@editaxe.xyz', $emisor);
$mail->addAddress($correo, $receptor);
$mail->Subject = $invitacion;
$mail->MsgHTML($mensaje);
if(!$mail->send()) { //INICIO SI EL CORREO NO SE ENVIA PORQUE HAY ERRORES

$error = $mail->ErrorInfo;
$tipo = 'correo';

$agregar = "INSERT INTO listado_error_envio (correo, error, tipo, fecha_ymd_his, fecha_time) 
VALUES ('$correo', '$error', '$tipo', '$fecha_ymd_his', '$fecha_time')";
$resultado_sql1 = mysqli_query($conectar, $agregar) or die(mysqli_error($conectar));
} //FIN SI EL CORREO NO SE ENVIAA PORQUE HAY ERRORES
else { // INICIO SI EN CORREO SE ENVIO CORRECTAMENTE
$sql_envio_correo = "INSERT INTO envio_correo (cod_historia_clinica, nombres_apellidos, correo, cedula, url, fecha_ymd_his, fecha_time ) 
VALUES ('$cod_historia_clinica', '$nombres_apellidos', '$correo', '$cedula', '$url', '$fecha_ymd_his', '$fecha_time' )";
$resultado_envio_correo = mysqli_query($conectar, $sql_envio_correo) or die(mysqli_error($conectar));

echo "<br><br><strong>Enviado correctamente...</strong>";
echo "<br><br>";
echo '<input name="button" type="button" onclick="window.close();" value="Cerrar esta ventana" />';
//$email_envio = $email + 1;
} //FIN SI EN CORREO SE ENVIO CORRECTAMENTE
}
?>