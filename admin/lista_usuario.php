<?php $serguridad_pagina = 1; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->

<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->

<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php include_once('../seguridad/seguridad_diseno_plantillas.php'); ?>
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->

<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">

<div class="breadcrumbs">
<a href="../admin/menu_lista.php"><h4>Lista de Usuarios&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a href="../admin/reg_usuario.php">Registrar Usuarios</h4></a>
</div>

<div class="row-fluid">
<div class="span12" id="divMain">
<?php
$pagina = $_SERVER['PHP_SELF'];

$mostrar_datos_sql = "SELECT administrador.cod_administrador, administrador.nombres, administrador.apellidos, administrador.cuenta, administrador.creador, 
administrador.estilo_css, tipo_historia_clinica.nombre_tipo_historia_clinica, seguridad.nombre_seguridad, administrador.telefono, administrador.correo, administrador.fecha
FROM tipo_historia_clinica RIGHT JOIN (seguridad RIGHT JOIN administrador ON seguridad.cod_seguridad = administrador.cod_seguridad) ON 
tipo_historia_clinica.cod_tipo_historia_clinica = administrador.cod_tipo_historia_clinica ORDER BY administrador.cod_administrador DESC";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
?>
<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr>
<th>Cuenta</th>
<th>Nombres</th>
<th>Tipo de Rol</th>
<th>Profesional</th>
<th>Correo</th>
<th>Telefono</th>
<th>Edit</th>
</tr>
</thead>
<tbody>
<?php
while ($matriz_consulta = mysqli_fetch_assoc($consulta)) {
$cod_administrador = $matriz_consulta['cod_administrador'];
$cuenta = $matriz_consulta['cuenta'];
$nombres = $matriz_consulta['nombres'];
$apellidos = $matriz_consulta['apellidos'];
$correo = $matriz_consulta['correo'];
$nombre_seguridad = $matriz_consulta['nombre_seguridad'];
$estilo_css = $matriz_consulta['estilo_css'];
$creador = $matriz_consulta['creador'];
$fecha = $matriz_consulta['fecha'];
$telefono = $matriz_consulta['telefono'];
$nombre_tipo_historia_clinica = $matriz_consulta['nombre_tipo_historia_clinica'];
?>
<tr>
<td ><?php echo $cuenta; ?></td>
<td ><?php echo $nombres.' '.$apellidos; ?></td>
<td ><?php echo $nombre_seguridad; ?></td>
<td ><?php echo $nombre_tipo_historia_clinica; ?></td>
<td ><?php echo $correo; ?></td>
<td ><?php echo $telefono; ?></td>
<td align="center"><a href="../admin/edit_usuario.php?cod_administrador=<?php echo $cod_administrador?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/editar.png" class="img-polaroid" alt=""></a></td>
</tr>
<?php
}
?>
</tr>
</tbody>
</table>
</div>
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* FIN MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->

</div>
</div>
<div id="footerInnerSeparator"></div>
</div>
</div>
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* FIN MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->

  <!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<?php include_once('../admin/04_modulo_footer.php'); ?>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->

<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
<?php include_once('../admin/05_modulo_js.php'); ?>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->

</body>
</html>