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
<div class="breadcrumbs"><a href="#"><h4>Lista de Paciente Atendidos Por Empresa Y Rango de Fechas</h4></a></div>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php include_once("../admin/menu_atendidos.php") ?>

<script language="javascript" src="../admin/js/isiAJAX.js"></script>
<script language="javascript">
var last;
function Focus(elemento, valor) {
$(elemento).className = 'cajhabiltada';
last = valor;
}
function Blur(elemento, valor, campo, id) {
$(elemento).className = 'cajdeshabiltada';
if (last != valor)
myajax.Link('guardar_cod_factura_precio_ajax.php?valor='+valor+'&campo='+campo+'&id='+id);
}
</script>
<body onLoad="myajax = new isiAJAX();">


<?php
if (isset($_GET['nombre_empresa'])) {
$nombre_empresa       = addslashes($_GET['nombre_empresa']);
$motivo               = 'TODOS';
$fecha_ini            = addslashes($_GET['fecha_ini']);
$fecha_fin            = addslashes($_GET['fecha_fin']);
$fecha                = date("Y/m/d");
}
?>

<form action="" id="searchform_alto_ancho" method="GET">
<td><a href="#">EMPRESA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<select name="nombre_empresa" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($nombre_empresa)) { echo "<option value='-1' >...</option>";
} else { echo  "<option value='-1' selected >...</option>"; }
$sql_consulta = ("SELECT cod_empresa, nombre_empresa FROM empresa ORDER BY nombre_empresa ASC");
$resultado = mysqli_query($conectar, $sql_consulta);
while ($contenedor = mysqli_fetch_assoc($resultado)) {
if(isset($nombre_empresa) and $nombre_empresa == $contenedor['nombre_empresa']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $contenedor['nombre_empresa'];
$nombre = $contenedor['nombre_empresa'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select>
</td>

<br>

<td><a href="#">FECHA INI:&nbsp;&nbsp;&nbsp;&nbsp;</a>
<select name="fecha_ini" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($fecha_ini)) { echo "<option value='-1' >...</option>";
} else { echo  "<option value='-1' selected >...</option>"; }
$sql_consulta = ("SELECT fecha_ymd FROM historia_clinica GROUP BY fecha_ymd ORDER BY fecha_ymd DESC");
$resultado = mysqli_query($conectar, $sql_consulta);
while ($contenedor = mysqli_fetch_assoc($resultado)) {
if(isset($fecha_ini) and $fecha_ini == $contenedor['fecha_ymd']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $contenedor['fecha_ymd'];
$nombre = $contenedor['fecha_ymd'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select>
</td>

<br>

<td><a href="#">FECHA FIN:&nbsp;&nbsp;&nbsp;</a>
<select name="fecha_fin" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($fecha_fin)) { echo "<option value='-1' >...</option>";
} else { echo  "<option value='-1' selected >...</option>"; }
$sql_consulta = ("SELECT fecha_ymd FROM historia_clinica GROUP BY fecha_ymd ORDER BY fecha_ymd DESC");
$resultado = mysqli_query($conectar, $sql_consulta);
while ($contenedor = mysqli_fetch_assoc($resultado)) {
if(isset($fecha_fin) and $fecha_fin == $contenedor['fecha_ymd']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $contenedor['fecha_ymd'];
$nombre = $contenedor['fecha_ymd'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select>
</td>

<td align="center"><button type="submit">Ver</button></td>
</form>
<br>
<?php
if (isset($_GET['nombre_empresa'])) {
$nombre_empresa       = addslashes($_GET['nombre_empresa']);
$motivo               = 'TODOS';
$fecha_ini            = addslashes($_GET['fecha_ini']);
$fecha_fin            = addslashes($_GET['fecha_fin']);
$fecha                = date("Y/m/d");
$pagina               = $_SERVER['PHP_SELF'];
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
$sql_cliente = "SELECT historia_clinica.cod_historia_clinica, cliente.cedula, cliente.nombres, cliente.apellido1, 
cliente.nombre_sexo, historia_clinica.motivo, administrador.nombres AS nombre_prof, administrador.apellidos AS apellidos_prof, 
historia_clinica.cod_administrador, historia_clinica.cod_cliente, historia_clinica.fecha_ymd, historia_clinica.cod_factura, historia_clinica.costo_motivo_consulta,
historia_clinica.nombre_empresa, historia_clinica.fecha_dmy, historia_clinica.hora, historia_clinica.fecha_time, historia_clinica.cod_estado_facturacion
FROM empresa RIGHT JOIN (cliente RIGHT JOIN (administrador RIGHT JOIN historia_clinica ON administrador.cod_administrador = historia_clinica.cod_administrador) 
ON cliente.cod_cliente = historia_clinica.cod_cliente) ON empresa.nombre_empresa = historia_clinica.nombre_empresa
WHERE ((historia_clinica.nombre_empresa)='$nombre_empresa') AND ((historia_clinica.cod_estado_facturacion)=1) AND (historia_clinica.fecha_ymd BETWEEN '$fecha_ini' AND '$fecha_fin') ORDER BY historia_clinica.fecha_time DESC";
$resultado_cliente = mysqli_query($conectar, $sql_cliente) or die(mysqli_error($conectar));
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
$sql_conteo_citas = "SELECT COUNT(cod_historia_clinica) AS conteo_historia_clinica
FROM empresa RIGHT JOIN (cliente RIGHT JOIN (administrador RIGHT JOIN historia_clinica ON administrador.cod_administrador = historia_clinica.cod_administrador) 
ON cliente.cod_cliente = historia_clinica.cod_cliente) ON empresa.nombre_empresa = historia_clinica.nombre_empresa
WHERE ((historia_clinica.nombre_empresa)='$nombre_empresa') AND (historia_clinica.fecha_ymd BETWEEN '$fecha_ini' AND '$fecha_fin')";
$consulta_conteo_citas = mysqli_query($conectar, $sql_conteo_citas) or die(mysqli_error($conectar));
$datos_conteo_citas = mysqli_fetch_assoc($consulta_conteo_citas);

$conteo_citas = $datos_conteo_citas['conteo_historia_clinica'];
/* --------------------------------------------------------------------------------------------------------------------------------- */
$sql_conteo_atendido = "SELECT COUNT(cod_historia_clinica) AS conteo_historia_clinica
FROM empresa RIGHT JOIN (cliente RIGHT JOIN (administrador RIGHT JOIN historia_clinica ON administrador.cod_administrador = historia_clinica.cod_administrador) 
ON cliente.cod_cliente = historia_clinica.cod_cliente) ON empresa.nombre_empresa = historia_clinica.nombre_empresa
WHERE ((historia_clinica.nombre_empresa)='$nombre_empresa') AND ((historia_clinica.cod_estado_facturacion)=1) AND (historia_clinica.fecha_ymd BETWEEN '$fecha_ini' AND '$fecha_fin')";
$consulta_conteo_atendido = mysqli_query($conectar, $sql_conteo_atendido) or die(mysqli_error($conectar));
$datos_conteo_atendido = mysqli_fetch_assoc($consulta_conteo_atendido);

$conteo_atendido = $datos_conteo_atendido['conteo_historia_clinica'];
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
$sql_conteo_no_atendido = "SELECT COUNT(cod_historia_clinica) AS conteo_historia_clinica
FROM empresa RIGHT JOIN (cliente RIGHT JOIN (administrador RIGHT JOIN historia_clinica ON administrador.cod_administrador = historia_clinica.cod_administrador) 
ON cliente.cod_cliente = historia_clinica.cod_cliente) ON empresa.nombre_empresa = historia_clinica.nombre_empresa
WHERE ((historia_clinica.nombre_empresa)='$nombre_empresa') AND ((historia_clinica.cod_estado_facturacion)=0) AND (historia_clinica.fecha_ymd BETWEEN '$fecha_ini' AND '$fecha_fin')";
$consulta_conteo_no_atendido = mysqli_query($conectar, $sql_conteo_no_atendido) or die(mysqli_error($conectar));
$datos_conteo_no_atendido = mysqli_fetch_assoc($consulta_conteo_no_atendido);

$conteo_no_atendido = $datos_conteo_no_atendido['conteo_historia_clinica'];
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
$sql_conteo_atendido_hombre = "SELECT Count(cliente.nombre_sexo) AS conteo_hombre, historia_clinica.nombre_empresa, historia_clinica.cod_estado_facturacion, cliente.nombre_sexo, historia_clinica.fecha_ymd
FROM empresa RIGHT JOIN (cliente RIGHT JOIN (administrador RIGHT JOIN historia_clinica ON administrador.cod_administrador = historia_clinica.cod_administrador) ON cliente.cod_cliente = historia_clinica.cod_cliente) ON empresa.nombre_empresa = historia_clinica.nombre_empresa
GROUP BY historia_clinica.nombre_empresa, historia_clinica.cod_estado_facturacion, cliente.nombre_sexo, historia_clinica.fecha_ymd
HAVING (((historia_clinica.nombre_empresa)='$nombre_empresa') AND ((historia_clinica.cod_estado_facturacion)=1) AND ((cliente.nombre_sexo)='M') AND (historia_clinica.fecha_ymd BETWEEN '$fecha_ini' AND '$fecha_fin'))";
$consulta_conteo_atendido_hombre = mysqli_query($conectar, $sql_conteo_atendido_hombre) or die(mysqli_error($conectar));
$datos_conteo_atendido_hombre = mysqli_fetch_assoc($consulta_conteo_atendido_hombre);

$conteo_atendido_hombres = $datos_conteo_atendido_hombre['conteo_hombre'];
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
$sql_conteo_atendido_mujer = "SELECT Count(cliente.nombre_sexo) AS conteo_mujer, historia_clinica.nombre_empresa, historia_clinica.cod_estado_facturacion, cliente.nombre_sexo, historia_clinica.fecha_ymd
FROM empresa RIGHT JOIN (cliente RIGHT JOIN (administrador RIGHT JOIN historia_clinica ON administrador.cod_administrador = historia_clinica.cod_administrador) ON cliente.cod_cliente = historia_clinica.cod_cliente) ON empresa.nombre_empresa = historia_clinica.nombre_empresa
GROUP BY historia_clinica.nombre_empresa, historia_clinica.cod_estado_facturacion, cliente.nombre_sexo, historia_clinica.fecha_ymd
HAVING (((historia_clinica.nombre_empresa)='$nombre_empresa') AND ((historia_clinica.cod_estado_facturacion)=1) AND ((cliente.nombre_sexo)='F') AND (historia_clinica.fecha_ymd BETWEEN '$fecha_ini' AND '$fecha_fin'))";
$consulta_conteo_atendido_mujer = mysqli_query($conectar, $sql_conteo_atendido_mujer) or die(mysqli_error($conectar));
$datos_conteo_atendido_mujer = mysqli_fetch_assoc($consulta_conteo_atendido_mujer);

$conteo_atendido_mujeres = $datos_conteo_atendido_mujer['conteo_mujer'];
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
?>
<form action="" id="titulo_centrado_largo_ancho_busqueda" method="GET">
<td align="center">EMPRESA: <?php echo $nombre_empresa ?><br>FECHA INI: <?php echo $fecha_ini ?><br>FECHA FIN: <?php echo $fecha_fin ?></td>
</form> 
<br>
<div class="table-responsive">
<table class="table table-striped">
<tr>
<th style="text-align:left"><a href="../admin/ver_facturacion_por_empresa_fecharango_version_pdf.php?fecha=<?php echo $fecha ?>&fecha_ini=<?php echo $fecha_ini ?>&fecha_fin=<?php echo $fecha_fin ?>&nombre_empresa=<?php echo $nombre_empresa ?>&motivo=<?php echo $motivo ?>&cuenta=<?php echo $cuenta_actual ?>" target="_blank"><img src="../imagenes/ver_factura.png"></a></th>
<th style="text-align:center"><a href="../admin/ver_lista_por_empresa_fecharango_version_pdf.php?fecha=<?php echo $fecha ?>&fecha_ini=<?php echo $fecha_ini ?>&fecha_fin=<?php echo $fecha_fin ?>&nombre_empresa=<?php echo $nombre_empresa ?>&motivo=<?php echo $motivo ?>&cuenta=<?php echo $cuenta_actual ?>" target="_blank"><img src="../imagenes/ver_lista_grande.png"></a></th>
<!--<th style="text-align:right"><a href="../admin/informe_diagnostico_condiciones_salud_fecha_rango_empresa.php?fecha_ini=<?php echo $fecha_ini ?>&fecha_fin=<?php echo $fecha_fin ?>&nombre_empresa=<?php echo $nombre_empresa ?>" target="_blank"><img src="../imagenes/ver_informe.png"></a></th>-->
</tr>
</table>
</div>

<br>
<div class="table-responsive">
<table class="table table-striped">
<tr>
<th><a href="#">Total Citas</a></th><td><?php echo number_format($conteo_citas, 0, ",", ".") ?></td><td></td>
<th><a href="#">Total Atendidos</a></th><td><?php echo number_format($conteo_atendido, 0, ",", ".") ?></td><td></td>
<th><a href="#">Total Sin Atender</a></th><td><?php echo number_format($conteo_no_atendido, 0, ",", ".") ?></td><td></td>
<!--
<th><a href="#">Total Hombres</a></th><td><?php echo number_format($conteo_atendido_hombres, 0, ",", ".") ?></td><td></td>
<th><a href="#">Total Mujeres</a></th><td><?php echo number_format($conteo_atendido_mujeres, 0, ",", ".") ?></td><td></td>
-->
</tr>
</table>
</div>

<br>
<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>Hc</th>
<th>Cedula</th>
<th>Nombres</th>
<th>Sexo</th>
<th>Motivo</th>
<th>Profesional</th>
<th>Empresa</th>
<th>Precio</th>
<!--<th>Factura</th>-->
<th>Fecha</th>
<th>Hora</th>
<th>Edit</th>
</tr>
</thead>
<tbody>
<?php
while ($info_cliente = mysqli_fetch_assoc($resultado_cliente)) {
$cod_historia_clinica          = $info_cliente['cod_historia_clinica'];
$cod_cliente                   = $info_cliente['cod_cliente'];
$cod_administrador_hist        = $info_cliente['cod_administrador'];
$cedula                        = $info_cliente['cedula'];
$nombres                       = $info_cliente['nombres'];
$apellido1                     = $info_cliente['apellido1'];
$motivo                        = $info_cliente['motivo'];
$nombre_prof                   = $info_cliente['nombre_prof'];
$apellidos_prof                = $info_cliente['apellidos_prof'];
$nombre_sexo                   = $info_cliente['nombre_sexo'];
$nombre_empresa                = $info_cliente['nombre_empresa'];
$cod_factura                   = $info_cliente['cod_factura'];
$costo_motivo_consulta         = $info_cliente['costo_motivo_consulta'];
$fecha_time                    = $info_cliente['fecha_time'];
$fecha_dmy                     = date("Y/m/d", $fecha_time);
$hora                          = date("H:i", $fecha_time);
?>
<tr>
<td><?php echo $cod_historia_clinica?></td>
<td><?php echo $cedula?></td>
<td><?php echo $nombres.' '.$apellido1?></td>
<td><?php echo $nombre_sexo?></td>
<td><strong><?php echo $motivo?></strong></td>
<td><?php echo $nombre_prof.' '.$apellidos_prof ?></td>
<td><?php echo $nombre_empresa?></td>
<td style="text-align:center"><input style="text-align:center" onFocus="Focus(this.id, this.value)" onBlur="Blur(this.id, this.value, 'costo_motivo_consulta', <?php echo $cod_historia_clinica;?>)" id="costo_motivo_consulta" value="<?php echo $costo_motivo_consulta;?>" class="input-block-level" size="6"></td>
<!--<td style="text-align:center"><input style="text-align:center" onFocus="Focus(this.id, this.value)" onBlur="Blur(this.id, this.value, 'cod_factura', <?php echo $cod_historia_clinica;?>)" id="cod_factura" value="<?php echo $cod_factura;?>" class="input-block-level" size="1"></td>-->
<td><?php echo $fecha_dmy?></td>
<td><?php echo $hora?></td>
<td align="center"><a href="../admin/edit_historia_clinica_mejorada.php?cod_historia_clinica=<?php echo $cod_historia_clinica?>&cod_cliente=<?php echo $cod_cliente?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/editar.png" class="img-polaroid" alt=""></a></td>
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