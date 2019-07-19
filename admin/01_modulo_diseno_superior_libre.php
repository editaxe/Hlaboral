<?php
include_once('../conexiones/conexione.php'); 
include_once('../evitar_mensaje_error/error.php');
//include_once('../admin/fecha_en_espanol.php');

$sql_infos_empresas = "SELECT * FROM info_empresa WHERE cod_info_empresa = '1'";
$resultado_infos_empresas = mysqli_query($conectar, $sql_infos_empresas);
$info_empresa_data = mysqli_fetch_assoc($resultado_infos_empresas);

$nombre_emp = $info_empresa_data['nombre'];
$eslogan_emp = $info_empresa_data['eslogan'];
$direccion_emp = $info_empresa_data['direccion'];
$ciudad_emp = $info_empresa_data['ciudad'];
$pais_emp = $info_empresa_data['pais'];
$correo_emp = $info_empresa_data['correo'];
$img_cabecera_emp = $info_empresa_data['img_cabecera'];
$telefono_emp = $info_empresa_data['telefono'];
$info_legal_emp = $info_empresa_data['info_legal'];
$logotipo_emp = $info_empresa_data['logotipo'];
$propietario_nombres_apellidos_emp = $info_empresa_data['propietario_nombres_apellidos'];
$propietario_nit_emp = $info_empresa_data['propietario_nit'];
$nit_empresa_emp = $info_empresa_data['nit_empresa'];
$cabecera_emp = $info_empresa_data['cabecera'];
$icono_emp = $info_empresa_data['icono'];
$desarrollador_emp = $info_empresa_data['desarrollador'];
$anyo_emp = $info_empresa_data['anyo'];
$url_pag = $info_empresa_data['url_pag'];
$nombre_font = $info_empresa_data['nombre_font'];
$tamano_font_emp = $info_empresa_data['tamano_font'];
?>
<!DOCTYPE HTML>
<head>
<meta charset="utf-8">
<title><?php echo $nombre_emp;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="<?php echo $icono_emp;?>" type="image/x-icon" rel="shortcut icon" />