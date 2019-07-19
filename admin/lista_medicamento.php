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

<div class="breadcrumbs">
<a href="../admin/menu_lista.php"><h4>Buscar Medicamento&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a href="../admin/reg_medicamento.php">Registrar Medicamento</h4></a>
</div>
<hr>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$pagina = $_SERVER['PHP_SELF'];


$sql_cliente = "SELECT medicamento.cod_medicamento, medicamento.nombre_medicamento, tipo_historia_clinica.nombre_tipo_historia_clinica, 
tipo_pos.nombre_tipo_pos, estado.nombre_estado, medicamento.cod_atc, medicamento.principio_activo, medicamento.concentracion, medicamento.forma, 
medicamento.aclaracion
FROM tipo_pos RIGHT JOIN (tipo_historia_clinica RIGHT JOIN (estado RIGHT JOIN medicamento ON estado.cod_estado = medicamento.cod_estado) ON 
tipo_historia_clinica.cod_tipo_historia_clinica = medicamento.cod_tipo_historia_clinica) ON tipo_pos.cod_tipo_pos = medicamento.cod_tipo_pos";
$resultado_cliente = mysqli_query($conectar, $sql_cliente);
//$info_cliente = mysqli_fetch_assoc($resultado_cliente);
?>
<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Pos</th>
<th>Estado</th>
<th>Cod</th>
<th>Edit</th>
</tr>
</thead>
<tbody>
<?php
while ($info_cliente = mysqli_fetch_assoc($resultado_cliente)) {
$cod_medicamento = $info_cliente['cod_medicamento'];
$cod_atc = $info_cliente['cod_atc'];
$nombre_medicamento = $info_cliente['nombre_medicamento'];
$principio_activo = $info_cliente['principio_activo'];
$concentracion = $info_cliente['concentracion'];
$forma = $info_cliente['forma'];
$aclaracion = $info_cliente['aclaracion'];
$nombre_tipo_pos = $info_cliente['nombre_tipo_pos'];
$nombre_estado = $info_cliente['nombre_estado'];
$nombre_tipo_historia_clinica = $info_cliente['nombre_tipo_historia_clinica'];
?>
<tr>
<td><?php echo $nombre_medicamento?></td>
<td><?php echo $nombre_tipo_historia_clinica?></td>
<td><?php echo $nombre_tipo_pos?></td>
<td><?php echo $nombre_estado?></td>
<td><?php echo $cod_medicamento?></td>
<td align="center"><a href="../admin/edit_medicamento.php?cod_medicamento=<?php echo $cod_medicamento?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/editar.png" class="img-polaroid" alt=""></a></td>
</tr>
<?php } ?>
</tbody>
</table><!--End table table table-striped-->
</div><!--End div table-responsive-->
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