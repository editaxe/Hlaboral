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

$cuenta = trim(strip_tags(stripslashes($_POST['cuenta'])));

$obtener_entidad = "SELECT cuenta FROM administrador WHERE cuenta = '".($cuenta)."'";
$consultar_entidad = mysqli_query($conectar, $obtener_entidad) or die(mysqli_error($conectar));
$info_entidad = mysqli_fetch_assoc($consultar_entidad);

if(mysqli_num_rows(@$consultar_entidad) > 0) 	{
echo '<img src="../imagenes/advertencia.gif"><h4>EL USUARIO '. $cuenta.' YA ESTA REGISTRADO</h4></div>';
?>
<META HTTP-EQUIV="REFRESH" CONTENT="5; <?php echo $pagina_else ?>">
<!-- ***************************************************************************************************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
} else {
$nombres                       = strtoupper(addslashes($_POST['nombres']));
$apellidos                     = strtoupper(addslashes($_POST['apellidos']));
$cod_seguridad                 = intval($_POST["cod_seguridad"]);
$cod_tipo_historia_clinica     = intval($_POST["cod_tipo_historia_clinica"]);
$nombre_sexo                   = strtoupper(addslashes($_POST['nombre_sexo']));
$contrasena1                   = addslashes($_POST['contrasena1']);
$contrasena2                   = addslashes($_POST['contrasena2']);
$contrasena                    = sha1($contrasena1); //Encriptacion nivel 1
$correo                        = addslashes($_POST["correo"]);
$telefono                      = intval($_POST["telefono"]);
$estilo_css                    = addslashes($_POST['estilo_css']);
$fecha_hora                    = date("H:i:s");
$fecha                         = date("Y/m/d");
$creador                       = $cuenta_actual;

if ($contrasena1 == $contrasena2) {

$agreg = "INSERT INTO administrador (nombres, apellidos, nombre_sexo, cuenta, contrasena, correo, cod_seguridad, cod_tipo_historia_clinica, telefono, estilo_css, creador, fecha_hora, fecha) 
VALUES ('$nombres', '$apellidos', '$nombre_sexo', '$cuenta', '$contrasena', '$correo', '$cod_seguridad', '$cod_tipo_historia_clinica', '$telefono', '$estilo_css', '$creador', '$fecha_hora', '$fecha')";
$resultado_sql1 = mysqli_query($conectar, $agreg) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; ../admin/lista_usuario.php">
<?php } } } ?>
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