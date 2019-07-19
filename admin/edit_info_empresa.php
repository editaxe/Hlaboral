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
<div class="breadcrumbs"><a href="#"><h4>Editar Información</h4></a></div>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$cod_info_empresa                 = intval($_GET['cod_info_empresa']);
$pagina                           = addslashes($_GET['pagina']);

$mostrar_datos_sql = "SELECT * FROM info_empresa WHERE cod_info_empresa = '$cod_info_empresa'";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$matriz_consulta = mysqli_fetch_assoc($consulta);

$titulo                           = $matriz_consulta['titulo']; 
$desarrollador                    = $matriz_consulta['desarrollador']; 
$anyo                             = $matriz_consulta['anyo']; 
$nombre                           = $matriz_consulta['nombre']; 
$eslogan                          = $matriz_consulta['eslogan']; 
$res                              = $matriz_consulta['res']; 
$res1                             = $matriz_consulta['res1']; 
$res2                             = $matriz_consulta['res2']; 
$fecha_res                        = $matriz_consulta['fecha_res'];
$pais                             = $matriz_consulta['pais']; 
$departamento                     = $matriz_consulta['departamento']; 
$ciudad                           = $matriz_consulta['ciudad']; 
$url_pag                          = $matriz_consulta['url_pag']; 
$localidad                        = $matriz_consulta['localidad']; 
$direccion                        = $matriz_consulta['direccion']; 
$correo                           = $matriz_consulta['correo']; 
$cabecera                         = $matriz_consulta['cabecera']; 
$img_cabecera                     = $matriz_consulta['img_cabecera']; 
$telefono                         = $matriz_consulta['telefono']; 
$nit_empresa                      = $matriz_consulta['nit_empresa']; 
$info_legal                       = $matriz_consulta['info_legal']; 
$logotipo                         = $matriz_consulta['logotipo']; 
$icono                            = $matriz_consulta['icono']; 
$nombre_font                      = $matriz_consulta['nombre_font'];
$tamano_font_hc                   = $matriz_consulta['tamano_font_hc'];
$tamano_font_aptlab               = $matriz_consulta['tamano_font_aptlab'];
$tamano_font_trabaltu             = $matriz_consulta['tamano_font_trabaltu'];
$tamano_font_manaliment           = $matriz_consulta['tamano_font_manaliment'];
$tamano_font_informe              = $matriz_consulta['tamano_font_informe'];
$tamano_font_remision             = $matriz_consulta['tamano_font_remision'];
$tamano_font_factura              = $matriz_consulta['tamano_font_factura'];
$version                          = $matriz_consulta['version']; 
$propietario_nombres_apellidos    = $matriz_consulta['propietario_nombres_apellidos']; 
$propietario_nit                  = $matriz_consulta['propietario_nit']; 
$propietario_url_firma            = $matriz_consulta['propietario_url_firma'];
$reg_medico                       = $matriz_consulta['reg_medico']; 
$licencia                         = $matriz_consulta['licencia']; 
$regimen                          = $matriz_consulta['regimen']; 
$smtp_correo_host                 = $matriz_consulta['smtp_correo_host']; 
$smtp_correo_auth                 = $matriz_consulta['smtp_correo_auth']; 
$smtp_correo_username             = $matriz_consulta['smtp_correo_username']; 
$smtp_correo_password             = $matriz_consulta['smtp_correo_password']; 
$smtp_correo_secure               = $matriz_consulta['smtp_correo_secure']; 
$smtp_correo_port                 = $matriz_consulta['smtp_correo_port']; 
$info_histclinic                  = $matriz_consulta['info_histclinic']; 
$info_aptlaboral                  = $matriz_consulta['info_aptlaboral'];
$dia_ini_facturacion              = $matriz_consulta['dia_ini_facturacion'];
$dia_fin_facturacion              = $matriz_consulta['dia_fin_facturacion'];
$fecha_time                       = $matriz_consulta['fecha_time']; 
?>
<form name="formulario_edicion" accept-charset="utf-8" method="post" action="../admin/edit_info_empresa_reg.php">
<fieldset>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th style="text-align:center">CABECERA PROGRAM</th>
			<th style="text-align:center">ESLOGAN</th>
			<th style="text-align:center">TITULO</th>
			<th style="text-align:center">CABECERA FACTURA</th>
			<th style="text-align:center">LEYENDA</th>
		</tr></thead>
    <tbody>
    	<tr>
