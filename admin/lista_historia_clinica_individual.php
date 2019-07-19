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
<div class="breadcrumbs"><a href="../admin/lista_historia_clinica_individual_buscar.php"><h4>Historias Clinicas</h4></a></div>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$pagina = $_SERVER['PHP_SELF'];

$sql_cliente = "SELECT historia_clinica.cod_historia_clinica, historia_clinica.cod_cliente, cliente.cedula, cliente.nombres, cliente.apellido1, 
cliente.apellido2, historia_clinica.motivo, historia_clinica.fecha_time, historia_clinica.fecha_dmy, historia_clinica.cuenta, historia_clinica.hora
FROM cliente RIGHT JOIN historia_clinica ON cliente.cod_cliente = historia_clinica.cod_cliente ORDER BY historia_clinica.fecha_reg_time DESC";
$resultado_cliente = mysqli_query($conectar, $sql_cliente);
//$info_cliente = mysqli_fetch_assoc($resultado_cliente);
?>
<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>Cedula</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Motivo</th>
<th>Fecha</th>
<th>Hora</th>
<th>Cuenta</th>
<th>Ver</th>
<th>Pdf</th>
<th>EmailH</th>
<th>Email/M-A</th>
<th>Edit</th>
</tr>
</thead>
<tbody>
<?php
while ($info_cliente = mysqli_fetch_assoc($resultado_cliente)) {

$cod_historia_clinica = $info_cliente['cod_historia_clinica'];
$cod_cliente = $info_cliente['cod_cliente'];
$cedula = $info_cliente['cedula'];
$nombres = $info_cliente['nombres'];
$apellido1 = $info_cliente['apellido1'];
$apellido2 = $info_cliente['apellido2'];
$motivo = $info_cliente['motivo'];
$fecha_dmy = $info_cliente['fecha_dmy'];
$hora = $info_cliente['hora'];
$cuenta = $info_cliente['cuenta'];
?>
<tr>
<td><?php echo $cedula?></td>
<td><?php echo $nombres?></td>
<td><?php echo $apellido1 ?></td>
<td><?php echo $motivo?></td>
<td><?php echo $fecha_dmy?></td>
<td><?php echo $hora?></td>
<td><?php echo $cuenta?></td>
<td align="center"><a href="../admin/ver_historia_clinica_html.php?cod_historia_clinica=<?php echo $cod_historia_clinica?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/ver_peq.png" class="img-polaroid" alt=""></a></td>
<td align="center"><a href="../admin/ver_historial_clinico_pdf.php?cod_historia_clinica=<?php echo $cod_historia_clinica?>" target="_blank"><img src="../imagenes/imprimir_peq.png" class="img-polaroid" alt=""></a></td>
<td align="center"><a href="../admin/enviar_historia_clinica_correo.php?cod_historia_clinica=<?php echo $cod_historia_clinica?>" target="_blank"><img src="../imagenes/email.png" class="img-polaroid" alt=""></a></td>
<td align="center"><a href="../admin/enviar_medicamentos_ayudas_diagnosticas_correo.php?cod_historia_clinica=<?php echo $cod_historia_clinica?>" target="_blank"><img src="../imagenes/email.png" class="img-polaroid" alt=""></a></td>
<td align="center"><a href="../admin/edit_historia_clinica.php?cod_historia_clinica=<?php echo $cod_historia_clinica?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/actualizar.png" class="img-polaroid" alt=""></a></td>
</tr>
<?php
}
?>
</tbody>
</table>
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
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
</body>
</html>