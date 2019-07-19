<?php $serguridad_pagina = 1; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<link href="../estilo_css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
<!--<link href="../estilo_css/bootstrap-combined.min.css" rel="stylesheet">-->
<link href="../estilo_css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" media="screen">
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

<div class="breadcrumbs">
<a href="../admin/lista_paciente_buscar.php"><h4>Registrar Paciente&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a href="../admin/lista_paciente.php">Lista de Pacientes</h4></a>
</div>
<hr>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<script type="text/javascript" src="../js/jquery-1.3.2.js"></script>
<script type="text/javascript">
$(document).ready(function() {	
$('#cedula').blur(function(){
		
$('#Info').html('<img src="../imagenes/loader.gif" alt="" />').fadeOut(1000);

var cedula = $(this).val();		
var dataString = 'cedula='+cedula;
$.ajax({ type: "GET", url: "validar_cedula.php", data: dataString, success: function(data) { $('#Info').fadeIn(1000).html(data);
} }); }); });
</script>

<?php $pagina = $_SERVER['PHP_SELF']; ?>

<div class="table-responsive">
<form name="formulario_insersion" accept-charset="utf-8" method="post" action="../admin/reg_paciente_reg.php">
<fieldset>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div id="Info"></div></td>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr><th>TIPO DE IDENTIFICACIÓN</th><th>NUMERO</th><th>APELLIDOS</th><!--<th>SEGUNDO APELLIDO</th>--><th>NOMBRES COMPLETOS</th></tr></thead>
<tbody><tr>

<td><select name="nombre_tipo_doc" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_tipo_doc)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_tipo_doc, tipo_doc_abrev FROM tipo_doc ORDER BY tipo_doc_abrev ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_tipo_doc) and $cod_tipo_doc == $datos2['cod_tipo_doc']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_tipo_doc'];
$nombre = $datos2['tipo_doc_abrev'];
echo "<option value='".$nombre."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<td><input class="input-block-level" id="cedula" name="cedula" type="text" value="" required/></td>
<td><input class="input-block-level" name="apellido1" type="text" value="" required/></td>
<!--<td><input class="input-block-level" name="apellido2" type="text" value="" required/></td>-->
<td><input class="input-block-level" name="nombres" type="text" value="" required/></td>
</tr></tbody>
</table>
<br>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr>
<th>FECHA DE NACIMIENTO</th>
<th>SEXO</th>
<th>DOMICILIO</th>
<th>TELEFONO</th>
<th>CORREO</th>
</tr></thead>
<tbody><tr>
<td><div id="fecha_nac_ymd" class="input-append date"><input type="text" name="fecha_nac_ymd" value=""></input><span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span></div></td>

<td><select name="nombre_sexo" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_sexo)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_sexo, nombre_sexo FROM sexo ORDER BY nombre_sexo ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_sexo) and $cod_sexo == $datos2['cod_sexo']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_sexo'];
$nombre = $datos2['nombre_sexo'];
echo "<option value='".$nombre."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<td><input class="input-block-level" name="direccion" type="text" value=""/></td>
<td><input class="input-block-level" name="tel_cliente" type="text" value=""/></td>
<td><input class="input-block-level" name="correo" type="text" value=""/></td>
</tr></tbody>
</table>
<br>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr>
<th>LUGAR DE NACIMIENTO</th>
<th>LUGAR DE PROCEDENCIA</th>
<th>LUGAR DE RESIDENCIA</th>
<th>GRUPO RH</th>
<th>ESTRATO</th>
<th>N° HIJOS</th>
</tr></thead>
<tbody><tr>
<td><input class="input-block-level" name="lugar_nac" type="text" value=""/></td>
<td><input class="input-block-level" name="lugar_procedencia" type="text" value=""/></td>
<td><input class="input-block-level" name="lugar_residencia" type="text" value=""/></td>

<td><select name="nombre_grupo_rh" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_grupo_rh)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_grupo_rh, nombre_grupo_rh FROM grupo_rh ORDER BY nombre_grupo_rh ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_grupo_rh) and $cod_grupo_rh == $datos2['cod_grupo_rh']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_grupo_rh'];
$nombre = $datos2['nombre_grupo_rh'];
echo "<option value='".$nombre."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<td><select name="nombre_estrato" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_estrato)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_estrato, nombre_estrato FROM estrato ORDER BY nombre_estrato ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_estrato) and $cod_estrato == $datos2['cod_estrato']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_estrato'];
$nombre = $datos2['nombre_estrato'];
echo "<option value='".$nombre."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<td><select name="nombre_numero_hijos" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_numero_hijos)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_numero_hijos, nombre_numero_hijos FROM numero_hijos ORDER BY nombre_numero_hijos ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_numero_hijos) and $cod_numero_hijos == $datos2['cod_numero_hijos']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_numero_hijos'];
$nombre = $datos2['nombre_numero_hijos'];
echo "<option value='".$nombre."' $seleccionado >".$nombre."</option>"; } ?></select></td>

