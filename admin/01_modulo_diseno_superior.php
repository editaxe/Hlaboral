<?php
include_once('../conexiones/conexione.php');
include_once('../admin/class_php/funcion_cryptor_descryptor_class.php');
include_once('../evitar_mensaje_error/error.php');
date_default_timezone_set("America/Bogota");
//include_once('../admin/fecha_en_espanol.php');
include_once("../session/funciones_admin.php");
//include("../notificacion_alerta/mostrar_noficacion_alerta.php");
if (verificar_usuario()){
//print "Bienvenido (a), <strong>".$_SESSION['usuario'].", </strong>al sistema.";
  } else { header("Location:../index.php");
}
//$cuenta_actual = addslashes($_SESSION['usuario']);
$cuenta_actual      = DAXCRYPTOR::descriptardax($_SESSION['usuario_cryp']);
$nombres_des        = DAXCRYPTOR::descriptardax($_SESSION['nombres_cryp']);
$apellidos_des      = DAXCRYPTOR::descriptardax($_SESSION['apellidos_cryp']);
$nombre_sexo_des    = DAXCRYPTOR::descriptardax($_SESSION['nombre_sexo_cryp']);
//---------------------------------------------------------------------------------------------------------------------------------//
$cod_seguridad_des  = DAXCRYPTOR::descriptardax($_SESSION['cs_cryp']);
$cod_seguridad_codif = ($cod_seguridad_des);
$frag1 = str_split($cod_seguridad_codif);
$numero_de_digitos1 = $frag1[0];
if ($numero_de_digitos1 == 1) { $cod_seguridad = $frag1[5]; } 
if ($numero_de_digitos1 == 2) { $cod_seguridad = $frag1[5].$frag1[6]; } 
if ($numero_de_digitos1 == 3) { $cod_seguridad = $frag1[5].$frag1[6].$frag1[7]; } 
if ($numero_de_digitos1 == 4) { $cod_seguridad = $frag1[5].$frag1[6].$frag1[7].$frag1[8]; } 
if ($numero_de_digitos1 == 5) { $cod_seguridad = $frag1[5].$frag1[6].$frag1[7].$frag1[8].$frag1[9]; } 
if ($numero_de_digitos1 == 6) { $cod_seguridad = $frag1[5].$frag1[6].$frag1[7].$frag1[8].$frag1[9].$frag1[10]; } 
if ($numero_de_digitos1 == 7) { $cod_seguridad = $frag1[5].$frag1[6].$frag1[7].$frag1[8].$frag1[9].$frag1[10].$frag1[11]; }
if ($numero_de_digitos1 == 8) { $cod_seguridad = $frag1[5].$frag1[6].$frag1[7].$frag1[8].$frag1[9].$frag1[10].$frag1[11].$frag1[12]; }
if ($numero_de_digitos1 == 9) { $cod_seguridad = $frag1[5].$frag1[6].$frag1[7].$frag1[8].$frag1[9].$frag1[10].$frag1[11].$frag1[12].$frag1[13]; }
//---------------------------------------------------------------------------------------------------------------------------------//
$cod_administrador_des = DAXCRYPTOR::descriptardax($_SESSION['ca_cryp']);
$cod_administrador_codif = ($cod_administrador_des);
$frag2 = str_split($cod_administrador_codif);
$numero_de_digitos2 = $frag2[0];
if ($numero_de_digitos2 == 1) { $cod_administrador = $frag2[5]; } 
if ($numero_de_digitos2 == 2) { $cod_administrador = $frag2[5].$frag2[6]; } 
if ($numero_de_digitos2 == 3) { $cod_administrador = $frag2[5].$frag2[6].$frag2[7]; } 
if ($numero_de_digitos2 == 4) { $cod_administrador = $frag2[5].$frag2[6].$frag2[7].$frag2[8]; } 
if ($numero_de_digitos2 == 5) { $cod_administrador = $frag2[5].$frag2[6].$frag2[7].$frag2[8].$frag2[9]; } 
if ($numero_de_digitos2 == 6) { $cod_administrador = $frag2[5].$frag2[6].$frag2[7].$frag2[8].$frag2[9].$frag2[10]; } 
if ($numero_de_digitos2 == 7) { $cod_administrador = $frag2[5].$frag2[6].$frag2[7].$frag2[8].$frag2[9].$frag2[10].$frag2[11]; }
if ($numero_de_digitos2 == 8) { $cod_administrador = $frag2[5].$frag2[6].$frag2[7].$frag2[8].$frag2[9].$frag2[10].$frag2[11].$frag2[12]; }
if ($numero_de_digitos2 == 9) { $cod_administrador = $frag2[5].$frag2[6].$frag2[7].$frag2[8].$frag2[9].$frag2[10].$frag2[11].$frag2[12].$frag2[13]; }
//---------------------------------------------------------------------------------------------------------------------------------//
$tokn_des = DAXCRYPTOR::descriptardax($_SESSION['tokn_cryp']);
$cod_sesion_codif = ($tokn_des);
$frag3 = str_split($cod_sesion_codif);
$numero_de_digitos3 = $frag3[0];
if ($numero_de_digitos3 == 1) { $cod_sesion = $frag3[5]; } 
if ($numero_de_digitos3 == 2) { $cod_sesion = $frag3[5].$frag3[6]; } 
if ($numero_de_digitos3 == 3) { $cod_sesion = $frag3[5].$frag3[6].$frag3[7]; } 
if ($numero_de_digitos3 == 4) { $cod_sesion = $frag3[5].$frag3[6].$frag3[7].$frag3[8]; } 
if ($numero_de_digitos3 == 5) { $cod_sesion = $frag3[5].$frag3[6].$frag3[7].$frag3[8].$frag3[9]; } 
if ($numero_de_digitos3 == 6) { $cod_sesion = $frag3[5].$frag3[6].$frag3[7].$frag3[8].$frag3[9].$frag3[10]; } 
if ($numero_de_digitos3 == 7) { $cod_sesion = $frag3[5].$frag3[6].$frag3[7].$frag3[8].$frag3[9].$frag3[10].$frag3[11]; }
if ($numero_de_digitos3 == 8) { $cod_sesion = $frag3[5].$frag3[6].$frag3[7].$frag3[8].$frag3[9].$frag3[10].$frag3[11].$frag3[12]; }
if ($numero_de_digitos3 == 9) { $cod_sesion = $frag3[5].$frag3[6].$frag3[7].$frag3[8].$frag3[9].$frag3[10].$frag3[11].$frag3[12].$frag3[13]; }
//---------------------------------------------------------------------------------------------------------------------------------//
$cod_tipo_historia_clinica_des = DAXCRYPTOR::descriptardax($_SESSION['cod_tipo_historia_clinica_cryp']);
$cod_tipo_historia_clinica_codif = ($cod_tipo_historia_clinica_des);
$frag4 = str_split($cod_tipo_historia_clinica_codif);
$numero_de_digitos4 = $frag4[0];
if ($numero_de_digitos4 == 1) { $cod_tipo_historia_clinica = $frag4[5]; } 
if ($numero_de_digitos4 == 2) { $cod_tipo_historia_clinica = $frag4[5].$frag4[6]; } 
if ($numero_de_digitos4 == 3) { $cod_tipo_historia_clinica = $frag4[5].$frag4[6].$frag4[7]; } 
if ($numero_de_digitos4 == 4) { $cod_tipo_historia_clinica = $frag4[5].$frag4[6].$frag4[7].$frag4[8]; } 
if ($numero_de_digitos4 == 5) { $cod_tipo_historia_clinica = $frag4[5].$frag4[6].$frag4[7].$frag4[8].$frag4[9]; } 
if ($numero_de_digitos4 == 6) { $cod_tipo_historia_clinica = $frag4[5].$frag4[6].$frag4[7].$frag4[8].$frag4[9].$frag4[10]; } 
if ($numero_de_digitos4 == 7) { $cod_tipo_historia_clinica = $frag4[5].$frag4[6].$frag4[7].$frag4[8].$frag4[9].$frag4[10].$frag4[11]; }
if ($numero_de_digitos4 == 8) { $cod_tipo_historia_clinica = $frag4[5].$frag4[6].$frag4[7].$frag4[8].$frag4[9].$frag4[10].$frag4[11].$frag4[12]; }
if ($numero_de_digitos4 == 9) { $cod_tipo_historia_clinica = $frag4[5].$frag4[6].$frag4[7].$frag4[8].$frag4[9].$frag4[10].$frag4[11].$frag4[12].$frag4[13]; }
//---------------------------------------------------------------------------------------------------------------------------------//
$pag_redirec_sesion = DAXCRYPTOR::descriptardax($_SESSION['pag_redirec_sesion_cryp']);
//---------------------------------------------------------------------------------------------------------------------------------//
$sql_infos_empresas = "SELECT * FROM info_empresa WHERE cod_info_empresa = '1'";
$resultado_infos_empresas = mysqli_query($conectar, $sql_infos_empresas);
$info_empresa_data = mysqli_fetch_assoc($resultado_infos_empresas);

