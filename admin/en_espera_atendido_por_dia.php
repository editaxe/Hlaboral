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
<div class="breadcrumbs"><a href="#"><h4>Lista de Paciente Atendidos</h4></a></div>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php include_once("../admin/menu_atendidos.php") ?>

<form action="" id="searchform" method="GET">
<select name="fecha_ymd" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php $sql_consulta = "SELECT fecha_ymd FROM historia_clinica GROUP BY fecha_ymd ORDER BY fecha_ymd DESC";
$resultado = mysqli_query($conectar, $sql_consulta) or die(mysqli_error($conectar));
while ($contenedor = mysqli_fetch_assoc($resultado)) {?>
<option value="<?php echo $contenedor['fecha_ymd'] ?>"><?php echo $contenedor['fecha_ymd'] ?></option>
<?php } ?>
</select>
<td align="center"><button type="submit">Ver</button></td>
</form>

<?php
if (isset($_GET['fecha_ymd'])) {
$fecha_ymd = addslashes($_GET['fecha_ymd']);
$pagina = $_SERVER['PHP_SELF'];
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
$sql_cliente = "SELECT historia_clinica.cod_historia_clinica, historia_clinica.cod_cliente, historia_clinica.cod_administrador, 
historia_clinica.cod_tipo_historia_clinica, historia_clinica.cod_estado_facturacion, 
historia_clinica.total_terapia, historia_clinica.motivo, historia_clinica.fecha_time, historia_clinica.fecha_ymd, historia_clinica.hora, 
cliente.cedula, cliente.nombres, cliente.apellido1, cliente.apellido2, cliente.nombre_sexo, administrador.cuenta, administrador.nombres AS nombre_prof, 
administrador.apellidos AS apellidos_prof, tipo_historia_clinica.nombre_tipo_historia_clinica, empresa.nombre_empresa, historia_clinica.cod_estado_facturacion
FROM empresa RIGHT JOIN (tipo_historia_clinica RIGHT JOIN (cliente RIGHT JOIN (administrador RIGHT JOIN historia_clinica ON 
administrador.cod_administrador = historia_clinica.cod_administrador) ON cliente.cod_cliente = historia_clinica.cod_cliente) 
ON tipo_historia_clinica.cod_tipo_historia_clinica = historia_clinica.cod_tipo_historia_clinica) ON empresa.cod_empresa = cliente.cod_empresa
WHERE (((historia_clinica.fecha_ymd)='$fecha_ymd') AND ((historia_clinica.cod_estado_facturacion)=1)) ORDER BY historia_clinica.fecha_time DESC";
$resultado_cliente = mysqli_query($conectar, $sql_cliente);
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
$sql_conteo_citas = "SELECT COUNT(cod_historia_clinica) AS conteo_historia_clinica FROM historia_clinica WHERE fecha_ymd = '$fecha_ymd'";
$consulta_conteo_citas = mysqli_query($conectar, $sql_conteo_citas) or die(mysqli_error($conectar));
$datos_conteo_citas = mysqli_fetch_assoc($consulta_conteo_citas);

$conteo_citas = $datos_conteo_citas['conteo_historia_clinica'];
/* --------------------------------------------------------------------------------------------------------------------------------- */
$sql_conteo_atendido = "SELECT COUNT(cod_historia_clinica) AS conteo_historia_clinica FROM historia_clinica WHERE fecha_ymd = '$fecha_ymd' AND cod_estado_facturacion = '1'";
$consulta_conteo_atendido = mysqli_query($conectar, $sql_conteo_atendido) or die(mysqli_error($conectar));
$datos_conteo_atendido = mysqli_fetch_assoc($consulta_conteo_atendido);

$conteo_atendido = $datos_conteo_atendido['conteo_historia_clinica'];
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
$sql_conteo_no_atendido = "SELECT COUNT(cod_historia_clinica) AS conteo_historia_clinica FROM historia_clinica WHERE fecha_ymd = '$fecha_ymd' AND cod_estado_facturacion = '0'";
$consulta_conteo_no_atendido = mysqli_query($conectar, $sql_conteo_no_atendido) or die(mysqli_error($conectar));
$datos_conteo_no_atendido = mysqli_fetch_assoc($consulta_conteo_no_atendido);

$conteo_no_atendido = $datos_conteo_no_atendido['conteo_historia_clinica'];
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
$sql_conteo_evolucion = "SELECT COUNT(cod_evolucion) AS conteo_evoluciones FROM evolucion WHERE fecha_ymd = '$fecha_ymd'";
$consulta_conteo_evolucion = mysqli_query($conectar, $sql_conteo_evolucion) or die(mysqli_error($conectar));
$datos_conteo_evolucion = mysqli_fetch_assoc($consulta_conteo_evolucion);

$conteo_evoluciones_ini = $datos_conteo_evolucion['conteo_evoluciones'];
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
$sql_conteo_atendido_hombre = "SELECT Count(cliente.nombre_sexo) AS conteo_hombre, cliente.nombre_sexo, historia_clinica.fecha_ymd, historia_clinica.cod_estado_facturacion
FROM cliente LEFT JOIN historia_clinica ON cliente.cod_cliente = historia_clinica.cod_cliente
GROUP BY cliente.nombre_sexo, historia_clinica.fecha_ymd, historia_clinica.cod_estado_facturacion
HAVING (((cliente.nombre_sexo)='M') AND ((historia_clinica.fecha_ymd)='$fecha_ymd') AND ((historia_clinica.cod_estado_facturacion)=1))";
$consulta_conteo_atendido_hombre = mysqli_query($conectar, $sql_conteo_atendido_hombre) or die(mysqli_error($conectar));
$datos_conteo_atendido_hombre = mysqli_fetch_assoc($consulta_conteo_atendido_hombre);

$conteo_atendido_hombres = $datos_conteo_atendido_hombre['conteo_hombre'];
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
$sql_conteo_atendido_mujer = "SELECT Count(cliente.nombre_sexo) AS conteo_mujer, cliente.nombre_sexo, historia_clinica.fecha_ymd, historia_clinica.cod_estado_facturacion
FROM cliente LEFT JOIN historia_clinica ON cliente.cod_cliente = historia_clinica.cod_cliente
GROUP BY cliente.nombre_sexo, historia_clinica.fecha_ymd, historia_clinica.cod_estado_facturacion
HAVING (((cliente.nombre_sexo)='F') AND ((historia_clinica.fecha_ymd)='$fecha_ymd') AND ((historia_clinica.cod_estado_facturacion)=1))";
$consulta_conteo_atendido_mujer = mysqli_query($conectar, $sql_conteo_atendido_mujer) or die(mysqli_error($conectar));
$datos_conteo_atendido_mujer = mysqli_fetch_assoc($consulta_conteo_atendido_mujer);

$conteo_atendido_mujeres = $datos_conteo_atendido_mujer['conteo_mujer'];
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
?>
<br>
<form action="" id="titulo_centrado_busqueda" method="GET"><td align="center">FECHA: <?php echo $fecha_ymd ?></td></form> 
<br>
<div class="table-responsive">
<table class="table table-striped">
<tr>
<th><a href="#">Total Citas</a></th><td><?php echo $conteo_citas ?></td><td></td>
<th><a href="#">Total Atendidos</a></th><td><?php echo $conteo_atendido ?></td><td></td>
<th><a href="#">Total Sin Atender</a></th><td><?php echo $conteo_no_atendido ?></td><td></td>
<th><a href="#">Total Hombres</a></th><td><?php echo number_format($conteo_atendido_hombres) ?></td><td></td>
<th><a href="#">Total Mujeres</a></th><td><?php echo number_format($conteo_atendido_mujeres) ?></td><td></td>
<th><a href="#">Total Evoluciones</a></th><td><?php echo $conteo_evoluciones_ini ?></td><td></td>
</tr>
</table>
</div>
<br>
<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th><p class="th_color">Cedula</p></th>
<th><p class="th_color">Nombres</p></th>
<th><p class="th_color">Sexo</p></th>
<th><p class="th_color">Motivo</p></th>
<th><p class="th_color">Profesional</p></th>
<th><p class="th_color">Empresa</p></th>
<th><p class="th_color">Fecha</p></th>
<th><p class="th_color">Hora</p></th>
</tr>
</thead>
<tbody>
<?php
while ($info_cliente = mysqli_fetch_assoc($resultado_cliente)) {
$cod_historia_clinica = $info_cliente['cod_historia_clinica'];
$cod_cliente = $info_cliente['cod_cliente'];
$cod_administrador_hist = $info_cliente['cod_administrador'];
$cedula = $info_cliente['cedula'];
$nombres = $info_cliente['nombres'];
$apellido1 = $info_cliente['apellido1'];
$apellido2 = $info_cliente['apellido2'];
$motivo = $info_cliente['motivo'];
$nombre_prof = $info_cliente['nombre_prof'];
$apellidos_prof = $info_cliente['apellidos_prof'];
$nombre_tipo_historia_clinica = $info_cliente['nombre_tipo_historia_clinica'];
$nombre_sexo = $info_cliente['nombre_sexo'];
$nombre_empresa = $info_cliente['nombre_empresa'];
$fecha_time = $info_cliente['fecha_time'];
$fecha_dmy = date("Y/m/d", $fecha_time);
$hora = date("H:i", $fecha_time);
?>
<tr>
<td><?php echo $cedula?></td>
<td><?php echo $nombres.' '.$apellido1.' '.$apellido2?></td>
<td><?php echo $nombre_sexo?></td>
<td><strong><?php echo $motivo?></strong></td>
<td><?php echo $nombre_prof.' '.$apellidos_prof ?></td>
<td><?php echo $nombre_empresa?></td>
<td><?php echo $fecha_dmy?></td>
<td><?php echo $hora?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
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