</tr></tbody>
</table>
<br>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr>
<th>RAZA</th>
<th>RELIGIÓN</th>
<th>OCUPACIÓN</th>
<th>ESTADO CIVIL</th>
<th>NIVEL EDUCATIVO</th>
</tr></thead>
<tbody><tr>

<td><select name="nombre_raza" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_raza)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_raza, nombre_raza FROM raza ORDER BY cod_raza ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_raza) and $cod_raza == $datos2['cod_raza']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_raza'];
$nombre = $datos2['nombre_raza'];
echo "<option value='".$nombre."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<td><select name="nombre_religion" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_religion)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_religion, nombre_religion FROM religion ORDER BY cod_religion ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_religion) and $cod_religion == $datos2['cod_religion']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_religion'];
$nombre = $datos2['nombre_religion'];
echo "<option value='".$nombre."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<td><input class="input-block-level" name="nombre_ocupacion" type="text" value=""/></td>

<td><select name="nombre_estado_civil" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_estado_civil)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_estado_civil, nombre_estado_civil FROM estado_civil ORDER BY cod_estado_civil ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_estado_civil) and $cod_estado_civil == $datos2['cod_estado_civil']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_estado_civil'];
$nombre = $datos2['nombre_estado_civil'];
echo "<option value='".$nombre."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<td><select name="nombre_escolaridad" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_escolaridad)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_escolaridad, nombre_escolaridad FROM escolaridad ORDER BY cod_escolaridad ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_escolaridad) and $cod_escolaridad == $datos2['cod_escolaridad']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_escolaridad'];
$nombre = $datos2['nombre_escolaridad'];
echo "<option value='".$nombre."' $seleccionado >".$nombre."</option>"; } ?></select></td>

</tr></tbody>
</table>
<br>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr><th>EMPRESA CONTRATANTE</th><th>EMPRESA A LABORAR</th><th>ACTIVIDAD ECONOMICA DE LA EMPRESA</th><th>CARGO TRABAJADOR</th><th>AREA A LABORAR</th><th>CIUDAD</th></tr></thead>
<tbody><tr>

<td><select name="nombre_empresa_contratante" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_empresa_contratante)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_empresa_contratante, nombre_empresa_contratante FROM empresa_contratante ORDER BY nombre_empresa_contratante ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_empresa_contratante) and $cod_empresa_contratante == $datos2['cod_empresa_contratante']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_empresa_contratante'];
$nombre = $datos2['nombre_empresa_contratante'];
echo "<option value='".$nombre."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<td><select name="nombre_empresa" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_empresa)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_empresa, nombre_empresa FROM empresa ORDER BY nombre_empresa ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_empresa) and $cod_empresa == $datos2['cod_empresa']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_empresa'];
$nombre = $datos2['nombre_empresa'];
echo "<option value='".$nombre."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<td><select name="nombre_actividad_ecoemp" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_actividad_ecoemp)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_actividad_ecoemp, nombre_actividad_ecoemp FROM actividad_ecoemp ORDER BY nombre_actividad_ecoemp ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_actividad_ecoemp) and $cod_actividad_ecoemp == $datos2['cod_actividad_ecoemp']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_actividad_ecoemp'];
$nombre = $datos2['nombre_actividad_ecoemp'];
echo "<option value='".$nombre."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<td><input class="input-block-level" name="cargo_empresa" type="text" value=""/></td>
<td><input class="input-block-level" name="area_empresa" type="text" value=""/></td>
<td><input class="input-block-level" name="ciudad_empresa" type="text" value=""/></td>

</tr></tbody>
</table>
<br>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr>
<th>EPS</th>
<th>TIPO RÉGIMEN</th>
<th>FONDO DE PENSIONES</th>
<th>ARL</th>
</tr></thead>
<tbody><tr>