$titulo_emp                            = $info_empresa_data['titulo'];
$nombre_emp                            = $info_empresa_data['nombre'];
$eslogan_emp                           = $info_empresa_data['eslogan'];
$direccion_emp                         = $info_empresa_data['direccion'];
$ciudad_emp                            = $info_empresa_data['ciudad'];
$pais_emp                              = $info_empresa_data['pais'];
$correo_emp                            = $info_empresa_data['correo'];
$img_cabecera_emp                      = $info_empresa_data['img_cabecera'];
$telefono_emp                          = $info_empresa_data['telefono'];
$info_legal_emp                        = $info_empresa_data['info_legal'];
$logotipo_emp                          = $info_empresa_data['logotipo'];
$propietario_nombres_apellidos_emp     = $info_empresa_data['propietario_nombres_apellidos'];
$propietario_nit_emp                   = $info_empresa_data['propietario_nit'];
$nit_empresa_emp                       = $info_empresa_data['nit_empresa'];
$cabecera_emp                          = $info_empresa_data['cabecera'];
$icono_emp                             = $info_empresa_data['icono'];
$desarrollador_emp                     = $info_empresa_data['desarrollador'];
$anyo_emp                              = $info_empresa_data['anyo'];
$url_pag                               = $info_empresa_data['url_pag'];
$nombre_font                           = $info_empresa_data['nombre_font'];
$res_emp                               = $info_empresa_data['res'];
$res1_emp                              = $info_empresa_data['res1'];
$res2_emp                              = $info_empresa_data['res2'];
$departamento_emp                      = $info_empresa_data['departamento'];
$localidad_emp                         = $info_empresa_data['localidad'];
$reg_medico_emp                        = $info_empresa_data['reg_medico'];
$regimen_emp                           = $info_empresa_data['regimen'];
$version_emp                           = $info_empresa_data['version'];
$propietario_url_firma_emp             = $info_empresa_data['propietario_url_firma'];
$fecha_time_emp                        = $info_empresa_data['fecha_time'];
$licencia_emp                          = $info_empresa_data['licencia'];
$tamano_font_emp                       = $info_empresa_data['tamano_font'];
$info_histclinic_emp                   = $info_empresa_data['info_histclinic'];
$info_aptlaboral_emp                   = $info_empresa_data['info_aptlaboral'];
$dia_ini_facturacion_emp               = $info_empresa_data['dia_ini_facturacion'];
$dia_fin_facturacion_emp               = $info_empresa_data['dia_fin_facturacion'];
$smtp_correo_host_emp                  = $info_empresa_data['smtp_correo_host'];
$smtp_correo_auth_emp                  = $info_empresa_data['smtp_correo_auth'];
$smtp_correo_username_emp              = $info_empresa_data['smtp_correo_username'];
$smtp_correo_password_emp              = $info_empresa_data['smtp_correo_password'];
$smtp_correo_secure_emp                = $info_empresa_data['smtp_correo_secure'];
$smtp_correo_port_emp                  = $info_empresa_data['smtp_correo_port'];
?>
<!DOCTYPE HTML>
<head>
<meta charset="utf-8">
<title><?php echo $nombre_emp;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="<?php echo $icono_emp;?>" type="image/x-icon" rel="shortcut icon" />