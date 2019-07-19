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

<div class="breadcrumbs"><a href="../admin/lista_videotutorial_admin.php"><h4>Videotutorial</h4></a></div>
<hr>
<div class="row-fluid">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<div class="span5">

<form action="" id="searchform" method="post">
<input type="text" name="buscar" placeholder="Buscar" required>
<button type="submit">Buscar</button>
</form>

<?php
$pagina               = $_SERVER['PHP_SELF'];

if (isset($_POST['buscar'])) { 

$buscar               = addslashes($_POST['buscar']);
$sql_videotutorial = "SELECT * FROM videotutorial WHERE (nombre_videotutorial LIKE '%$buscar%') AND (cod_estado = '1') ORDER BY cod_videotutorial ASC";
} 
else { 
$sql_videotutorial = "SELECT * FROM videotutorial WHERE (cod_estado = '1') ORDER BY cod_videotutorial ASC";
}

$resultado_videotutorial = mysqli_query($conectar, $sql_videotutorial);
while ($info_videotutorial = mysqli_fetch_assoc($resultado_videotutorial)) {

$cod_videotutorial            = $info_videotutorial['cod_videotutorial'];
$nombre_videotutorial         = $info_videotutorial['nombre_videotutorial'];
$descripcion_videotutorial    = $info_videotutorial['descripcion_videotutorial'];
$url_videotutorial            = $info_videotutorial['url_videotutorial'];
$cod_estado                   = $info_videotutorial['cod_estado'];
$nomb_videotutorial           = $info_videotutorial['nomb_videotutorial'];
$fecha_mes                    = $info_videotutorial['fecha_mes'];
$fecha_anyo                   = $info_videotutorial['fecha_anyo'];
$fecha_ymd                    = $info_videotutorial['fecha_ymd'];
$fecha_dmy                    = $info_videotutorial['fecha_dmy'];
$fecha_time                   = $info_videotutorial['fecha_time'];
$fecha_reg_time               = $info_videotutorial['fecha_reg_time'];
?>
     <h5><a href="<?php echo $pagina ?>?cod_videotutorial=<?php echo $cod_videotutorial?>"><?php echo $nombre_videotutorial; ?></a></h5>
<?php } ?>
</div>


<?php
if (isset($_GET['cod_videotutorial'])) {

$cod_videotutorial            = intval($_GET['cod_videotutorial']);

$sql_cliente = "SELECT * FROM videotutorial WHERE cod_videotutorial = '$cod_videotutorial'";
$resultado_cliente = mysqli_query($conectar, $sql_cliente);
$info_cliente = mysqli_fetch_assoc($resultado_cliente);

$cod_videotutorial            = $info_cliente['cod_videotutorial'];
$nombre_videotutorial         = $info_cliente['nombre_videotutorial'];
$descripcion_videotutorial    = $info_cliente['descripcion_videotutorial'];
$url_videotutorial            = $info_cliente['url_videotutorial'];
$cod_estado                   = $info_cliente['cod_estado'];
?>
<div class="span7" id="divMain">
     <h3><a><?php echo $nombre_videotutorial; ?></a><a href="edit_videotutorial.php?cod_videotutorial=<?php echo $cod_videotutorial ?>&pagina=<?php echo $pagina ?>">.</a></h3>
     <hr>
     <video src="<?php echo $url_videotutorial ?>" controls width="600" height="450">Tu navegador no soporta el elemento video. <a href="<?php echo $url_videotutorial ?>">Intenta descargando este video</a>. <code>video</code>.</video>
     <hr>
    <p><?php echo $descripcion_videotutorial; ?></p>
</div>
<?php } ?>
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* FIN MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
</div>

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