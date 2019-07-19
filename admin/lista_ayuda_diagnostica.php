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
<a href="../admin/menu_lista.php"><h4>Buscar Ayuda Diagnostica&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a href="../admin/reg_ayuda_diagnostica.php">Registrar Ayuda Diagnostica</h4></a>
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

$sql_laboratorio = "SELECT ayuda_diagnostica.cod_ayuda_diagnostica, ayuda_diagnostica.nombre_ayuda_diagnostica, estado.nombre_estado, 
tipo_historia_clinica.nombre_tipo_historia_clinica
FROM tipo_historia_clinica RIGHT JOIN (estado RIGHT JOIN ayuda_diagnostica ON estado.cod_estado = ayuda_diagnostica.cod_estado) ON 
tipo_historia_clinica.cod_tipo_historia_clinica = ayuda_diagnostica.cod_tipo_historia_clinica";
$resultado_laboratorio = mysqli_query($conectar, $sql_laboratorio);
//$info_laboratorio = mysqli_fetch_assoc($resultado_laboratorio);
?>
<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Estado</th>
<th>Cod</th>
<th>Edit</th>
</tr>
</thead>
<tbody>
<?php
while ($info_laboratorio = mysqli_fetch_assoc($resultado_laboratorio)) {
$cod_ayuda_diagnostica = $info_laboratorio['cod_ayuda_diagnostica'];
$nombre_ayuda_diagnostica = $info_laboratorio['nombre_ayuda_diagnostica'];
$nombre_tipo_historia_clinica = $info_laboratorio['nombre_tipo_historia_clinica'];
$nombre_estado = $info_laboratorio['nombre_estado'];
?>
<tr>
<td><?php echo $nombre_ayuda_diagnostica?></td>
<td><?php echo $nombre_tipo_historia_clinica?></td>
<td><?php echo $nombre_estado?></td>
<td><?php echo $cod_ayuda_diagnostica?></td>
<td align="center"><a href="../admin/edit_ayuda_diagnostica.php?cod_ayuda_diagnostica=<?php echo $cod_ayuda_diagnostica?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/editar.png" class="img-polaroid" alt=""></a></td>
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