<td><input type="text" name="nombre" value="<?php echo ($nombre) ?>"  class="input-block-level" /></td>
<td><input type="text" name="eslogan" value="<?php echo ($eslogan) ?>"  class="input-block-level" /></td>
<td><input type="text" name="titulo" value="<?php echo ($titulo) ?>"  class="input-block-level" /></td>
<td><input type="text" name="cabecera" value="<?php echo ($cabecera) ?>"  class="input-block-level" /></td>
<td><textarea class="input-block-level" name="info_legal" rows="5" cols="20"><?php echo $info_legal ?></textarea></td>
    	</tr>
    	</tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th style="text-align:center">PAIS</th>
			<th style="text-align:center">DEPARTAMENTO</th>
			<th style="text-align:center">CIUDAD</th>
			<th style="text-align:center">LOCALIDAD</th>
			<th style="text-align:center">DIRECCIÓN</th>
			<th style="text-align:center">RESOLUCIÓN</th>
			<th style="text-align:center">DE</th>
			<th style="text-align:center">A</th>
			<th style="text-align:center">FECHA RESOLUCIÓN</th>
		</tr></thead>
    <tbody>
    	<tr>
<td><input type="text" name="pais" value="<?php echo ($pais) ?>"  class="input-block-level" /></td>
<td><input type="text" name="departamento" value="<?php echo ($departamento) ?>"  class="input-block-level" /></td>
<td><input type="text" name="ciudad" value="<?php echo ($ciudad) ?>"  class="input-block-level" /></td>
<td><input type="text" name="localidad" value="<?php echo ($localidad) ?>"  class="input-block-level" /></td>
<td><input type="text" name="direccion" value="<?php echo ($direccion) ?>"  class="input-block-level" /></td>
<td><input type="text" name="res" value="<?php echo ($res) ?>"  class="input-block-level" /></td>
<td><input type="text" name="res1" value="<?php echo ($res1) ?>"  class="input-block-level" /></td>
<td><input type="text" name="res2" value="<?php echo ($res2) ?>"  class="input-block-level" /></td>
<td><input type="text" name="fecha_res" value="<?php echo ($fecha_res) ?>"  class="input-block-level" /></td>
    	</tr>
    	</tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th style="text-align:center">TELÉFONO</th>
			<th style="text-align:center">CORREO</th>
			<th style="text-align:center">NIT EMPRESA</th>
			<th style="text-align:center">RÉGIMEN</th>
		</tr></thead>
    <tbody>
    	<tr>
<td><input type="text" name="telefono" value="<?php echo ($telefono) ?>"  class="input-block-level" /></td>
<td><input type="text" name="correo" value="<?php echo ($correo) ?>"  class="input-block-level" /></td>
<td><input type="text" name="nit_empresa" value="<?php echo ($nit_empresa) ?>"  class="input-block-level" /></td>
<td><input type="text" name="regimen" value="<?php echo ($regimen) ?>"  class="input-block-level" /></td>
    	</tr>
    	</tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th style="text-align:center">NOMBRE PROPIETARIO</th>
			<th style="text-align:center">NIT PROPIETARIO</th>
			<th style="text-align:center">FIRMA PROPIETARIO</th>
			<th style="text-align:center">CAMBIAR FIRMA</th>
		</tr></thead>
    <tbody>
    	<tr>
<td><input type="text" name="propietario_nombres_apellidos" value="<?php echo ($propietario_nombres_apellidos) ?>"  class="input-block-level" /></td>   
<td><input type="text" name="propietario_nit" value="<?php echo ($propietario_nit) ?>"  class="input-block-level" /></td> 
<td style="text-align:center"><img src="<?php echo ($propietario_url_firma) ?>" height="20"></td>
<td style="text-align:center"><a href="../admin/edit_cargar_firma_empresa.php?cod_info_empresa=<?php echo $cod_info_empresa; ?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/cambiar_firma_usuario.png"></a></td>
    	</tr>
    	</tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th style="text-align:center">REG MEDICO</th>
			<th style="text-align:center">LICENCIA</th>
			<th style="text-align:center">REGIMEN</th>
			<!--<th style="text-align:center">INFO HC</th>-->
			<th style="text-align:center">INFO APTLAB</th>
			<th style="text-align:center">DIA INI FACT</th>
			<th style="text-align:center">DIA FIN FACT</th>
		</tr>
	</thead>
    <tbody>
    	<tr>
<td><input type="text" name="reg_medico" value="<?php echo ($reg_medico) ?>"  class="input-block-level" /></td>
<td><input type="text" name="licencia" value="<?php echo ($licencia) ?>"  class="input-block-level" /></td>
<td><input type="text" name="regimen" value="<?php echo ($regimen) ?>"  class="input-block-level" /></td>
<!--<td><input type="text" name="info_histclinic" value="<?php echo ($info_histclinic) ?>"  class="input-block-level" /></td>-->
<td><textarea class="input-block-level" name="info_aptlaboral" rows="5" cols="20"><?php echo $info_aptlaboral ?></textarea></td>
<td><input type="text" name="dia_ini_facturacion" value="<?php echo ($dia_ini_facturacion) ?>"  class="input-block-level"  size="1"/></td> 
<td><input type="text" name="dia_fin_facturacion" value="<?php echo ($dia_fin_facturacion) ?>"  class="input-block-level"  size="1"/></td> 
    	</tr>
    	</tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th style="text-align:center">LETRA HC</th>
			<th style="text-align:center">LETRA APTLAB</th>
			<th style="text-align:center">LETRA TRABALTURA</th>
			<th style="text-align:center">LETRA MANALIMENT</th>
			<th style="text-align:center">LETRA INFORME</th>
			<th style="text-align:center">LETRA REMISION</th>
			<th style="text-align:center">LETRA FACTURA</th>
		</tr></thead>
    <tbody>
    	<tr>
