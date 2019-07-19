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
<?php $pagina = addslashes($_GET['pagina']); ?>
<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">
<div class="breadcrumbs"><a href="<?php echo $pagina; ?>"><h4>Editar Usuario</h4></a></div>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$cod_administrador             = intval($_GET['cod_administrador']);
$pagina                        = addslashes($_GET['pagina']);

$mostrar_datos_sql = "SELECT * FROM administrador WHERE cod_administrador = '$cod_administrador'";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$matriz_consulta = mysqli_fetch_assoc($consulta);

$nombres                      = $matriz_consulta['nombres'];
$apellidos                    = $matriz_consulta['apellidos'];
$cuenta                       = $matriz_consulta['cuenta'];
$correo                       = $matriz_consulta['correo'];
$cod_seguridad                = $matriz_consulta['cod_seguridad'];
$nombre_sexo                  = $matriz_consulta['nombre_sexo'];
$telefono                     = $matriz_consulta['telefono'];
$cod_tipo_historia_clinica    = $matriz_consulta['cod_tipo_historia_clinica'];
$url_img_firma_prof_min       = $matriz_consulta['url_img_firma_prof_min'];
$url_img_firma_prof_ori       = $matriz_consulta['url_img_firma_prof_ori'];

?>
<form name="formulario_edicion" accept-charset="utf-8" method="post" action="../admin/edit_usuario_reg.php">
<fieldset>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th style="text-align:center">NOMBRES</th>
			<th style="text-align:center">APELLIDOS</th>
			<th style="text-align:center">USUARIO</th>
			<th style="text-align:center">TIPO DE ROL</th>
			<th style="text-align:center">PROFESIONAL</th>
		</tr></thead>
    <tbody>
    	<tr>
<td><input type="text" name="nombres" value="<?php echo ($nombres) ?>"  class="input-block-level" required autofocus/></td>
<td><input type="text" name="apellidos" value="<?php echo ($apellidos) ?>"  class="input-block-level" required autofocus/></td>
<td><input type="text" name="cuenta" value="<?php echo ($cuenta) ?>"  class="input-block-level" required autofocus/></td>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<td><select name="cod_seguridad" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
<?php if (isset($cod_seguridad)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_seguridad, nombre_seguridad FROM seguridad ORDER BY cod_seguridad ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_seguridad) and $cod_seguridad == $datos2['cod_seguridad']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_seguridad'];
$nombre = $datos2['nombre_seguridad'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select></td>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->	
<td><select name="cod_tipo_historia_clinica" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
<?php if (isset($cod_tipo_historia_clinica)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_tipo_historia_clinica, nombre_tipo_historia_clinica FROM tipo_historia_clinica ORDER BY cod_tipo_historia_clinica ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_tipo_historia_clinica) and $cod_tipo_historia_clinica == $datos2['cod_tipo_historia_clinica']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_tipo_historia_clinica'];
$nombre = $datos2['nombre_tipo_historia_clinica'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select></td>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    	</tr>
    	</tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th style="text-align:center">CORREO</th>
			<th style="text-align:center">TELEFONO</th>
			<th style="text-align:center">CAMBIAR CONTRASEÑA</th>
			<th style="text-align:center">FIRMA</th>
			<th style="text-align:center">CAMBIAR FIRMA</th>
		</tr></thead>
    <tbody>
    	<tr>
<td><input type="text" name="correo" value="<?php echo ($correo) ?>"  class="input-block-level"/></td>
<td><input class="input-block-level" name="telefono" type="number" value="<?php echo ($telefono) ?>"/></td>
<td style="text-align:center"><a href="../admin/cambiar_contrasena.php?cod_administrador=<?php echo $cod_administrador; ?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/contrasena.png" alt="cambiar contrase&ntilde;a"></a></td>
<td style="text-align:center"><img src="<?php echo $url_img_firma_prof_min ?>"></td>
<td style="text-align:center"><a href="../admin/edit_cargar_firma_usuario.php?cod_administrador=<?php echo $cod_administrador; ?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/cambiar_firma_usuario.png" alt="cambiar contrase&ntilde;a"></a></td>
    	</tr>
    	</tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<hr>
<input type="hidden" name="cod_administrador" value="<?php echo $cod_administrador ?>"/>
<input type="hidden" name="pagina" value="<?php echo $pagina ?>"/>
<input type="hidden" name="ins_edit" value="formulario_insert_edit">

<div class="actions"><td><input type="submit" value="Actualizar Información" name="submit" id="submitButton" class="btn btn-info pull-center" title="Click aqui para enviar" /></td></div>
</fieldset>
</form>
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