﻿<?php $serguridad_pagina = 1; ?>
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

$cod_medicamento              = intval($_POST['cod_medicamento']);
$nombre_medicamento           = strtoupper(addslashes($_POST['nombre_medicamento']));
$cod_tipo_historia_clinica    = intval($_POST['cod_tipo_historia_clinica']);
$cod_tipo_pos                 = intval($_POST['cod_tipo_pos']);
$cod_estado                   = intval($_POST['cod_estado']);
$principio_activo             = addslashes($_POST['principio_activo']);
$concentracion                = addslashes($_POST['concentracion']);
$forma                        = addslashes($_POST['forma']);
$aclaracion                   = addslashes($_POST['aclaracion']);
$cod_atc                      = addslashes($_POST['cod_atc']);

$actualizar_historia_clinica = "UPDATE medicamento SET nombre_medicamento = '$nombre_medicamento', cod_tipo_historia_clinica = '$cod_tipo_historia_clinica', 
cod_tipo_pos = '$cod_tipo_pos', cod_estado = '$cod_estado', principio_activo = '$principio_activo', concentracion = '$concentracion', forma = '$forma', 
aclaracion = '$aclaracion', cod_atc = '$cod_atc' WHERE cod_medicamento = '$cod_medicamento'";
$resultado_historia_clinica = mysqli_query($conectar, $actualizar_historia_clinica) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; ../admin/lista_medicamento.php">
<?php } else { ?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; ../admin/lista_medicamento.php">
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