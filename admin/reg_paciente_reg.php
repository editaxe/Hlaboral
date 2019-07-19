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
<?php //$pagina = addslashes($_GET['pagina']); ?>
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
$pagina_else = addslashes($_POST['pagina']);

if ((isset($_POST["insersion"])) && ($_POST["insersion"] == "formulario_de_insersion")) {
$cedula = intval($_POST['cedula']);

$obtener_cedula = "SELECT cedula, nombres, apellido1, apellido2 FROM cliente WHERE cedula = '".($cedula)."'";
$consultar_cedula = mysqli_query($conectar, $obtener_cedula) or die(mysqli_error($conectar));
$info_cliente = mysqli_fetch_assoc($consultar_cedula);

$nombres = $info_cliente['nombres'];
$apellido1 = $info_cliente['apellido1'];
//$apellido2 = $info_cliente['apellido2'];
$nom_ape = $nombres.' '.$apellido1;

if(mysqli_num_rows(@$consultar_cedula) > 0) 	{
echo '<img src="../imagenes/advertencia.gif"> LA CEDULA'. $cedula.' YA ESTA REGISTRADA: '.$nom_ape.'</div>';
?>
<META HTTP-EQUIV="REFRESH" CONTENT="5; <?php echo $pagina_else ?>">
<?php
/* //////////////////////////////////////////////////////////////////////////////////////////////////////////// */
} else {
$nombre_tipo_doc        = strtoupper(addslashes($_POST['nombre_tipo_doc']));
$nombres                = strtoupper(addslashes($_POST['nombres']));
$apellido1              = strtoupper(addslashes($_POST['apellido1']));
//$apellido2            = strtoupper(addslashes($_POST['apellido2']));
$apellido2              = '';
$lugar_nac              = strtoupper(addslashes($_POST['lugar_nac']));
$lugar_procedencia      = strtoupper(addslashes($_POST['lugar_procedencia']));
$lugar_residencia       = strtoupper(addslashes($_POST['lugar_residencia']));
$cod_entidad            = intval($_POST['cod_entidad']);
$nombre_grupo_rh        = strtoupper(addslashes($_POST['nombre_grupo_rh']));
$nombre_raza            = strtoupper(addslashes($_POST['nombre_raza']));
$nombre_religion        = strtoupper(addslashes($_POST['nombre_religion']));
$nombre_ocupacion       = strtoupper(addslashes($_POST['nombre_ocupacion']));
$nombre_estado_civil    = strtoupper(addslashes($_POST['nombre_estado_civil']));
$nombre_escolaridad     = strtoupper(addslashes($_POST['nombre_escolaridad']));
$correo                 = strtoupper(addslashes($_POST['correo']));
$direccion              = strtoupper(addslashes($_POST['direccion']));
$tel_cliente            = addslashes($_POST['tel_cliente']);
$nombre_contacto1       = strtoupper(addslashes($_POST['nombre_contacto1']));
$tel_contacto1          = strtoupper(addslashes($_POST['tel_contacto1']));
$direccion_contacto1    = strtoupper(addslashes($_POST['direccion_contacto1']));
$parentesco_contacto1   = strtoupper(addslashes($_POST['parentesco_contacto1']));
//$nombre_contacto2       = strtoupper(addslashes($_POST['nombre_contacto2']));
//$tel_contacto2          = strtoupper(addslashes($_POST['tel_contacto2']));
//$direccion_contacto2    = strtoupper(addslashes($_POST['direccion_contacto2']));
//$parentesco_contacto2   = strtoupper(addslashes($_POST['parentesco_contacto2']));
/*
$antperson_alergia_si = strtoupper(addslashes($_POST['antperson_alergia_si']));
$antperson_alergia_no = strtoupper(addslashes($_POST['antperson_alergia_no']));
$antperson_alergia_cual = strtoupper(addslashes($_POST['antperson_alergia_cual']));
$antperson_patologico_si = strtoupper(addslashes($_POST['antperson_patologico_si']));
$antperson_patologico_no = strtoupper(addslashes($_POST['antperson_patologico_no']));
$antperson_patologico_cual = strtoupper(addslashes($_POST['antperson_patologico_cual']));
$antperson_quirurgico_si = strtoupper(addslashes($_POST['antperson_quirurgico_si']));
$antperson_quirurgico_no = strtoupper(addslashes($_POST['antperson_quirurgico_no']));
$antperson_quirurgico_cual = strtoupper(addslashes($_POST['antperson_quirurgico_cual']));
*/
$nombre_numero_hijos               = strtoupper(addslashes($_POST['nombre_numero_hijos']));
$nombre_tipo_regimen               = strtoupper(addslashes($_POST['nombre_tipo_regimen']));
$nombre_fondo_pension              = strtoupper(addslashes($_POST['nombre_fondo_pension']));
$nombre_empresa_contratante        = strtoupper(addslashes($_POST['nombre_empresa_contratante']));
$nombre_empresa                    = strtoupper(addslashes($_POST['nombre_empresa']));
$cargo_empresa                     = strtoupper(addslashes($_POST['cargo_empresa']));
$area_empresa                      = strtoupper(addslashes($_POST['area_empresa']));
$ciudad_empresa                    = strtoupper(addslashes($_POST['ciudad_empresa']));
$nombre_sexo                       = strtoupper(addslashes($_POST['nombre_sexo']));
$nombre_arl                        = strtoupper(addslashes($_POST['nombre_arl']));
$nombre_actividad_ecoemp           = strtoupper(addslashes($_POST['nombre_actividad_ecoemp']));
$nombre_estrato                    = strtoupper(addslashes($_POST['nombre_estrato']));
$fecha_nac_ymd                     = addslashes($_POST['fecha_nac_ymd']);
$fecha_nac_time                    = strtotime($fecha_nac_ymd);
$fecha_time                        = time();
/* //////////////////////////////////////////////////////////////////////////////////////////////////////////// */
$sql_data = "INSERT INTO cliente (cedula, nombre_tipo_doc, nombres, apellido1, apellido2, lugar_nac, lugar_procedencia, lugar_residencia, 
cod_entidad, nombre_grupo_rh, nombre_raza, nombre_religion, nombre_ocupacion, nombre_estado_civil, nombre_escolaridad, correo, direccion, tel_cliente,
nombre_contacto1, tel_contacto1, parentesco_contacto1, nombre_sexo, nombre_arl, nombre_actividad_ecoemp, nombre_estrato,
nombre_numero_hijos, nombre_tipo_regimen, nombre_fondo_pension, nombre_empresa_contratante,
nombre_empresa, cargo_empresa, area_empresa, ciudad_empresa, direccion_contacto1, fecha_nac_ymd, fecha_nac_time, fecha_time) 
VALUES ('$cedula', '$nombre_tipo_doc', '$nombres', '$apellido1', '$apellido2', '$lugar_nac', '$lugar_procedencia', '$lugar_residencia', 
'$cod_entidad', '$nombre_grupo_rh', '$nombre_raza', '$nombre_religion', '$nombre_ocupacion', '$nombre_estado_civil', '$nombre_escolaridad', '$correo', '$direccion', '$tel_cliente',
'$nombre_contacto1', '$tel_contacto1', '$parentesco_contacto1', '$nombre_sexo', '$nombre_arl', '$nombre_actividad_ecoemp', '$nombre_estrato',
'$nombre_numero_hijos', '$nombre_tipo_regimen', '$nombre_fondo_pension', '$nombre_empresa_contratante',
'$nombre_empresa', '$cargo_empresa', '$area_empresa', '$ciudad_empresa', '$direccion_contacto1', '$fecha_nac_ymd', '$fecha_nac_time', '$fecha_time')";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; ../admin/escoger_opcion_crearhistoriaclinica_o_verlistapaciente.php?cedula=<?php echo $cedula ?>">
<?php } } ?>
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