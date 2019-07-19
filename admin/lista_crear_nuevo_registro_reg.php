<?php $serguridad_pagina = 1; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->

<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->

<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php include_once('../seguridad/seguridad_diseno_plantillas.php'); ?>
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->

<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">

<div class="breadcrumbs"><a href="#">Guardando...</a> <img src="../imagenes/popup_ajax_loader.gif" class="img-polaroid" alt=""></div>

<div class="row-fluid">
<div class="span12" id="divMain">
<?php
$tabla                   = addslashes($_GET['tabla']);
$cod_cliente             = intval($_GET['cod_cliente']);
$pagina                  = addslashes($_GET['pagina']);
//--------------------------------------------------------------------------------------------------------------//
$fecha_time              = time();
$fecha_ymd               = date("Y/m/d", $fecha_time);
$fecha_dmy               = date("d/m/Y", $fecha_time);
$fecha_my                = date("m/Y", $fecha_time);
$fecha_mes               = date("m/Y", $fecha_time);
$fecha_dia               = date("d", $fecha_time);
//$fecha_mes               = date("m", $fecha_time);
$fecha_anyo              = date("Y", $fecha_time);
$hora                    = date("H:i", $fecha_time);
$fecha_reg_time          = $fecha_time;
$cuenta                  = $cuenta_actual;
$motivo                  = 'PRE-INGRESO';
//--------------------------------------------------------------------------------------------------------------//
if ($tabla=='actitud_laboral') {

$sql_autoincremento_actitud_laboral = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$base_datos' AND TABLE_NAME = 'actitud_laboral'";
$exec_autoincremento_actitud_laboral = mysqli_query($conectar, $sql_autoincremento_actitud_laboral) or die(mysqli_error($conectar));
$datos_autoincremento_actitud_laboral = mysqli_fetch_assoc($exec_autoincremento_actitud_laboral);
$cod_actitud_laboral = $datos_autoincremento_actitud_laboral['AUTO_INCREMENT'];

$sql_data = "INSERT INTO actitud_laboral (cod_cliente, cod_administrador, motivo_actilab, fecha_dmy, fecha_ymd, fecha_time, fecha_mes, fecha_anyo, fecha_reg_time) 
VALUES ('$cod_cliente', '$cod_administrador', '$motivo', '$fecha_dmy', '$fecha_ymd', '$fecha_time', '$fecha_mes', '$fecha_anyo', '$fecha_reg_time')";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; ../admin/edit_concepto_actitud_laboral.php?cod_actitud_laboral=<?php echo $cod_actitud_laboral ?>&cod_cliente=<?php echo $cod_cliente ?>&cod_historia_clinica=0&pagina=<?php echo $pagina ?>">
<?php }
//--------------------------------------------------------------------------------------------------------------//
if ($tabla=='manipulacion_alimento') {

$sql_autoincremento_manipulacion_alimento = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$base_datos' AND TABLE_NAME = 'manipulacion_alimento'";
$exec_autoincremento_manipulacion_alimento = mysqli_query($conectar, $sql_autoincremento_manipulacion_alimento) or die(mysqli_error($conectar));
$datos_autoincremento_manipulacion_alimento = mysqli_fetch_assoc($exec_autoincremento_manipulacion_alimento);
$cod_manipulacion_alimento = $datos_autoincremento_manipulacion_alimento['AUTO_INCREMENT'];

$sql_data2 = "INSERT INTO manipulacion_alimento (cod_cliente, cod_administrador, motivo_manipulacion_alimento, fecha_dmy, fecha_ymd, fecha_time, fecha_mes, fecha_anyo, fecha_reg_time) 
VALUES ('$cod_cliente', '$cod_administrador', '$motivo', '$fecha_dmy', '$fecha_ymd', '$fecha_time', '$fecha_mes', '$fecha_anyo', '$fecha_reg_time')";
$exec_data2 = mysqli_query($conectar, $sql_data2) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; ../admin/edit_manipulacion_alimento.php?cod_manipulacion_alimento=<?php echo $cod_manipulacion_alimento ?>&cod_cliente=<?php echo $cod_cliente ?>&cod_historia_clinica=0&pagina=<?php echo $pagina ?>">
<?php }
//--------------------------------------------------------------------------------------------------------------//
if ($tabla=='trabajo_altura') {

$sql_autoincremento_trabajo_altura = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$base_datos' AND TABLE_NAME = 'trabajo_altura'";
$exec_autoincremento_trabajo_altura = mysqli_query($conectar, $sql_autoincremento_trabajo_altura) or die(mysqli_error($conectar));
$datos_autoincremento_trabajo_altura = mysqli_fetch_assoc($exec_autoincremento_trabajo_altura);
$cod_trabajo_altura = $datos_autoincremento_trabajo_altura['AUTO_INCREMENT'];

$sql_data3 = "INSERT INTO trabajo_altura (cod_cliente, cod_administrador, motivo_trabajo_altura, fecha_dmy, fecha_ymd, fecha_time, fecha_mes, fecha_anyo, fecha_reg_time) 
VALUES ('$cod_cliente', '$cod_administrador', '$motivo', '$fecha_dmy', '$fecha_ymd', '$fecha_time', '$fecha_mes', '$fecha_anyo', '$fecha_reg_time')";
$exec_data3 = mysqli_query($conectar, $sql_data3) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; ../admin/edit_trabajo_altura.php?cod_trabajo_altura=<?php echo $cod_trabajo_altura ?>&cod_cliente=<?php echo $cod_cliente ?>&cod_historia_clinica=0&pagina=<?php echo $pagina ?>">
<?php }
//--------------------------------------------------------------------------------------------------------------//
if ($tabla=='remision') {

$sql_autoincremento_trabajo_altura = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$base_datos' AND TABLE_NAME = 'remision'";
$exec_autoincremento_trabajo_altura = mysqli_query($conectar, $sql_autoincremento_trabajo_altura) or die(mysqli_error($conectar));
$datos_autoincremento_trabajo_altura = mysqli_fetch_assoc($exec_autoincremento_trabajo_altura);
$cod_remision = $datos_autoincremento_trabajo_altura['AUTO_INCREMENT'];

$sql_data3 = "INSERT INTO remision (cod_cliente, cod_administrador, motivo, fecha_dmy, fecha_ymd, fecha_time, fecha_mes, fecha_anyo, fecha_reg_time) 
VALUES ('$cod_cliente', '$cod_administrador', '$motivo', '$fecha_dmy', '$fecha_ymd', '$fecha_time', '$fecha_mes', '$fecha_anyo', '$fecha_reg_time')";
$exec_data3 = mysqli_query($conectar, $sql_data3) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; ../admin/edit_remision.php?cod_remision=<?php echo $cod_remision ?>&cod_cliente=<?php echo $cod_cliente ?>&cod_historia_clinica=0&pagina=<?php echo $pagina ?>">
<?php } ?>
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* FIN MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->

</div>
</div>
<div id="footerInnerSeparator"></div>
</div>
</div>
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* FIN MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->

  <!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<?php include_once('../admin/04_modulo_footer.php'); ?>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->

<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
<?php include_once('../admin/05_modulo_js.php'); ?>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->

</body>
</html>