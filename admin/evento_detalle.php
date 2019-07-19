﻿<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior_libre.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
</head>
<body id="pageBody">
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php include_once('../menu/03_menu_navegacion_libre.php'); ?>
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php
$cod_evento = intval($_GET['cod_evento']);

$sql_evento = "SELECT * FROM evento WHERE cod_evento = '$cod_evento'";
$exec_evento = mysqli_query($conectar, $sql_evento) or die(mysqli_error($conectar));
$datos_evento = mysqli_fetch_assoc($exec_evento);

$nombre_evento = $datos_evento['nombre_evento'];
$descripcion_evento = $datos_evento['descripcion_evento'];
$url_imagen = $datos_evento['url_imagen'];
$fecha_ymd = $datos_evento['fecha_ymd'];
$fecha_hora = $datos_evento['fecha_hora'];
$cod_estado = $datos_evento['cod_estado'];
?>
<div id="contentOuterSeparator"></div>
<div class="container">
    <div class="divPanel page-content">
<div class="breadcrumbs"><a href="#"><h4><?php echo (($nombre_evento)) ?></h4></a></div>
        <div class="row-fluid">
			<!--Edit Main Content Area here-->
                <div class="span8" id="divMain">
					<hr>					
<img src="<?php echo $url_imagen ?>" class="img-polaroid" style="margin:12px 0px;">  
<!--<h2>Consequat bibendum quam</h2>-->
<p align="justify"><?php echo (($descripcion_evento)) ?></p>
			<div class="row-fluid"></div>
			
                </div>
				<!--End Main Content Area here-->

<!-- 1******************************************************* MODULO PUBLICIDAD *********************************************** -->
<?php include_once('../admin/modulo_evento.php'); ?>
<!-- 1******************************************************* MODULO PUBLICIDAD *********************************************** -->

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