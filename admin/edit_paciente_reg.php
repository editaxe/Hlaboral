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
$pagina_else = addslashes($_POST['pagina']);

if ((isset($_POST["ins_edit"])) && ($_POST["ins_edit"] == "formulario_insert_edit")) {
/* //////////////////////////////////////////////////////////////////////////////////////////////////////////// */
$cod_cliente                   = intval($_POST['cod_cliente']);
$cedula                        = intval($_POST['cedula']);
$tel_cliente                   = intval($_POST['tel_cliente']);
$cod_entidad                   = intval($_POST['cod_entidad']);
$nombre_tipo_doc               = strtoupper(addslashes($_POST['nombre_tipo_doc']));
$nombres                       = strtoupper(addslashes($_POST['nombres']));
$apellido1                     = strtoupper(addslashes($_POST['apellido1']));
//$apellido2                     = strtoupper(addslashes($_POST['apellido2']));
$apellido2                     = ''; 
$nombre_sexo                   = strtoupper(addslashes($_POST['nombre_sexo']));
$direccion                     = strtoupper(addslashes($_POST['direccion']));
$correo                        = addslashes($_POST['correo']);
$nombre_contacto1              = strtoupper(addslashes($_POST['nombre_contacto1']));
$parentesco_contacto1          = strtoupper(addslashes($_POST['parentesco_contacto1']));
$tel_contacto1                 = addslashes($_POST['tel_contacto1']);
//$nombre_contacto2              = strtoupper(addslashes($_POST['nombre_contacto2']));
//$parentesco_contacto2          = strtoupper(addslashes($_POST['parentesco_contacto2']));
//$tel_contacto2                 = strtoupper(addslashes($_POST['tel_contacto2']));
//$direccion_contacto2           = strtoupper(addslashes($_POST['direccion_contacto2']));
/*
$antperson_alergia_si          = strtoupper(addslashes($_POST['antperson_alergia_si']));
$antperson_alergia_no          = strtoupper(addslashes($_POST['antperson_alergia_no']));
$antperson_alergia_cual        = strtoupper(addslashes($_POST['antperson_alergia_cual']));
$antperson_patologico_si       = strtoupper(addslashes($_POST['antperson_patologico_si']));
$antperson_patologico_no       = strtoupper(addslashes($_POST['antperson_patologico_no']));
$antperson_patologico_cual     = strtoupper(addslashes($_POST['antperson_patologico_cual']));
$antperson_quirurgico_si       = strtoupper(addslashes($_POST['antperson_quirurgico_si']));
$antperson_quirurgico_no       = strtoupper(addslashes($_POST['antperson_quirurgico_no']));
$antperson_quirurgico_cual     = strtoupper(addslashes($_POST['antperson_quirurgico_cual']));
*/
$lugar_nac                     = strtoupper(addslashes($_POST['lugar_nac']));
$lugar_procedencia             = strtoupper(addslashes($_POST['lugar_procedencia']));
$lugar_residencia              = strtoupper(addslashes($_POST['lugar_residencia']));
$nombre_grupo_rh               = strtoupper(addslashes($_POST['nombre_grupo_rh']));
$nombre_raza                   = strtoupper(addslashes($_POST['nombre_raza']));
$nombre_religion               = strtoupper(addslashes($_POST['nombre_religion']));
$nombre_ocupacion              = strtoupper(addslashes($_POST['nombre_ocupacion']));
$nombre_estado_civil           = strtoupper(addslashes($_POST['nombre_estado_civil']));
$nombre_escolaridad            = strtoupper(addslashes($_POST['nombre_escolaridad']));
$nombre_empresa_contratante    = strtoupper(addslashes($_POST['nombre_empresa_contratante']));
$nombre_empresa                = strtoupper(addslashes($_POST['nombre_empresa']));
$cargo_empresa                 = strtoupper(addslashes($_POST['cargo_empresa']));
$area_empresa                  = strtoupper(addslashes($_POST['area_empresa']));
$ciudad_empresa                = strtoupper(addslashes($_POST['ciudad_empresa']));
$nombre_actividad_ecoemp       = strtoupper(addslashes($_POST['nombre_actividad_ecoemp']));
$nombre_estrato                = strtoupper(addslashes($_POST['nombre_estrato']));
$nombre_numero_hijos           = intval($_POST['nombre_numero_hijos']);
$nombre_tipo_regimen           = strtoupper(addslashes($_POST['nombre_tipo_regimen']));
$nombre_fondo_pension          = strtoupper(addslashes($_POST['nombre_fondo_pension']));
$nombre_arl                    = strtoupper(addslashes($_POST['nombre_arl']));
$parentesco_contacto1          = strtoupper(addslashes($_POST['parentesco_contacto1']));
$direccion_contacto1           = strtoupper(addslashes($_POST['direccion_contacto1']));
$fecha_nac_ymd                 = addslashes($_POST['fecha_nac_ymd']);
$fecha_nac_time                = strtotime($fecha_nac_ymd);
/* //////////////////////////////////////////////////////////////////////////////////////////////////////////// */
$actualizar_historia_clinica = "UPDATE cliente SET cedula = '$cedula', nombre_tipo_doc = '$nombre_tipo_doc', nombres = '$nombres', apellido1 = '$apellido1', 
apellido2 = '$apellido2', nombre_sexo = '$nombre_sexo', fecha_nac_ymd = '$fecha_nac_ymd', fecha_nac_time = '$fecha_nac_time', lugar_nac = '$lugar_nac', 
lugar_procedencia = '$lugar_procedencia', lugar_residencia = '$lugar_residencia', cod_entidad = '$cod_entidad', nombre_grupo_rh = '$nombre_grupo_rh', 
nombre_raza = '$nombre_raza', nombre_religion = '$nombre_religion', nombre_ocupacion = '$nombre_ocupacion', nombre_estado_civil = '$nombre_estado_civil', 
nombre_escolaridad = '$nombre_escolaridad', correo = '$correo', direccion = '$direccion', nombre_actividad_ecoemp = '$nombre_actividad_ecoemp', 
nombre_estrato = '$nombre_estrato', tel_cliente = '$tel_cliente', nombre_contacto1 = '$nombre_contacto1', parentesco_contacto1 = '$parentesco_contacto1', 
tel_contacto1 = '$tel_contacto1', nombre_empresa_contratante = '$nombre_empresa_contratante', nombre_empresa = '$nombre_empresa', 
cargo_empresa = '$cargo_empresa', area_empresa = '$area_empresa', ciudad_empresa = '$ciudad_empresa', nombre_numero_hijos = '$nombre_numero_hijos', 
nombre_tipo_regimen = '$nombre_tipo_regimen', nombre_fondo_pension = '$nombre_fondo_pension', nombre_arl = '$nombre_arl', 
parentesco_contacto1 = '$parentesco_contacto1', direccion_contacto1 = '$direccion_contacto1' WHERE cod_cliente = '$cod_cliente'";
$resultado_historia_clinica = mysqli_query($conectar, $actualizar_historia_clinica) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; ../admin/lista_paciente.php">
<?php } else { ?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; ../admin/lista_paciente.php">
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