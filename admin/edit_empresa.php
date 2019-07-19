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
<div class="breadcrumbs"><a href="<?php echo $pagina ?>"><h4>Editar Empresa a Laborar</h4></a></div>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$pagina = $_SERVER['PHP_SELF'];

$cod_empresa = intval($_GET['cod_empresa']);

$sql_cliente = "SELECT * FROM empresa WHERE cod_empresa = '$cod_empresa'";
$consulta_cliente = mysqli_query($conectar, $sql_cliente) or die(mysqli_error($conectar));
$datos_cliente = mysqli_fetch_assoc($consulta_cliente);

$nombre_empresa          = $datos_cliente['nombre_empresa'];
$razonsocial_empresa     = $datos_cliente['razonsocial_empresa'];
$direccion_empresa       = $datos_cliente['direccion_empresa'];
$telefono_empresa        = $datos_cliente['telefono_empresa'];
$nit_empresa             = $datos_cliente['nit_empresa'];
$cod_tipo_facturacion    = $datos_cliente['cod_tipo_facturacion'];
?>
<form name="formulario_insersion" accept-charset="utf-8" method="post" action="../admin/edit_empresa_reg.php">
<fieldset>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th>NOMBRE EMPRESA A LABORAR</th>
			<th>RAZON SOCIAL</th>
			<th>DIRRECION</th>
			<th>TELEFONO</th>
			<th>NIT</th>
			<th>TIPO</th>
		</tr>
	</thead>
    <tbody>
    	<tr>
<td><input class="input-block-level" name="nombre_empresa" type="text" value="<?php echo $nombre_empresa ?>" required autofocus/></td>
<td><input class="input-block-level" name="razonsocial_empresa" type="text" value="<?php echo $razonsocial_empresa ?>" /></td>
<td><input class="input-block-level" name="direccion_empresa" type="text" value="<?php echo $direccion_empresa ?>" required autofocus/></td>
<td><input class="input-block-level" name="telefono_empresa" type="text" value="<?php echo $telefono_empresa ?>" size="6" required autofocus/></td>
<td><input class="input-block-level" name="nit_empresa" type="text" value="<?php echo $nit_empresa ?>" size="6" required autofocus/></td>
<td><input class="input-block-level" name="cod_tipo_facturacion" type="text" value="<?php echo $cod_tipo_facturacion ?>" size="1"/></td>
    	</tr>
    	</tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<input type="hidden" name="cod_empresa" value="<?php echo $cod_empresa ?>">
<input type="hidden" name="pagina" value="<?php echo $pagina ?>">
<input type="hidden" name="ins_edit" value="formulario_insert_edit">
<hr>
<div class="actions">
<input type="submit" value="Registrar Información" name="submit" id="submitButton" class="btn btn-info pull-center" title="Click aqui para enviar" />
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