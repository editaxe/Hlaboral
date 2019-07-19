<?php $serguridad_pagina = 1; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
</head>
<body id="pageBody">
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php include_once('../seguridad/seguridad_diseno_plantillas.php'); ?>
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">

<div class="breadcrumbs"><a href="#">Guardando...</a> <img src="../imagenes/popup_ajax_loader.gif" class="img-polaroid" alt=""></div>

<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
if ((isset($_POST["ins_edit"])) && ($_POST["ins_edit"] == "formulario_insert_edit")) {

$cod_info_empresa                    = intval($_POST['cod_info_empresa']);
$titulo                              = addslashes($_POST['titulo']);
$nombre                              = addslashes($_POST['nombre']);
$eslogan                             = addslashes($_POST['eslogan']);
$res                                 = addslashes($_POST['res']);
$res1                                = addslashes($_POST['res1']);
$res2                                = addslashes($_POST['res2']);
$fecha_res                           = addslashes($_POST['fecha_res']);
$pais                                = addslashes($_POST['pais']);
$departamento                        = addslashes($_POST['departamento']);
$ciudad                              = addslashes($_POST['ciudad']);
$localidad                           = addslashes($_POST['localidad']);
$direccion                           = addslashes($_POST['direccion']);
$correo                              = addslashes($_POST['correo']);
$cabecera                            = addslashes($_POST['cabecera']);
$img_cabecera                        = addslashes($_POST['img_cabecera']);
$telefono                            = addslashes($_POST['telefono']);
$nit_empresa                         = addslashes($_POST['nit_empresa']);
$regimen                             = addslashes($_POST['regimen']);
$logotipo                            = addslashes($_POST['logotipo']);
$icono                               = '../imagenes/'.addslashes($_POST['icono']);
$nombre_font                         = addslashes($_POST['nombre_font']);
$tamano_font_hc                      = intval($_POST['tamano_font_hc']);
$tamano_font_aptlab                  = intval($_POST['tamano_font_aptlab']);
$tamano_font_trabaltu                = intval($_POST['tamano_font_trabaltu']);
$tamano_font_manaliment              = intval($_POST['tamano_font_manaliment']);
$tamano_font_informe                 = intval($_POST['tamano_font_informe']);
$tamano_font_remision                = intval($_POST['tamano_font_remision']);
$tamano_font_factura                 = intval($_POST['tamano_font_factura']);
$propietario_nombres_apellidos       = addslashes($_POST['propietario_nombres_apellidos']);
$propietario_nit                     = addslashes($_POST['propietario_nit']);
//$propietario_url_firma               = addslashes($_POST['propietario_url_firma']);
$info_legal                          = addslashes($_POST['info_legal']);
$reg_medico                          = addslashes($_POST['reg_medico']);
$licencia                            = addslashes($_POST['licencia']);
$smtp_correo_host                    = addslashes($_POST['smtp_correo_host']);
$smtp_correo_auth                    = addslashes($_POST['smtp_correo_auth']);
$smtp_correo_username                = addslashes($_POST['smtp_correo_username']);
$smtp_correo_password                = addslashes($_POST['smtp_correo_password']);
$smtp_correo_secure                  = addslashes($_POST['smtp_correo_secure']);
$smtp_correo_port                    = addslashes($_POST['smtp_correo_port']);
//$info_histclinic                   = addslashes($_POST['info_histclinic']);
$info_aptlaboral                     = addslashes($_POST['info_aptlaboral']);
$dia_ini_facturacion                 = addslashes($_POST['dia_ini_facturacion']);
$dia_fin_facturacion                 = addslashes($_POST['dia_fin_facturacion']);
$dia_fin_facturacion                 = addslashes($_POST['dia_fin_facturacion']);
$pagina                              = addslashes($_POST['pagina']);

$sql_data = sprintf("UPDATE info_empresa SET titulo = '$titulo', nombre = '$nombre', eslogan = '$eslogan', res = '$res', res1 = '$res1', 
res2 = '$res2', fecha_res = '$fecha_res', pais = '$pais', departamento = '$departamento', ciudad = '$ciudad', localidad = '$localidad', direccion = '$direccion', 
correo = '$correo', cabecera = '$cabecera', img_cabecera = '$img_cabecera', telefono = '$telefono', nit_empresa = '$nit_empresa', 
logotipo = '$logotipo', icono = '$icono', nombre_font = '$nombre_font', tamano_font_hc = '$tamano_font_hc', tamano_font_aptlab = '$tamano_font_aptlab', 
tamano_font_trabaltu = '$tamano_font_trabaltu', tamano_font_manaliment = '$tamano_font_manaliment', tamano_font_informe = '$tamano_font_informe', 
tamano_font_remision = '$tamano_font_remision', tamano_font_factura = '$tamano_font_factura', 
propietario_nombres_apellidos = '$propietario_nombres_apellidos', propietario_nit = '$propietario_nit', 
info_legal = '$info_legal', reg_medico = '$reg_medico', licencia = '$licencia', 
regimen = '$regimen', smtp_correo_host = '$smtp_correo_host', smtp_correo_auth = '$smtp_correo_auth', smtp_correo_username = '$smtp_correo_username', 
smtp_correo_password = '$smtp_correo_password', smtp_correo_secure = '$smtp_correo_secure', smtp_correo_port = '$smtp_correo_port', 
info_aptlaboral = '$info_aptlaboral', dia_ini_facturacion = '$dia_ini_facturacion', dia_fin_facturacion = '$dia_fin_facturacion' WHERE cod_info_empresa = '$cod_info_empresa'");
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>">
<?php } else { ?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>">
<?php } ?>
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* FIN MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
</div>
<!--End Main Content Area-->
</div>
<div id="footerInnerSeparator"></div>
</div>
</div>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<?php include_once('../admin/04_modulo_footer.php'); ?>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
<?php include_once('../admin/05_modulo_js.php'); ?>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
</body>
</html>