<td><select name="cod_entidad" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_entidad)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_entidad, nombre_entidad FROM entidad ORDER BY nombre_entidad ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_entidad) and $cod_entidad == $datos2['cod_entidad']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_entidad'];
$nombre = $datos2['nombre_entidad'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<td><select name="nombre_tipo_regimen" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_tipo_regimen)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_tipo_regimen, nombre_tipo_regimen FROM tipo_regimen ORDER BY nombre_tipo_regimen ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_tipo_regimen) and $cod_tipo_regimen == $datos2['cod_tipo_regimen']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_tipo_regimen'];
$nombre = $datos2['nombre_tipo_regimen'];
echo "<option value='".$nombre."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<td><select name="nombre_fondo_pension" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_fondo_pension)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_fondo_pension, nombre_fondo_pension FROM fondo_pension ORDER BY nombre_fondo_pension ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_fondo_pension) and $cod_fondo_pension == $datos2['cod_fondo_pension']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_fondo_pension'];
$nombre = $datos2['nombre_fondo_pension'];
echo "<option value='".$nombre."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<td><select name="nombre_arl" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_arl)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_arl, nombre_arl FROM arl ORDER BY nombre_arl ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_arl) and $cod_arl == $datos2['cod_arl']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_arl'];
$nombre = $datos2['nombre_arl'];
echo "<option value='".$nombre."' $seleccionado >".$nombre."</option>"; } ?></select></td>

</tr></tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;"><thead><tr><th valign="middle">DATOS DE LAS PERSONAS RESPONSABLE DEL PACIENTE</th></tr></thead></table>
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr><th>NOMBRES COMPLETOS RESPONSABLE</th><th>PARENTESCO</th><th>TELEFONO Y/O CELULAR</th><th>DIRRECIÓN</th></tr></thead>
<tbody><tr>
<td><input class="input-block-level" name="nombre_contacto1" type="text" value=""/></td>
<td><input class="input-block-level" name="parentesco_contacto1" type="text" value=""/></td>
<td><input class="input-block-level" name="tel_contacto1" type="text" value=""/></td>
<td><input class="input-block-level" name="direccion_contacto1" type="text" value=""/></td>
</tr></tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!--
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr><th>NOMBRES COMPLETOS RESPONSABLE 2</th><th>PARENTESCO</th><th>TELEFONO Y/O CELULAR</th><th>DIRRECIÓN</th></tr></thead>
<tbody><tr>
<td><input class="input-block-level" name="nombre_contacto2" type="text" value=""/></td>
<td><input class="input-block-level" name="parentesco_contacto2" type="text" value=""/></td>
<td><input class="input-block-level" name="tel_contacto2" type="text" value=""/></td>
<td><input class="input-block-level" name="direccion_contacto2" type="text" value=""/></td>
</tr></tbody>
</table>
<br>
-->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!--
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;"><thead><tr><th valign="middle">ANTECEDENTES PERSONALES</th></tr></thead></table>
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr><th></th><th>SI</th><th>NO</th><th>CUAL</th></tr><thead>
<tr><th rowspan="2" valign="middle" align="left">REACCIONES ALERGICAS:</th>
<tr>
<td><input class="input-block-level" name="antperson_alergia_si" type="text" value=""/></td>
<td><input class="input-block-level" name="antperson_alergia_no" type="text" value=""/></td>
<td><input class="input-block-level" name="antperson_alergia_cual" type="text" value=""/></td>
</tr>
<tr></tr><tr><th rowspan="2" valign="middle" align="left">PATOLOGICOS:</th>
<tr>
<td><input class="input-block-level" name="antperson_patologico_si" type="text" value=""/></td>
<td><input class="input-block-level" name="antperson_patologico_no" type="text" value=""/></td>
<td><input class="input-block-level" name="antperson_patologico_cual" type="text" value=""/></td>
</tr>
<tr></tr><tr><th rowspan="2" valign="middle" align="left">QUIRURGICOS:</th>
<tr>
<td><input class="input-block-level" name="antperson_quirurgico_si" type="text" value=""/></td>
<td><input class="input-block-level" name="antperson_quirurgico_no" type="text" value=""/></td>
<td><input class="input-block-level" name="antperson_quirurgico_cual" type="text" value=""/></td>
</tr>
</table>
-->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<input type="hidden" name="pagina" value="<?php echo $pagina ?>">
<input type="hidden" name="insersion" value="formulario_de_insersion">
<hr>
<div class="actions">
<input type="submit" value="Registrar Información" name="submit" id="submitButton" class="btn btn-info pull-center" title="Click aqui para enviar" />
</div>
</fieldset>
</form>
</div>
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
<script src="../js/bootstrap-select.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.es.js"></script>
<script type="text/javascript">$('#fecha_nac_ymd').datetimepicker({ format: 'yyyy/MM/dd', language: 'es' });</script>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->

</body>
</html>