<td><input type="number" name="tamano_font_hc" value="<?php echo ($tamano_font_hc) ?>"  class="input-block-level" /></td>
<td><input type="number" name="tamano_font_aptlab" value="<?php echo ($tamano_font_aptlab) ?>"  class="input-block-level" /></td>
<td><input type="number" name="tamano_font_trabaltu" value="<?php echo ($tamano_font_trabaltu) ?>"  class="input-block-level" /></td>
<td><input type="number" name="tamano_font_manaliment" value="<?php echo ($tamano_font_manaliment) ?>"  class="input-block-level" /></td>
<td><input type="number" name="tamano_font_informe" value="<?php echo ($tamano_font_informe) ?>"  class="input-block-level" /></td>
<td><input type="number" name="tamano_font_remision" value="<?php echo ($tamano_font_remision) ?>"  class="input-block-level" /></td>
<td><input type="number" name="tamano_font_factura" value="<?php echo ($tamano_font_factura) ?>"  class="input-block-level" /></td> 
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    	</tr>
    	</tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th style="text-align:center">IMAG CABECERA</th>
			<th style="text-align:center">LOGOTIPO</th>
			<th style="text-align:center">TIPOGRAFIA</th>
			<th style="text-align:center">ICONO</th>
		</tr></thead>
    <tbody>
    	<tr>
<td><input type="text" name="img_cabecera" value="<?php echo ($img_cabecera) ?>"  class="input-block-level" /></td>   
<td><input type="text" name="logotipo" value="<?php echo ($logotipo) ?>"  class="input-block-level" /></td>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<td><select name="nombre_font" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($nombre_font)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_font, nombre_font FROM font ORDER BY nombre_font ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($nombre_font) and $nombre_font == $datos2['nombre_font']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_font'];
$nombre = $datos2['nombre_font'];
echo "<option value='".$nombre."' $seleccionado >".$nombre."</option>"; } ?></select></td>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<td><?php $sql_consulta = "SELECT * FROM icono_logo";
$resultado = mysqli_query($conectar, $sql_consulta) or die(mysqli_error($conectar));
while ($contenedor = mysqli_fetch_assoc($resultado)) {?>
<input type="radio" name="icono" value="<?php echo $contenedor['nombre_icono_logo'] ?>"checked>
<img src=<?php echo $contenedor['url_icono_logo']?> width="30" height="30">
<?php } ?> </td>
    	</tr>
    	</tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th style="text-align:center">SMTP HOST</th>
			<th style="text-align:center">SMTP AUTH</th>
			<th style="text-align:center">SMTP USER</th>
			<th style="text-align:center">SMTP PASS</th>
			<th style="text-align:center">SMTP SECURE</th>
			<th style="text-align:center">SMTP PORT</th>
		</tr></thead>
    <tbody>
    	<tr>
<td><input type="text" name="smtp_correo_host" value="<?php echo ($smtp_correo_host) ?>"  class="input-block-level" /></td>
<td><input type="text" name="smtp_correo_auth" value="<?php echo ($smtp_correo_auth) ?>"  class="input-block-level" /></td>
<td><input type="text" name="smtp_correo_username" value="<?php echo ($smtp_correo_username) ?>"  class="input-block-level" /></td>
<td><input type="text" name="smtp_correo_password" value="<?php echo ($smtp_correo_password) ?>"  class="input-block-level" /></td>
<td><input type="text" name="smtp_correo_secure" value="<?php echo ($smtp_correo_secure) ?>"  class="input-block-level" /></td>
<td><input type="text" name="smtp_correo_port" value="<?php echo ($smtp_correo_port) ?>"  class="input-block-level" /></td> 
    	</tr>
    	</tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<hr>
<input type="hidden" name="cod_info_empresa" value="<?php echo $cod_info_empresa ?>"/>
<input type="hidden" name="pagina" value="<?php echo $pagina ?>"/>
<input type="hidden" name="ins_edit" value="formulario_insert_edit">

<div class="actions">
<input type="submit" value="Actualizar Información" name="submit" id="submitButton" class="btn btn-info pull-center" title="Click aqui para enviar" />
</div>
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